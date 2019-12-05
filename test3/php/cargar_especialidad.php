<?php 
require_once 'conexion.php';

function buscaespecialidad(){
  $mysqli = getConn();
  $id = $_POST['id']; //ESE ES EL NAME QUE LE DIMOS AL VALOR DEL AJAX 
  $query = "SELECT tespecialidad.especialidad, tespecialidad.idespecialidad from tespecialidad,tdoctor where tespecialidad.idespecialidad=tdoctor.idespecialidad and tdoctor.rut in (select tcentromedicodoctor.rut from tcentromedicodoctor where tcentromedicodoctor.idcentomedico=$id)";
  $result = $mysqli->query($query);
  $especialidad = '<option value="0">Seleccione una Especialidad</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $especialidad .= "<option value='$row[idespecialidad]'>$row[especialidad]</option>";
  }
  return $especialidad;
}

echo buscaespecialidad();
