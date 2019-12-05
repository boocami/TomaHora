<?php
include ("Crud.php");
include ("validar.php");
$rut = $_POST['rutPaciente'];//recibir la variable rut.
$clasecrud = new ClaseCrud();
$arrayrut = $clasecrud->buscarPorRut($rut);//Buscamos si el rut existe en la base da datos.
$existerut = mysqli_num_rows($arrayrut);//Revisamos cuantas filas nos entrega la consulta.
if($existerut == 1){
    print "Usted ya esta registrado...";
}else{
    //Resivismos las variables del formulario, del ingreso del insert con los atributos de tpersona.
    $pnombre = $_POST['primerNombrePaciente']; 
    $snombre = $_POST['segundoNombrePaciente']; 
    $papellido =$_POST['primerApellidoPaciente']; 
    $sapellido = $_POST['segundoApellidoPaciente']; 
    $telefono = $_POST['telefonoPaciente']; 
    $email = $_POST['emailPaciente']; 
    $genero = $_POST['generoPaciente'];
    //echo "rut:".$rut.",nombre:".$pnombre.",nombre2:".$snombre.",apellido".$papellido.",apellido2:".$sapellido.",fono:".$telefono.",email:".$email.",genero:".$genero;
    //Insertamos
    $nfilas = $clasecrud->insertaPersona($rut, $pnombre, $snombre, $papellido, $sapellido, $telefono, $email, $genero);

    if($nfilas!=1){
        print "ERROR AL INSERTAR PERSONA";
    }else{
        $numerocasa = $_POST['numeroCasaPaciente'];
        $calle = $_POST['callePaciente'];
        $idcomuna = $_POST['comunaPaciente'];
        $arraydireccion = $clasecrud->buscarDireccion($numerocasa,$calle,$idcomuna); //DEVUELVE EL ARREGLO DE LA BUSQUEDA DE LA DIRECCION
        $existedireccion = mysqli_num_rows($arraydireccion); //NUMERO DE FILAS ENCONTRADAS
        //echo "PARTE1numero de casa:".$numerocasa.",calle:".$calle.",idcomuna:".$idcomuna;
        if($existedireccion == 1){
            $direccion0 = mysqli_fetch_assoc($arraydireccion);
            $iddireccion= $direccion0['iddireccion'];
            //echo "existe direccion".$iddireccion;
        }else{
            $nfiladireccion = $clasecrud->insertaDireccion($numerocasa,$calle,$idcomuna);
            $arraydireccion2 = $clasecrud->buscarDireccion($numerocasa,$calle,$idcomuna);
            
            //foreach($arraydireccion2 as $row){
                //echo "arraydireccion2".$row['iddireccion'];   
            //}
            $existedireccion2 = mysqli_num_rows($arraydireccion2);
            echo "existedireccion2 ".$existedireccion2;

            if($existedireccion2 == 1){ //depende del parametro de busqueda, si es PK devuelve 1 o 0, si no es PK, devuelve 0 o mayor a 0.
                $direccion = mysqli_fetch_assoc($arraydireccion2);
                $iddireccion= $direccion['iddireccion'];
                $fecha = $_POST['fechaNacimientoPaciente'];
                $prevision = $_POST['saludPaciente'];
                $clave = $_POST['clave1Paciente'];
                foreach ($iddireccion as $row) {
                    echo "PARTE2iddireccion:".$row['iddireccion'];
                    $iddireccion=$row['iddireccion'];
                }
                $nfilas = $clasecrud->insertaPaciente($rut, $fecha, $prevision, $iddireccion,$clave);
            }else{
                print "ERROR AL INSERTAR PACIENTE";
                //Delete direccion
                $filasdelete = $clasecrud->deleteDireccion($iddireccion);
                $arraydeledic = mysqli_num_rows($filasdelete); 
                if($arraydeledic == 1){
                    print "SE ELIMINO DIRECCION CON EXISTA";
                    //DELETE PERSONA
                    $fdeleteper = $clasecrud->deletePersona($rut);
                    $arraydeleper = mysqli_num_rows($fdeleteper);
                    if($arraydeleper == 1){
                        print "SE ELIMINO CON EXISTO PERSONA";
                    }else{
                        print "NO SE ELIMINO CON EXITO PERSONA";
                    }
                }else{
                    print "NO SE ELIMINO CON EXITO PERSONA";
                }
            }
        }
        if (isset ($iddireccion)){
            $fecha = $_POST['fechaNacimientoPaciente'];
            $prevision = $_POST['saludPaciente'];
            $clave = $_POST['clave1Paciente'];
            echo "PARTE3, rut:".$rut.";FECHA:".$fecha.";PREVISION:".$prevision.";CLAVE:".$clave.";DIRECCION:".$iddireccion;
            $nfilas = $clasecrud->insertaPaciente($rut, $fecha, $prevision, $iddireccion,$clave);
            echo "nfila".$nfilas;
            
            if($nfilas==1 || $nfilas == -1){
                print "SE REGISTRO CCON EXITO";
                print '<META HTTP-EQUIV="REFRESH" CONTENT="2, URL=../iniciar.php">';
            }else{
                print"ERROR...";
            }
        }
    }
}

?>


