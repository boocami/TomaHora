<?php

class ClaseConecta {
    
    public function conecta(){
        // declaracion de variables para conectarse al servidor.
        $host = 'localhost';
        $user = 'root';
        $database = 'proyectohoramedica';
        $password = '';
        //manejo de excepciones.
        try{
            //hacemos la conexion a la base de datos.
            $conexion = mysqli_connect($host, $user, $password, $database);
            return $conexion;
            
        }catch(mysqli_sql_exception $error){            
            print $error->getMessage();
            exit();
        }               
    }                
}

?>