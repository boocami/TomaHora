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
        <link href="css/agendar2.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="validacionesAgendaRapida.js"></script>
    </head>
    <body>
        <form class="panel" id="slice" action="CRUD/ControladorAgendar.php" method="POST"> 
        <div class="div1">
            <div class="titulo">
                <h2 class="heading-title">Reserva de hora medica2</h2>
            </div>
            <div class="panel-body">
                <label>Centro médico de preferencia</label>
                <select name="centroMedico" id="sel4">   
                </select>
                <label>Especialidad</label>
                <select name="especialidadMedica" id="sel5">
                    <option value="0">Seleccione una Especialidad</option>
                </select>
                <label>Seleccione Un Especialista</label>
                <select name="medicoEspecialidad" id="sel6">
                    <option value="0">Seleccione un Especialista</option>
                </select>
                <h2>Fechas disponibles</h2>
                <select name="fechas" id="sel7">
                    <option value="0">Seleccione una Fecha</option>
                </select>
                <h2>Horas disponibles</h2>
                <select name="horas" id="sel8" onfocus='this.size=10;' onblur='this.size=1;'onchange='this.size=1; this.blur();'>
                    <option value="0">Seleccione una Hora</option>
                </select>
            </div><!--fin panel-body-->
           
            
            
            <div class="botonera" style="height: 80px;">
                <input class="btn-reservar" type="submit" value="Reservar">
                <a class="btn-volver"    href="" style="text-decoration:none;">Volver</a>    
                
            </div>
            
        </div><!--fin div1-->    
        
        </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
        </script>
        <script type="text/javascript" src="js/ajaxagendar.js"></script>
    </body>
</html>
