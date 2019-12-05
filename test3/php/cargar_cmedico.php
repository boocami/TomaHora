<?php 
require_once 'conexion.php';

function buscaCMedico(){
  $mysqli = getConn();
  $query = 'SELECT idcentromedico,centro FROM `tcentromedico`';
  $result = $mysqli->query($query);
  $centros = '<option value="0">Seleccione Centro Médico</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $centros .= "<option value='$row[idcentromedico]'>$row[centro]</option>";
  }
  return $centros;
}

echo buscaCMedico(); //DEVOLVER FUNCION Y NO RESULTADO