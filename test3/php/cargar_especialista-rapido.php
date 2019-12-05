<?php 
require_once 'conexion.php';

function buscaespecialistarapido(){
  $mysqli = getConn();
  $id = $_POST['id']; //ESE ES EL NAME QUE LE DIMOS AL VALOR DEL AJAX 
  $centro=$_POST['centro'];
  //$query = "SELECT tpersona.primernombre,tpersona.primerapellido,tcentromedicodoctor.idtrabaja from tpersona,tdoctor,tcentromedicodoctor where tdoctor.rut=tpersona.rut and tdoctor.rut=tcentromedicodoctor.rut and tdoctor.idespecialidad=$id and tcentromedicodoctor.idcentomedico=$centro";
  $query = "SELECT tpersona.primernombre,tpersona.primerapellido,tdisponibilidad.iddisponibilidad,tfecha.fecha,thora.hora FROM tpersona,tdoctor,tespecialidad,tcentromedicodoctor,tdisponibilidad,tfecha,thora,tfechahora WHERE tpersona.rut=tdoctor.rut and tdoctor.rut=tcentromedicodoctor.rut and tespecialidad.idespecialidad=tdoctor.idespecialidad and tfechahora.idfecha=tfecha.idfecha and tfechahora.idhora=thora.idhora and tfechahora.idfechahora=tdisponibilidad.idfechahora and tdisponibilidad.idstatus=3 and tcentromedicodoctor.idtrabaja=tdisponibilidad.idtrabaja and tdisponibilidad.idtrabaja=(SELECT tcentromedicodoctor.idtrabaja from tpersona,tdoctor,tcentromedicodoctor where tdoctor.rut=tpersona.rut and tdoctor.rut=tcentromedicodoctor.rut and tdoctor.idespecialidad=$id and tcentromedicodoctor.idcentomedico=$centro) order by tfecha.fecha asc, thora.hora asc LIMIT 1";
  $result = $mysqli->query($query);
  //while($row = $result->fetch_array(MYSQLI_ASSOC)){
    //$especialista .= "<option value='$row[iddisponibilidad]'>$row[primernombre] $row[primerapellido] $row['fecha'] $row['hora']</option>";
  //}
  $esp=mysqli_fetch_assoc($result);
  $especialista="<option value='$esp[iddisponibilidad]'>$esp[primernombre] $esp[primerapellido] $esp['fecha'] $esp['hora']</option>";
  echo $especialista;
  return $especialista;
}

echo buscaespecialistarapido();
