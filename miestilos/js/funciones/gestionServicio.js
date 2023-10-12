
$(document).ready(function() {
  // Global Settings

  listarServicios();

//inicio listar servicios
 function listarServicios()
  {
  
   $.ajax({
    url:'../servicios/listaServicios',
    type:'POST',
    success:function(response){
      
      let servicio= JSON.parse(response);
      console.log(servicio);
      let template= "";
      var i=1;

      servicio.forEach(servicio=>{
        template+=`
        <tr servicioId=${servicio.id}>
        <td>${i}</td>

        <td>${servicio.nombre}</td>
        <td >${servicio.medida}</td>
        <td style="text-align: right;">${servicio.precio}</td>
        <td style="text-align: right;">${servicio.maximo}</td>

        <td >${servicio.descriccion}</td>

        <td class="d-flex"> 
       
        <button title="Editar"  type="submit" class="editarServicio btn btn-sm btnt-primary" data-target="#ModificarProveedor" ><i class="fa-solid fa-pen-to-square fa-lg text-warning"></i></button> 
       <button title="Eliminar"  class="eliminarServicio btn btn-sm btnt-primary"><i class="fa-solid fa-trash  fa-lg text-danger"></i></button>
        </td>
       </tr>
        `
        i++;
      });
      $('#servicioT').html(template); 
    }
  });
 }//fin lista servicions

//68522817

//eliminar empleados 
 $(document).on('click','.eliminarServicio', function(){
 
  if(confirm('Esta seguro de eliminar')){

    let element=$(this)[0].parentElement.parentElement;
    let id= $(element).attr('servicioId');
    let estado=0;
    $.post('../servicios/eliminar',{id,estado},function(response){
       listarServicios();
       console.log(response);
    })
  }

})






 $(document).on('click','.editarServicio',function(){// modificaionde datos a nivel general
  let element =$(this)[0].parentElement.parentElement;
  let id= $(element).attr('servicioId');
  console.log(id+'hola');
  $.post('../servicios/datoServicio',{id},function(response){

    var json=JSON.parse(response);
    // console.log(json.email);
    console.log(json);
    $('#idM').val(json.id);

    console.log(json.denominacion);
    $("#modificarServicio").modal("show");
                 
  })

})


  $("#agregarServicio").submit(function(ev){
    ev.preventDefault();

    $.ajax({
      url: "../servicios/agregarServicio",
      type: "POST",
      data: $(this).serialize(),
      success: function(data){

        console.log(data);
        var json= JSON.parse(data);
          if (json.uri===1) {
            

                 $('#agregarServiciolink').removeClass('active');
          $('#agregarServicios').removeClass('active');

                // Activa la pestaña deseada
          $('#listaServicioLink').addClass('active');
                // Activa la pestaña correspondiente en el contenido
          $('#listaServicios').addClass('active');
                listarServicios();
          
          toastr.success('Servicio Agregado'+json.msg);

          }
          else
          {
            
                listarServicios();
          
          toastr.warning('fallo de registro servicio'+json.msg);

          }
      },
    });
  }); 


});

