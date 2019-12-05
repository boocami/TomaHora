<?php 
require_once 'conexion.php';

function buscaComuna(){
  $mysqli = getConn();
  $id = $_POST['id']; //ESE ES EL NAME QUE LE DIMOS AL VALOR DEL AJAX 
  $query = "SELECT * FROM `tcomuna` WHERE idregion = $id";
  $result = $mysqli->query($query);
  $comunas = '<option value="0">Elige una opción</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $comunas .= "<option value='$row[idcomuna]'>$row[comuna]</option>";
  }
  return $comunas;
}

echo buscaComuna();
