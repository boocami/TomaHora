<!DOCTYPE html>
<?php
$conexion = mysqli_connect('localhost', 'root', '', 'proyectohoramedica');
session_start();
$rut = $_SESSION['usuario'];
$query1 = "SELECT tpersona.primernombre,tpersona.primerapellido,tfecha.fecha,thora.hora,treserva.idreserva,tespecialidad.especialidad,tcentromedico.centro FROM tpersona,tdoctor,tespecialidad,tfecha,thora,tfechahora,tcentromedico,tcentromedicodoctor,tdisponibilidad,treserva WHERE tpersona.rut=tdoctor.rut and tespecialidad.idespecialidad=tdoctor.idespecialidad and tdoctor.rut=tcentromedico.rut and tcentromedico.idcentromedico=tcentromedicodoctor.idcentromedico and thora.idhora=tfechahora.idhora and tfecha.idfecha=tfechahora.idfecha and tdisponibilidad.idfechahora=tfechahora.idfechahora and centromedicodoctor.idtrabaja=tdisponibilidad.idtrabaja and treserva.iddisponibilidad=tdisponibilidad.iddisponibilidad and treserva.rut= '$rut'";    
$arreglo1 = mysqli_query($conexion, $query1);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="consultar.css" rel="stylesheet" type="text/css">
        </head>
    <body>
        <form class="panel" id="slice">
               
            <div class="div1">
                <div class="titulo" style="height: 40px;">
                    <h2 class="heading-title">Horas Reservadas</h2>
                </div>
                    <div class="panel-body">
                        
                    <div class="horas">
                    <?php
                                foreach ($arreglo1 as $fila) {
                                    print '<label>'.$fila['primernombre'].' '.$fila['primerapellido'].' '.$fila['especialidad'].' '.$fila['centro'].' '.$fila['fecha'].' '.$fila['hora'].'</label><input type="radio" name="eliminar" value="'.$fila['idreserva'].'>'; 
                                }
                            ?>
                    </div> 
                    <div class="panel-botones" style="height: 80px;">
                        <br>
                        <input type="submit" class="btn-reservar" value="Anular">
                        <a class="btn-continuar" href="" style="text-decoration:none;">Anular</a>
                        <a class="btn-volver" href="" style="text-decoration:none;">Volver</a>
                    </div>
                </div>
            </div>    
        </form>
    </body>
</html>
