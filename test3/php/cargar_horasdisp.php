<?php 
require_once 'conexion.php';

function buscaHoras(){
  $mysqli = getConn();
  $id = $_POST['id']; //ESE ES EL NAME QUE LE DIMOS AL VALOR DEL AJAX 
  $idtrabaja=$_POST['idtrabaja'];
  //$query = "SELECT thora.hora,thora.idhora from tdisponibilidad,tfechahora,tfecha,thora where tdisponibilidad.idfechahora=tfechahora.idfechahora and tfechahora.idfecha=tfecha.idfecha and tfechahora.idhora=thora.idhora and tdisponibilidad.idstatus=3 and tdisponibilidad.idtrabaja=$idtrabaja and thora.idhora=$id";
  $query="SELECT thora.hora,thora.idhora FROM tdisponibilidad,tfechahora,tfecha,thora WHERE tdisponibilidad.idfechahora=tfechahora.idfechahora and  tfechahora.idfecha=tfecha.idfecha and tfechahora.idhora=thora.idhora and tdisponibilidad.idstatus=3 and tdisponibilidad.idtrabaja=$idtrabaja and tfecha.idfecha=$id order by thora.hora asc";
  $result = $mysqli->query($query);
  $horas = '<option value="0">Seleccione una Hora</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $horas .= "<option value='$row[idhora]'>$row[hora]</option>";
  }
  return $horas;
}

echo buscaHoras();