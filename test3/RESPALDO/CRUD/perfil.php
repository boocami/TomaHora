<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>
            <?php
            session_start();
            if(!empty($_SESSION['usuario'])){
            
                print 'Perfil del usuario.....';
                print "Bienvenido usuario ".$_SESSION['usuario'];
                print '<br>';
                print '<a href="logout.php"> Cerrar Sesion</a>';
            
            }else{                
                print 'Acceso denegado, debe logearse...';
                print '<META HTTP-EQUIV="REFRESH" CONTENT="2, URL=registro.php">';
            }
            
            ?>
            
        </h1>
    </body>
</html>