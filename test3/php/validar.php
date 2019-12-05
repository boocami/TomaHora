<?php
include("funciones.php");
$rut = ['rutPaciente'];
$pnombre = $_POST['primerNombrePaciente'];
$snombre = $_POST['segundoNombrePaciente'];
$papellido = $_POST['primerApellidoPaciente'];
$sapellido = $_POST['segundoApellidoPaciente'];
$fechaNacimientoPaciente = $_POST['fechaNacimientoPaciente'];
$emailPaciente = $_POST['emailPaciente'];
$telefonoPaciente = $_POST['telefonoPaciente'];
$callePaciente = $_POST['callePaciente'];
$numeroCasaPaciente = $_POST['numeroCasaPaciente'];
$regionPaciente = $_POST['regionPaciente'];
$comunaPaciente = $_POST['comunaPaciente'];
$saludPaciente = $_POST['saludPaciente'];
$clave1Paciente = $_POST['clave1Paciente'];
$clave2Paciente = $_POST['$clave2Paciente'];

if($rut=="" || strlen($rut) == 0 || $rut == null){
    echo "DEBE  INGRESAR SU RUT....";
    return false;
}else if($rut <11){
    echo "EL RUT DEBE TENER UN MAXIMO DE 11 CARACTERES..";
    return false;
}else if(validacionRut()==true){
    echo "RUT INCORRECTO...";
    return false;   
}else if($pnombre ="" || strlen($pnombre) || $pnombre == null){
    echo "DEBE INGRESAR EL PRIMER NOMBRE...";
    return false;
}else if(preg_match("[a-zA-ZÀ-ÖØ-öø-ÿ]+\.?(( |\-)[a-zA-ZÀ-ÖØ-öø-ÿ]+\.?)*",$pnombre){
    echo "PRIMER NOMBRE NO DEBE CONTENER DIGITOS O CARACTERES ESPECIALES....";
    return false;
}else if($snombre ="" || strlen($snombre) || $snombre == null){
    echo "DEBE INGRESAR EL SEGUNDO NOMBRE...";
    return false;
}else if(preg_match("[a-zA-ZÀ-ÖØ-öø-ÿ]+\.?(( |\-)[a-zA-ZÀ-ÖØ-öø-ÿ]+\.?)*",$snombre){
    echo "SEGUNDO NOMBRE NO DEBE CONTENER DIGITOS O CARACTERES ESPECIALES...";
    return false;
}else if($papellido ="" || strlen($papellido) || $papellido == null){
    echo "DEBE INGRESAR EL PRIMER APELLIDO...";
    return false;
}else if(preg_match("[a-zA-ZÀ-ÖØ-öø-ÿ]+\.?(( |\-)[a-zA-ZÀ-ÖØ-öø-ÿ]+\.?)*",$papellido){
    echo "PRIMER APELLIDO NO DEBE CONTENER DIGITOS O CARACTERES ESPECIALES...";
    return false;
}else if($sapellido ="" || strlen($sapellido) || $sapellido == null){
    echo "DEBE INGRESAR EL SEGUNDO APELLIDO...";
    return false;
}else if(preg_match("[a-zA-ZÀ-ÖØ-öø-ÿ]+\.?(( |\-)[a-zA-ZÀ-ÖØ-öø-ÿ]+\.?)*",$sapellido){
    echo "SEGUNDO APELLIDO NO DEBE CONTENER DIGITOS O CARACTERES ESPECIALES....";
    return false;
}else if (strlen($fechaNacimientoPaciente)==0 || $fechaNacimientoPaciente == null || $fechaNacimientoPaciente == ""){
    echo "DEBE INGRESAR LA FECHA DE NACIMIENTO DEL PACIENTE....";
    return false;
}else if ( edadMayor()==false){
    echo "EL PACIENTE DEBE SE MAYOR DE EDAD PARA AGENDAR UNA HORA...";
    return false;         
}else if(!isset($_POST['generoPaciente']) ) {
    echo "DEBE ESCOGER SELECCIONAR SU SEXO...";
    return false;
}else if (strlen($emailPaciente)== 0 || $emailPaciente == null || $emailPaciente == ""){  
    echo "DEBE INGRESAR EL CORREO ELECTRONICO";
    return false;
}else if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$emailPaciente)){
    echo "DEBE INGRESAR EL CORREO ELECTRONICO";
    return false;
}else if (strlen($telefonoPaciente) == 0 || $telefonoPaciente == null || $telefonoPaciente == ""){           
    echo "DEBE INGRESAR NUMERO TELEFONO PACIENTE";
    return false; 
     
}else if (isNaN($telefonoPaciente)){
    echo "DEBE INGRESAR DIGITOS PARA EL NÃšMERO DE TELEFONO......";
    return false;
     
}else if (strlen($telefonoPaciente) !=9){            
    echo "NUMERO TELEFONICO DEBE TENER 9 DIGITOS................";
    return false;
        
}else if (strlen($callePaciente) == 0 || $callePaciente == null ||  $callePaciente == ""){              
    echo"DEBE INGRESAR EL NOMBRE DE LA CALLE DONDE VIVE EL PACIENTE...";
    return false;
    
}else if (strlen($numeroCasaPaciente) == 0 || $numeroCasaPaciente == null || $numeroCasaPaciente == ""){            
    echo "DEBE INGRESAR EL NUMERO DE DOMICILIO";
    return false;
      
}else if (strlen($numeroCasaPaciente) < 0 ||  strlen($numeroCasaPaciente) > 5){            
    echo "EL NUMERO DE CARACTERES DEBE ESTAR ENTRE 1 Y 5.......";
    return false;
        
}else if ($regionPaciente == 0){           
    echo "DEBE SELECCIONAR UNA COMUNA....";
    return false;
       
}else if ($comunaPaciente == 0){           
    echo "DEBE SELECCIONAR UNA REGION....";
    return false;
       
}else if ($saludPaciente == 0){       
    echo "DEBE SELECCIONAR PREVISION....";
    return false;
    
}else if  (strlen($clave1Paciente) == 0 || $clave1Paciente == null || $clave1Paciente == "" ){        
   alert ("DEBE INGRESAR SU CLAVE........................");
   return false;
    
}else if (strlen($clave1Paciente)!=4){           
    alert ("LA CLAVE DEBE TENER CUATRO CARACTERES.........")
    return false;
       
}else if  (strlen($clave2Paciente) == 0 || $clave2Paciente == null || $clave2Paciente == "" ){            
    alert ("DEBE CONFIRMAR SU CLAVE....");
    return false;
      
}else if (srtlen($clave2Paciente) !=4){            
    alert ("SU CONTRASEÃ‘AS DEBE TENER CUATRO CARACTERES...");
    return false;
        
}else if ($clave2Paciente != $clave1Paciente){            
    alert ("LAS CONTRASEÃ‘AS INGRESADAS DEBEN SER IGUALES...");
    return false;
}

?>