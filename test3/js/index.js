$(document).ready(function(){ //CUANDO RECARGA LA PAGINA SE EJECUTARA EL CODIGO
  $.ajax({ //SE CREA EL AJAX
    type: 'POST', // TIPO DE AJAX
    url: 'php/cargar_regiones.php' //DIRECCION DONDE VA A MANDAR Y BUSCAR LOS DATOS
  })
  .done(function(regiones){ //CUANDO TERMINE LO ANTERIOR 
    $('#sel1').html(regiones) //LO QUE ENCUNTRA VA A INGRESARSE A SEL1, EL CUAL LO DEVUELVE COMO UN HTML
  })
  .fail(function(){
    alert('Hubo un error al cargar los videos');
  })
  $(document).ready(function(){ //CUANDO RECARGA LA PAGINA SE EJECUTARA EL CODIGO
    $.ajax({ //SE CREA EL AJAX
      type: 'POST', // TIPO DE AJAX
      url: 'php/cargar_prevision.php' //DIRECCION DONDE VA A MANDAR Y BUSCAR LOS DATOS
    })
    .done(function(prevision){ //CUANDO TERMINE LO ANTERIOR 
      $('#sel3').html(prevision) //LO QUE ENCUNTRA VA A INGRESARSE A SEL1, EL CUAL LO DEVUELVE COMO UN HTML
    })
    .fail(function(){
      alert('Hubo un error al cargar prevision');
    })
  })

  $('#sel1').on('change', function(){ //SI CAMBIA SEL11  SE EJECUTA LA FUNCION
    var id = $('#sel1').val() // LA VARIABLE ID VA A TOMAR EL VALOR DEL VALUE DE SEL1
    $.ajax({ // SE CRE EL AJAX
      type: 'POST', //TIPO DE AJAX, POST
      url: 'php/cargar_comunas.php', // LA URL DONDE SE EJECUTA EL AJAX
      data: {'id': id} //EL NOMBRE : VALOR ----> SE VA A PORCESAR
    })
    .done(function(comunas){ ////CUANDO TERMINE LO ANTERIOR 
      $('#sel2').html(comunas) ////LO QUE ENCUNTRA VA A INGRESARSE A SEL2, EL CUAL LO DEVUELVE COMO UN HTML
    })
    .fail(function(){
      alert('Hubo un error al cargar los las comunas');
    })
  })

})