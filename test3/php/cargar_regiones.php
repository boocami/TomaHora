<?php 
require_once 'conexion.php';

function buscaRegion(){
  $mysqli = getConn();
  $query = 'SELECT * FROM `tregion`';
  $result = $mysqli->query($query);
  $regiones = '<option value="0">Seleccione Región</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $regiones .= "<option value='$row[idregion]'>$row[region]</option>";
  }
  return $regiones;
}

echo buscaRegion(); //DEVOLVER FUNCION Y NO RESULTADO