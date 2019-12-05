<?php
//FUNCIONES 
 include ("ClaseConecta.php");
 
 class ClaseCrud {
          
  public function insertaPersona($rut, $pnombre, $snombre, $papellido, $sapellido, $telefono, $email, $genero){
      
      $query = "insert into tpersona values ('$rut', '$pnombre', '$snombre', '$papellido', '$sapellido', $telefono, '$email', $genero)";
      //llamo a la base de datos..
      $link = ClaseConecta::conecta(); // cuando aparece claseConecta:: es un self.      
      mysqli_query($link, $query); //metodo de php que ejecuta sql, necesita la conexion y la consulta.
      $nfilas = mysqli_affected_rows($link); //metodo que devuelve la cantidad de filas insertadas, y necesita la conexion.
      return $nfilas;
      mysqli_close($link);
  }

  public function insertaDireccion($numerocasa,$calle,$idcomuna){
    $query = "insert into tdireccion (numerocasa,calle,idcomuna) values ('$numerocasa','$calle',$idcomuna)";
    //llamo a la base de datos..
    $link = ClaseConecta::conecta(); // cuando aparece claseConecta:: es un self.      
    mysqli_query($link, $query); //metodo de php que ejecuta sql, necesita la conexion y la consulta.
    $nfilas = mysqli_affected_rows($link); //metodo que devuelve la cantidad de filas insertadas, y necesita la conexion.
    return $nfilas;
    mysqli_close($link);
  }
  public function buscarDireccion($numerocasa,$calle,$idcomuna){
      $query = "select tdireccion.iddireccion from tdireccion where tdireccion.numerocasa = '$numerocasa' and tdireccion.calle = '$calle' and tdireccion.idcomuna = $idcomuna";
      $link = ClaseConecta::conecta();
      //$array = mysqli_fetch_assoc(mysqli_query($link, $query));
      $array = mysqli_query($link, $query);
      //$direccion = $array['iddireccion'];
      return $array;
      mysqli_close($link);
  }
  public function insertaPaciente($rut,$fecha,$prevision,$iddireccion,$clave){
      $query = "insert into tpaciente values('$rut', '$fecha', $prevision, $iddireccion, '$clave')";
      $link = ClaseConecta::conecta(); // cuando aparece claseConecta:: es un self.      
      mysqli_query($link, $query); //metodo de php que ejecuta sql, necesita la conexion y la consulta.
      $nfilas = mysqli_affected_rows($link); //metodo que devuelve la cantidad de filas insertadas, y necesita la conexion.
      return $nfilas;
      mysqli_close($link);
  }
  public function buscarPorRut($rut){
    $query = "select * from tpersona where rut = '$rut'";
    $link = ClaseConecta::conecta();
    $array = mysqli_query($link, $query);
    return $array;
    mysqli_close($link);
  }
  public function buscarClave($rut){
    $query = "select `clave` from tpaciente WHERE `rut` = '$rut'";
    $link = ClaseConecta::conecta();
    $array = mysqli_fetch_assoc(mysqli_query($link, $query));
    $clave = $array['clave'];
    return $clave;
    mysqli_close($link);
  }
 }

?>