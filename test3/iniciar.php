<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/estiloindex.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="validaciones.js"></script>
    </head>
    <body>
        <form name="form1" action="CRUD/ControladorInicio.php" method="POST"><!--iNICIO DEL FORMULARIO-->
            
            <!--Panel de iniciar sesion--> 
            <div id="login-panel">    
                <div class="contenedor1">
                    <h3>Iniciar sesión</h3>
                    <div class="form" onsubmit="return validaLoginObligatorio()">
                        <input type="text"     name="usuario"  placeholder="10200300-X"  id="txt1">
                        <input type="password" name="pass" placeholder="Password"    id="txt2">
                        <input class="login-button" type="submit" value="Entrar">
                        <input type="button" class="signup-button" value="Regístrate" onclick="window.location='registrar.php';">			
                    </div>
                </div>
            </div>
        </form><!--FIN DEL FORMULARIO-->    
    </body>
</html>