
$(document).ready(function() {
  // Global Settings

  listarProveedores();
  listarServicios();

function listarProveedores()//cargamo en la sellecion par combox
  {
   $.ajax({
    url:'../proveedor/listaProveedor',
    type:'POST',
    success:function(response){
      // console.log(response+"golas");
      let proveedor= JSON.parse(response);
      let template= "";
      var i=1;
     console.log(proveedor);

      proveedor.forEach(proveedor=>{
        template+=`
       
         <option  idProveedor="${proveedor.id}" value='${proveedor.denominacion}'></option>
        `
        i++;
      });
      $('#cargaProveedor').html(template); 
    }
  });
 }


//eliminar empleados 
//  $(document).on('click','.cargarProveedor', function(){//cuando hace clik se selecciona

//     let element =$(this)[0].parentElement.parentElement;
//     let id= $(element).attr('proveedorId');
//     let denominacion= $(element).attr('denominacionPRO');
//      var carga=document.getElementById('cargaProveedor');

// carga.options[0].value = id;
//   carga.options[0].text = denominacion;
// })

//inicio listar servicios
 function listarServicios()
  {
  
   $.ajax({
    url:'../servicios/listaServicios',
    type:'POST',
    success:function(response){
      
      let servicio= JSON.parse(response);
      let template= "";
      var i=1;

      servicio.forEach(servicio=>{
        template+=`
        <tr servicioId=${servicio.id}>
        <td>${i}</td>

        <td>${servicio.nombre}</td>
        <td >${servicio.medida}</td>
        <td >${servicio.precio}</td>
        <td >${servicio.proveedor}</td>
        <td >${servicio.descriccion}</td>


        
        <td title="Editar"> 
        <button type="submit" class="editarServicio btn btn-sm btnt-primary" data-target="#ModificarProveedor" ><i class="fa-solid fa-pen-to-square fa-lg text-warning"></i></button> 
        </td>
        <td title="Editar"> <button class="eliminarServicio btn btn-sm btnt-primary"><i class="fa-solid fa-trash  fa-lg text-danger"></i></button> </td>
        </tr>
        `
        i++;
      });
      $('#servicioT').html(template); 
    }
  });
 }//fin lista servicions

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
  console.log(id);
  $.post('../servicios/datoServicio',{id},function(response){

    var json=JSON.parse(response);
    // console.log(json.email);
    console.log(json);
    $('#idM').val(json.id);

    console.log(json.denominacion);
    $("#modificarServicio").modal("show");
                 
  })

})




  $("#formModificarProveedor").submit(function(ev){// guardamos los cambios de modificar alos empleasos
    ev.preventDefault();

    $.ajax({
      url: "../proveedor/proveedorModificar",
      type: "POST",
      data: $(this).serialize(),
      success: function(data){
        console.log(data);
        var json= JSON.parse(data);
  
         
          if (json.uri===1) {
              $("#ModificarProveedor").modal("hide");
                alert(json.msg+' Campos modificas '+ json.campos);
           listarUsuario();
          }

          else
          {
            console.log(json.uri);
             $("#ModificarProveedor").modal("hide");
             alert(json.msg);
          }
       
      },

      statusCode: {
        400: function(xhr){
        },
        401: function(xhr){
        },
                  
      }
    });
  });


});


//agregar servicios

(function($){
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
            
               window.location.replace(json.url);
                listarServicios();
                alert(json.msg);
          }
          else
          {
             window.location.replace(json.url);
                listarServicios();
                alert(json.msg);
          }
      },
    });
  });

})(jQuery);


//datos perosnales 
//onchage de agregar proveedor
function  cargaId(data) {
 const idPro=document.getElementById('idProveedor');
 const datalist =document.getElementById('cargaProveedor')
 for (let i = 0; i < datalist.options.length; i++) {
    if (datalist.options[i].value === data.value) {

      id= datalist.options[i].getAttribute('idProveedor');
         idPro.value=id
  
      break; 
    }
  }  
  
}