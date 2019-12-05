<html>
    <head>
        <meta charset="UTF-8">
        <link href="estiloindex.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="js/valregistro.js"></script>
        
        
    </head>
    <body>
        <form name="form1" action="CRUD/ControladorRegistro.php" method="POST"><!--iNICIO DEL FORMULARIO-->
            <div id="signup-panel" >
                <div class="contenedor2">
                    <h3>Crea tu cuenta</h3>
                    <input type="text" name="rutPaciente" value="" placeholder="10200300-X" id="txt3"/>
                    <table>
                        <tr>
                            <td><input type="text" name="primerNombrePaciente"   placeholder="primer nombre"  id="txt4"></td>
                            <td><input type="text" name="segundoNombrePaciente"  placeholder="segundo nombre" id="txt5"></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td><input type="text" name="primerApellidoPaciente"   placeholder="apellido paterno"  id="txt6"></td>
                            <td><input type="text" name="segundoApellidoPaciente"  placeholder="apellido materno"  id="txt7"></td>
                        </tr>
                    </table>
                    <label>Ingrese fecha de nacimiento</label>
                    <input type="date"  name="fechaNacimientoPaciente" id="dt1"/>
                    <input type="radio" name="generoPaciente" id="rb1" value = "2"/>
                    <label class="labe" for="rb1">Femenino</label>
                    <input type="radio" name="generoPaciente" id="rb2" />
                    <label class="labe" for="rb2" value = "1">Masculino</label>
                    <table>
                        <tr>
                            <td><input type="email"  name="emailPaciente"    placeholder="Email"    id="mail1"></td>
                            <td><input type="number" name="telefonoPaciente" placeholder="Telefono" id="nbr1"></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td><input type="text"    name="callePaciente"       placeholder="Calle o Pasaje" id="txt8"></td>
                            <td><input type="text"    name="numeroCasaPaciente"  placeholder="numero casa"    id="txt9"></td>
                        </tr>
                    </table>
                    
                    <div class="select">
                        <select name="regionPaciente" id="sel1">
                            
                        </select> 
                    </div>
                    <div class="select">
                        <select name="comunaPaciente" id="sel2">
                            <option value="" >Seleccione Comuna</option>
                            
                        </select>    
                    </div>
                    <div class="select">   
                        <select name="saludPaciente" id="sel3">  
                            
                           
                        </select>       
                    </div>
                    
                    <input type="password" name="clave1Paciente" placeholder="Password"            id="txt10">
                    <input type="password" name="clave2Paciente" placeholder="Reingrese Pasword"   id="txt11">
                    <button class="signup-button" onclick="return validaSignupObligatorio()">Registrarse</button>			
                    <label>¿Ya tienes una cuenta? - <a href="#" onclick="window.location='index.php';">Iniciar sesión</a></label>
                </div>
            </div>
        </form><!--FIN DEL FORMULARIO--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
        </script>
        <script type="text/javascript" src="js/ajaxregistro.js"></script>
    </body>
</html>