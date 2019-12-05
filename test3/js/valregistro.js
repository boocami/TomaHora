//FUNCIONES 

//-------------------------------------------------------------------------------------------------------
function obtenerDigito() {
    var rut = document.getElementById("txt1").value;
    var corte =  rut.split("-");
    var Srut = corte[0];
    var dv = corte[1];
    return dv;
}
//Si el digito verificador digitado es correcto del ingresar 
function dvrut(){
    var rut = document.getElementById('txt1').value;
    var codigo = rut.split("-");
    var suma = 0;	
    var mul  = 2;	
    var nrut = parseInt(codigo);
    
    for (i= rut.length; i > 0; i--)	{	
        var cifra = nrut % 10;
        var inverso = 0*10+cifra; 
        var resultado =  mul * inverso;
        suma = suma + resultado;
        nrut = parseInt(nrut / 10);
        if (mul == 7){			
            mul = 2;		
        }else{    			
            mul++;	
            }
    }
        var resto = suma %11;
        var verificador = 11 - resto;
      
    var verifica = obtenerDigito();
    if (verifica !='k' || verifica !='K'){
        var dni = parseInt(verifica);
        if(verificador == dni){
            return true;
        }else{
            return false;
        }
    }else if(verificador == 10){
        var dnk = 'k';
        if(dnk==verifica){
            return true;
        }else{
            return false
        }
    }else if(verificador == 11){
        var dn0 = 0;
        if (dn0 == verifica){
            return true;
        }else{
            return false;
        }
    } 
}
//--------------------------------------------------------------------------------------------
//FUNCION VERIFICA RUT REGISTRA...
function obtenerDigitoRegistra() {
    var rut = document.getElementById("txt3").value;
    var corte =  rut.split("-");
    var Srut = corte[0];
    var dv = corte[1];
    return dv;
}
//Si el digito verificador digitado es correcto del ingresar 
function dvrutRegistra(){
    var rut = document.getElementById('txt3').value;
    var codigo = rut.split("-");
    var suma = 0;	
    var mul  = 2;	
    var nrut = parseInt(codigo);
    
    for (i= rut.length; i > 0; i--)	{	
        var cifra = nrut % 10;
        var inverso = 0*10+cifra; 
        var resultado =  mul * inverso;
        suma = suma + resultado;
        nrut = parseInt(nrut / 10);
        if (mul == 7){			
            mul = 2;		
        }else{    			
            mul++;	
            }
    }
        var resto = suma %11;
        var verificador = 11 - resto;
      
    var verifica = obtenerDigitoRegistra();
    if (verifica !='k' || verifica !='K'){
        var dni = parseInt(verifica);
        if(verificador == dni){
            return true;
        }else{
            return false;
        }
    }else if(verificador == 10){
        var dnk = 'k';
        if(dnk==verifica){
            return true;
        }else{
            return false
        }
    }else if(verificador == 11){
        var dn0 = 0;
        if (dn0 == verifica){
            return true;
        }else{
            return false;
        }
    } 
}
//-----------------------------------------------------------------------------------------------------------------
//Calcular edad de una persona 

function edadPersona(){
    var date = new Date();
    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();
    if(month < 10){
        var fecha = `${day}-0${month}-${year}`;
        var fecha1 = fecha.split("-");
        var fFecha1 = (fecha1[0],fecha1[1]-1,fecha1[2]);
        var cumpleanos = document.getElementById("dt1").value;
        var cumpleanos1 = cumpleanos.split("-");
        var cCumpleanos1 = Date.UTC(cumpleanos1[0],cumpleanos1[1],cumpleanos1[2]);
        var hoy = parseInt(fecha1[2]); //AÃ±o actula
        var anoCumple = parseInt(cumpleanos1[0]); //AÃ±o del nacimineto
        var meshoy = parseInt(fecha1[1]-1);//MES AÃ‘O ACTUAL
        var mesCumple = parent(cumpleanos1[1]);//MES NACIMIENTO
        var diahoy = fecha1[0]; //DIA AÃ‘O ACTUAL
        var diacumple = cumpleanos1[2]; //DIA 
        var restano = hoy - anoCumple;
        var restames = meshoy - mesCumple;
       
        if (restano >17){ 
            if(meshoy > mesCumple){
                if(diahoy >= diacumple){
                    return true;
                }
                return false;
            }
            return false;
        }
    }else{
        alert(`${day}-${month}-${year}`);
    }
}

