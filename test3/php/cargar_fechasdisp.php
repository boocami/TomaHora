<?php 
require_once 'conexion.php';

function buscaFechas(){
  $mysqli = getConn();
  $id = $_POST['id']; //ESE ES EL NAME QUE LE DIMOS AL VALOR DEL AJAX 
  $query = "SELECT tfecha.idfecha,tfecha.fecha from tdisponibilidad,tfechahora,tfecha where tdisponibilidad.idfechahora=tfechahora.idfechahora and tfechahora.idfecha=tfecha.idfecha and tdisponibilidad.idstatus=3 and tdisponibilidad.idtrabaja=$id order by tfecha.fecha asc";
  $result = $mysqli->query($query);
  $fechas = '<option value="0">Seleccione una Fecha</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    //$fechas .= "<tr><td>".$row[fecha]."-".$row[hora]."<input type='radio' name='radiohora' value='".$row[hora]."'></td></tr>";
    $fechas .="<option value='$row[idfecha]'>$row[fecha]</option>";
  }
  return $fechas;
}

echo buscaFechas();