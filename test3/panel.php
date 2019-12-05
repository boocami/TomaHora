<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/panel.css" rel="stylesheet" type="text/css">
        <title></title>
    </head>
    <body>
        <form>
        <div class="div1">
            <div class="panel panel-primary">
                <div class="panel-heading" style="height: 250px;">
                    <h2 class="heading-title"> 
                        Reservar Hora
                    </h2>
                    <br>
                    <input type="button" class="btn-pequeño" value="Reservar Hora" onclick="window.location='agendar2.php';">			
                    <br>
                    <br>
                    <input type="button" class="btn-grande" value="Agendar Hora Medica Rapida" onclick="window.location='agendar2.php';">			
                    <br>
                    <br>
                    <input type="button" class="btn-pequeño" value="Anular Hora Medica" onclick="window.location='agenda-rapida.php';">			
                    <br>
                </div>
                <div class="panel-body" style="height: 168px;"> 
                    <h2 class="heading-title">Servicios en línea</h2>
                    <br>
                    <input type="button" class="btn-grande" value="Consultar Mis horas medicas" onclick="window.location='consultar0.php';">			
                    <br>
                    <br>
                    <input type="button" class="btn-pequeño" value="Cerrar Seccion" onclick="window.location='php/logout.php';">			
                </div>
            </div>
        </div>
        </form>
    </body>
</html>