<?php
include ("Crud.php");
$rut = $_POST['usuario'];
print "rut".$rut;
$clasecrud = new ClaseCrud();
$arrayrut = $clasecrud->buscarPorRut($rut);//Buscamos si el rut existe en la base da datos.
$existerut = mysqli_num_rows($arrayrut);//Revisamos cuantas filas nos entrega la consulta.

if ($existerut == 1 ) {
    $clave = $_POST['pass'];
    print "clave".$clave;
    $contrasena = $clasecrud->buscarClave($rut);
    print "clave base de dato".$contrasena;
    if($contrasena == $clave){
     //login exitoso....
        print "Login exitoso";
        //vamos a crear la sesion para el usuario validado.
        session_start();
        $_SESSION['usuario'] = $rut;
        //$_SESSION['nombre'] = $nombre; podemos crear las variables de sesion que sean necesarias.
        print '<META HTTP-EQUIV="REFRESH" CONTENT="2, URL=perfil.php">';
    }else{
        print "ERROR...EL USUARIO O CLAVE ES INCORRECTA";
    }       
}else{
    print "ERROR...EL USUARIO O CLAVE ES INCORRECTA";
}