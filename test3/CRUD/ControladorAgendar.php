<?php
include("Crud.php");
session_start();
$rut = $_SESSION['usuario'];
$centromedico = $_POST['centroMedico'];
$especialidad = $_POST['especialidadMedica'];
$especialista = $_POST['medicoEspecialidad'];
$fecha = $_POST['fechas'];
$hora = $_POST['horas'];
$clasecrud = new ClaseCrud();
$arrayidfechahora = $clasecrud->buscarIdfechahora($fecha, $hora);
$existefechahora = mysqli_num_rows($arrayidfechahora);
    if($existefechahora == 1){
        $fechahora = mysqli_fetch_assoc($arrayidfechahora);
        $idfechahora= $fechahora['idfechahora'];
        echo $idfechahora;
    }else{
        echo "no existe hora disponible";
    }
    $arrayreserva = $clasecrud->buscarReserva($rut);//buscamos reserva para ese rut
    $existereserva = mysqli_num_rows($arrayreserva);
    
    if($existereserva == 1){
        $dispo = mysqli_fetch_assoc($arrayreserva);
        $iddispo = $dispo['iddisponiblidad']; //ubtenemos iddisponibilidad
        echo "dispo".$iddispo;
        $arrayidfh=$clasecrud->buscarIdfechahoradispo($iddispo);
        $existeidfh = mysqli_num_rows($arrayidfh);
        if($existeidfh==1){
            $idfh = mysqli_fetch_assoc($arrayidfh);
            $idfech = $idfh['idfechahora']; //obtenemos idefechahora
            echo "idfechahora".$idfech;
            $arrayiddate = $clasecrud->buscarIdfecha($idfechahora);
            $existedate = mysqli_num_rows($arrayiddate);
            if($existedate == 1){
                $iddates = mysqli_fetch_assoc($arrayiddate);
                $iddate = $iddates['idfecha'];//obtenemos idfecha
                echo "iddate".$iddate;
                $arrayfech = $clasecrud->buscarFecha($iddate);
                $existefech = mysqli_num_rows($arrayfech);
                $arraybuscarfecha =$clasecrud->buscarFecha($fecha);//fecha elegida al  mpmento de pedir hora
                $f = mysqli_fetch_assoc($arraybuscarfecha);
                $fc = $f['fecha']; //obtenemos la fecha
                if($existefech==1){
                    $fch= mysqli_fetch_assoc($arrayfech);
                    $fech = $fch['fecha'];//fecha de hora ya tomada antes por el usuario
                    echo "fecha".$fech;
                    if($fech == $f){
                        echo "USTED YA TIENE HORA RESERVADA PARA ESTE DIA, PREBE CON OTRO DIA";
                    }else{
                        if (isset ($idfechahora)){
                            $arrayiddisponibilidad = $clasecrud->buscarDisponibilidad($idfechahora, $especialista);
                            $existedisponibilidad = mysqli_num_rows($arrayiddisponibilidad);
                            echo "disponibilidad".$existedisponibilidad;
                            if($existedisponibilidad == 1){
                                $disponibilidad = mysqli_fetch_assoc($arrayiddisponibilidad);
                                $iddisponibilidad = $disponibilidad['iddisponibilidad'];
                                echo $iddisponibilidad;
                            }
                            $nfilas = $clasecrud->insertarReserva($iddisponibilidad,$rut);
                            echo "nfila".$nfilas;
                            
                            if($nfilas==1){
                                print "SE REGISTRO CON EXITO";
                                $nfilass = $clasecrud->cambiarStatus($iddisponibilidad);
                                if($nfilass == 1){
                                    print "Se cambio el status de hora a reservada";
                                }
                            }else{
                                print"ERROR...";
                            }
                        }
                    }
                }else{
                    echo "ocurrio un erro";
                }
            }
        }else{
            echo "Se produjo un error";
        }
    }else{
        if (isset ($idfechahora)){
            $arrayiddisponibilidad = $clasecrud->buscarDisponibilidad($idfechahora, $especialista);
            $existedisponibilidad = mysqli_num_rows($arrayiddisponibilidad);
            echo "disponibilidad".$existedisponibilidad;
            if($existedisponibilidad == 1){
                $disponibilidad = mysqli_fetch_assoc($arrayiddisponibilidad);
                $iddisponibilidad = $disponibilidad['iddisponibilidad'];
                echo $iddisponibilidad;
            }
            $nfilas = $clasecrud->insertarReserva($iddisponibilidad,$rut);
            echo "nfila".$nfilas;
            
            if($nfilas==1){
                print "SE REGISTRO CON EXITO";
                $nfilass = $clasecrud->cambiarStatus($iddisponibilidad);
                if($nfilass == 1){
                    print "Se cambio el status de hora a reservada";
                }
            }else{
                print"ERROR...";
            }
        }
    }

echo "<br>";
echo $centromedico;
echo "<br>";
echo $especialidad;
echo "<br>";
echo $especialista;
echo "</br>";
echo $fecha;
echo "<br>";
echo $hora;
