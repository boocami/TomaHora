<?php
            session_start();
            if(!empty($_SESSION['usuario'])){
            
                session_destroy(); //destruye la o las variables de sesion creadas.
                print 'Sesion finalizada';
                print '<META HTTP-EQUIV="REFRESH" CONTENT="2, URL=../iniciar.php">';
            }else{                
                print 'Acceso denegado, debe logearse...';
                print '<META HTTP-EQUIV="REFRESH" CONTENT="2, URL=../iniciar.php">';
            }
                
                
            
            
            
            ?>


