<?php 
require_once 'conexion.php';

function buscaPrevision(){
  $mysqli = getConn();
  $query = 'SELECT * FROM `tprevision`';
  $result = $mysqli->query($query);
  $prevision = '<option value="0">Seleccione Previsión</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $prevision .= "<option value='$row[prevision]'>$row[nombreprevision]</option>";
  }
  return $prevision;
}

echo buscaPrevision(); //DEVOLVER FUNCION Y NO RESULTADO