<?php
    
    function validacionRut(){
        $rut = $_POST['rutPaciente'];
        $numerosentrada = explode("-", $rut); //separo rut de dv
        $verificador = $numerosentrada[1]; //asigno valor de dv
        $numeros = strrev($numerosentrada[0]);  //separo rut de dv
        $count = strlen($numeros); //asigno la longitud del string en este caso 8
        $count = $count -1; //resto uno al contador para comenzar mi ciclo ya que las posiciones empiezan de 0
        $suma = 0;
        $recorreString = 0;
        $multiplo = 2;
        for ($i=0; $i <=$count ; $i++) {   //inicio ciclo hasta la posicion 7
            $resultadoM = $numeros[$recorreString]*$multiplo; // recorro string y multiplico 
            $suma = $suma + $resultadoM; // se suma resultado de multiplicacion por ciclo
            if ($multiplo == 7) { 
                $multiplo = 1;
            }
            $multiplo++;
            $recorreString++;
        }
        $resto = $suma%11;
        $dv= 11-$resto;
        if ($dv == 11) {
            $dv = 0;
        }
        if ($dv == 10) {
            $dv = K;
        }
        if ($verificador == $dv) {
            return true;
        }else {
          return false;
        }
    }

    function edadMayor(){
	    $fechanacimiento = $_POST['cumple'];
        //echo $fechanacimiento;
        //print "<br>";
        $ano = date("Y", strtotime($fechanacimiento));
        $mes = date("m", strtotime($fechanacimiento));
        $dia = date("d", strtotime($fechanacimiento)); 
        //echo $ano;
        //print "<br>";
        //echo $mes;
        //print "<br>";
        //echo $dia;
        //print "<br>";

        //FECHA ACTUAL 
        $diactual = date("d");
        $mesactual = date("m");
        $anoactual = date("Y");
        //echo $diactual;
        //print "<br>";
        //echo $mesactual;
        //print "<br>";
        //echo $anoactual;
        //print "<br>"; 
        $resta = $anoactual -$ano;
        //print $resta;
        if($resta > 17){
            if (($mesactual == $mes)&&($diactual == $dia) || ($mesactual > $mes)&&($diactual > $dia) ){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }        
    }
 ?>