function validaLoginObligatorio()
{
   var rutLogin   = document.getElementById("txt1").value;
   var claveLogin = document.getElementById("txt2").value;
    
   var expresionRegularRutLogin = /^[0-9]+[-|‐]{1}[0-9kK]{1}$/;
  
    
    if (rutLogin.length == 0 || rutLogin == null || rutLogin ==""){        
        alert ("DEBE INGRESAR SU RUT.....");
        return false;
        
    }else if (rutLogin.length > 11){        
        alert ("EL RUT DEBE TENER UN MAXIMO DE 11 CARACTERES....");
        return false;
    
    }else if (!expresionRegularRutLogin.test(rutLogin)){        
        alert ("ERROR...FORMATO DE RUT NO VALIDO ");
        return false;
        
    }else if (dvrut() == false){
       alert ("DIGITO VERIFICADOR INCORRECTO...");
       return false;
        
    }else if  (claveLogin.length == 0 || claveLogin == null || claveLogin == ""){        
        alert ("CLAVE NO INGRESADA....");
        return false;
           
    }else if (claveLogin.length != 4){
        alert("LA CLAVE DEBE SER DE 4 CARACTERES....");
        return false;       
    
     }
    
}