function validaSignupObligatorio(){
       
      var rutPaciente              = document.getElementById('txt3').value;
      var primerNombrePaciente     = document.getElementById('txt4').value;
      var segundoNombrePaciente    = document.getElementById('txt5').value;
      var primerApellidoPaciente   = document.getElementById('txt6').value;
      var segundoApellidoPaciente  = document.getElementById('txt7').value;  
      var fechaNacimientoPaciente  = document.getElementById('dt1').value;
      var emailPaciente            = document.getElementById('mail1').value;
      var telefonoPaciente         = document.getElementById('nbr1').value;
      var callePaciente            = document.getElementById('txt8').value;
      var numeroCasaPaciente       = document.getElementById('txt9').value;
      var comunaPaciente           = document.getElementById('sel2').value;
      var regionPaciente           = document.getElementById('sel1').value;
      var saludPaciente            = document.getElementById('sel3').value;
      var clave1Paciente           = document.getElementById('txt10').value;
      var clave2Paciente           = document.getElementById('txt11').value;
      
      var expresionRegularRutPaciente      = /^[0-9]+[-|â€]{1}[0-9kK]{1}$/;
      var expresionRegularFechaNacimiento  = /^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])$/;
      var expresionRegularCorreo           = /\w+@\w.+[a-z]/;
      var expresionRegularNombresYApellidos= /^([a-z Ã±Ã¡Ã©Ã­Ã³Ãº]{2,60})$/i;      
      
      
     //VALIDANDO ATRIBUTOS
     
    if (rutPaciente.length == 0 || rutPaciente == null || rutPaciente == ""){         
       alert ("DEBE  INGRESAR SU RUT....");
       return false;
         
    }else if (rutPaciente.length > 11){
        alert ("EL RUT DEBE TENER UN MAXIMO DE 11 CARACTERES..");
        return false;
         
    }else if (!expresionRegularRutPaciente.test(rutPaciente)){
        alert ("ERROR...FORMATO DE RUT NO VALIDO ");
        return false;
    
    }else if (dvrutRegistra() == false){
       alert ("RUT INCORRECTO...");
       return false;
        
    }else if (primerNombrePaciente.length == 0 || primerNombrePaciente == null ||  primerNombrePaciente == ""){
        alert ("DEBE INGRESAR EL PRIMER NOMBRE...");
        return false;
        
    }else if (!expresionRegularNombresYApellidos.test(primerNombrePaciente)){
        alert ("PRIMER NOMBRE NO DEBE CONTENER DIGITOS O CARACTERES ESPECIALES....");
        return false;
          
           
    }else if (segundoNombrePaciente.length == 0 || segundoNombrePaciente == null ||  segundoNombrePaciente == ""){
        alert ("DEBE INGRESAR EL SEGUNDO NOMBRE...");
        return false;
         
    }else if (!expresionRegularNombresYApellidos.test(segundoNombrePaciente)){
        alert ("SEGUNDO NOMBRE NO DEBE CONTENER DIGITOS O CARACTERES ESPECIALES...");
        return false;
   
    }else if (primerApellidoPaciente.length == 0 || primerApellidoPaciente == null ||  primerApellidoPaciente == ""){
        alert ("DEBE INGRESAR EL PRIMER APELLIDO...");
        return false;
        
    }else if (!expresionRegularNombresYApellidos.test(primerApellidoPaciente)){
        alert ("PRIMER APELLIDO NO DEBE CONTENER DIGITOS O CARACTERES ESPECIALES...");
        return false;
     
    }else if (segundoApellidoPaciente.length == 0 || segundoApellidoPaciente == null ||  segundoApellidoPaciente == ""){
        alert ("DEBE INGRESAR EL SEGUNDO APELLIDO...");
        return false;
        
    }else if (!expresionRegularNombresYApellidos.test(segundoApellidoPaciente)){
        alert("SEGUNDO APELLIDO NO DEBE CONTENER DIGITOS O CARACTERES ESPECIALES....");
        return false;
            
    }else if (fechaNacimientoPaciente.length==0 || fechaNacimientoPaciente == null || fechaNacimientoPaciente == ""){
        alert ("DEBE INGRESAR LA FECHA DE NACIMIENTO DEL PACIENTE....");
        return false;
            
    }else if (!expresionRegularFechaNacimiento.test(fechaNacimientoPaciente)){            
        alert ("FECHA INGRESADA NO VALIDA...");
        return false;
    
    }else if ( edadPersona()==false){
        alert ("EL PACIENTE DEBE SE MAYOR DE EDAD PARA AGENDAR UNA HORA...");
        return false;
              
    }else if (!document.getElementById("rb1").checked && !document.getElementById("rb2").checked ){
        alert ("DEBE ESCOGER SELECCIONAR SU SEXO...");
        return false;
            
    }else if (emailPaciente.length == 0 || emailPaciente == null || emailPaciente == ""){  
        alert("DEBE INGRESAR EL CORREO ELECTRONICO");
        return false;
       
    }else if (!expresionRegularCorreo.test(emailPaciente)){     
        alert ("CORREO ELECTRONICO NO VALIDO.........................");
        return false;
            
    }else if (telefonoPaciente.length == 0 || telefonoPaciente == null || telefonoPaciente == ""){           
        alert ("DEBE INGRESAR NUMERO TELEFONO PACIENTE");
        return false; 
         
    }else if (isNaN(telefonoPaciente)){
        alert ("DEBE INGRESAR DIGITOS PARA EL NÃšMERO DE TELEFONO......");
        return false;
         
    }else if (telefonoPaciente.length !=9){            
        alert("NUMERO TELEFONICO DEBE TENER 9 DIGITOS................");
        return false;
            
    }else if (callePaciente.length == 0 || callePaciente == null ||  callePaciente == ""){              
        alert ("DEBE INGRESAR EL NOMBRE DE LA CALLE DONDE VIVE EL PACIENTE...");
        return false;
        
    }else if (numeroCasaPaciente.length == 0 || numeroCasaPaciente == null || numeroCasaPaciente == ""){            
        alert ("DEBE INGRESAR EL NUMERO DE DOMICILIO");
        return false;
          
    }else if (numeroCasaPaciente.length < 0 ||  numeroCasaPaciente.length > 5){            
        alert ("EL NUMERO DE CARACTERES DEBE ESTAR ENTRE 1 Y 5.......");
        return false;
            
    }else if (regionPaciente == 0){           
        alert ("DEBE SELECCIONAR UNA COMUNA....");
        return false;
           
    }else if (comunaPaciente == 0){           
        alert ("DEBE SELECCIONAR UNA REGION....");
        return false;
           
    }else if (saludPaciente == 0 ){       
        alert ("DEBE SELECCIONAR PREVISION....");
        return false;
        
    }else if  (clave1Paciente.length == 0 || clave1Paciente == null || clave1Paciente == "" ){        
       alert ("DEBE INGRESAR SU CLAVE........................");
       return false;
        
             
    }else if (clave1Paciente.length!=4){           
        alert ("LA CLAVE DEBE TENER CUATRO CARACTERES.........")
        return false;
           
    }else if  (clave2Paciente.length == 0 || clave2Paciente == null || clave2Paciente == "" ){            
        alert ("DEBE CONFIRMAR SU CLAVE....");
        return false;
          
    }else if (clave2Paciente.length!=4){            
        alert ("SU CONTRASEÃ‘AS DEBE TENER CUATRO CARACTERES...");
        return false;
            
    }else if (clave2Paciente != clave1Paciente){            
        alert ("LAS CONTRASEÃ‘AS INGRESADAS DEBEN SER IGUALES...");
        return false;
    }
       
    }
    