<?php 
require_once 'conexion.php';

function buscaespecialista(){
  $mysqli = getConn();
  $id = $_POST['id']; //ESE ES EL NAME QUE LE DIMOS AL VALOR DEL AJAX 
  $centro=$_POST['centro'];
  $query = "SELECT tpersona.primernombre,tpersona.primerapellido,tcentromedicodoctor.idtrabaja from tpersona,tdoctor,tcentromedicodoctor where tdoctor.rut=tpersona.rut and tdoctor.rut=tcentromedicodoctor.rut and tdoctor.idespecialidad=$id and tcentromedicodoctor.idcentomedico=$centro";
  $result = $mysqli->query($query);
  $especialista = '<option value="0">Seleccione un Especialista</option>'; //BUSCAR CODIGO DEL DOC!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $especialista .= "<option value='$row[idtrabaja]'>$row[primernombre] $row[primerapellido]</option>";
  }
  return $especialista;
}

echo buscaespecialista();
