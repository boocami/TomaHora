$(document).ready(function(){ //CUANDO RECARGA LA PAGINA SE EJECUTARA EL CODIGO
  $.ajax({ //SE CREA EL AJAX
    type: 'POST', // TIPO DE AJAX
    url: 'php/cargar_cmedico.php' //DIRECCION DONDE VA A MANDAR Y BUSCAR LOS DATOS
  })
  .done(function(cmedico){ //CUANDO TERMINE LO ANTERIOR 
    $('#sel4').html(cmedico) //LO QUE ENCUNTRA VA A INGRESARSE A SEL1, EL CUAL LO DEVUELVE COMO UN HTML
  })
  .fail(function(){
    alert('Hubo un error al cargar los centros medicos');
  })

  $('#sel4').on('change', function(){ //SI CAMBIA SEL11  SE EJECUTA LA FUNCION
    var id = $('#sel4').val() // LA VARIABLE ID VA A TOMAR EL VALOR DEL VALUE DE SEL1
    $.ajax({ // SE CRE EL AJAX
      type: 'POST', //TIPO DE AJAX, POST
      url: 'php/cargar_especialidad.php', // LA URL DONDE SE EJECUTA EL AJAX
      data: {'id': id} //EL NOMBRE : VALOR ----> SE VA A PORCESAR
    })
    .done(function(especialidad){ ////CUANDO TERMINE LO ANTERIOR 
      $('#sel5').html(especialidad) ////LO QUE ENCUNTRA VA A INGRESARSE A SEL2, EL CUAL LO DEVUELVE COMO UN HTML
    })
    .fail(function(){
      alert('Hubo un error al cargar la especialidad');
    })
  })
  $('#sel5').on('change', function(){ //SI CAMBIA SEL11  SE EJECUTA LA FUNCION
    var id = $('#sel5').val() // LA VARIABLE ID VA A TOMAR EL VALOR DEL VALUE DE SEL1
    var centro= $('#sel4').val()
    $.ajax({ // SE CRE EL AJAX
      type: 'POST', //TIPO DE AJAX, POST
      url: 'php/cargar_especialista.php', // LA URL DONDE SE EJECUTA EL AJAX
      data: {'id': id,'centro': centro} //EL NOMBRE : VALOR ----> SE VA A PORCESAR
    })
    .done(function(especialista){ ////CUANDO TERMINE LO ANTERIOR 
      $('#sel6').html(especialista) ////LO QUE ENCUNTRA VA A INGRESARSE A SEL2, EL CUAL LO DEVUELVE COMO UN HTML
    })
    .fail(function(){
      alert('Hubo un error al cargar los especialistas');
    })
  })
  $('#sel6').on('change', function(){ //SI CAMBIA SEL11  SE EJECUTA LA FUNCION
    var id = $('#sel6').val() // LA VARIABLE ID VA A TOMAR EL VALOR DEL VALUE DE SEL1
    $.ajax({ // SE CRE EL AJAX
      type: 'POST', //TIPO DE AJAX, POST
      url: 'php/cargar_fechasdisp.php', // LA URL DONDE SE EJECUTA EL AJAX
      data: {'id': id} //EL NOMBRE : VALOR ----> SE VA A PORCESAR
    })
    .done(function(fechas){ ////CUANDO TERMINE LO ANTERIOR 
      $('#sel7').html(fechas) ////LO QUE ENCUNTRA VA A INGRESARSE A SEL2, EL CUAL LO DEVUELVE COMO UN HTML
    })
    .fail(function(){
      alert('Hubo un error al cargar las fechas');
    })
  })
  $('#sel7').on('change', function(){ //SI CAMBIA SEL11  SE EJECUTA LA FUNCION
    var id = $('#sel7').val()
    var idtrabaja = $('#sel6').val() // LA VARIABLE ID VA A TOMAR EL VALOR DEL VALUE DE SEL1
    $.ajax({ // SE CRE EL AJAX
      type: 'POST', //TIPO DE AJAX, POST
      url: 'php/cargar_horasdisp.php', // LA URL DONDE SE EJECUTA EL AJAX
      data: {'id': id,'idtrabaja':idtrabaja} //EL NOMBRE : VALOR ----> SE VA A PORCESAR
    })
    .done(function(horas){ ////CUANDO TERMINE LO ANTERIOR 
      $('#sel8').html(horas) ////LO QUE ENCUNTRA VA A INGRESARSE A SEL2, EL CUAL LO DEVUELVE COMO UN HTML
    })
    .fail(function(){
      alert('Hubo un error al cargar las horas');
    })
  })

})

