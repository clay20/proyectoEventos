
$(document).ready(function() {
  // Global Settings

  listarCliente();

  function listarCliente()
  {

    $.ajax({
      url:'../cliente/listacliente',
      type:'POST',
      success:function(response){
      // console.log(response+"golas");
        let cliente= JSON.parse(response);

        let template= "";
        var i=1;
      // console.log(response);
        cliente.forEach(cliente=>{
          template+=`
          <tr clienteId=${cliente.id}>
          <th class="">${i}</th>
          <td>${cliente.nombre+' '+cliente.primerApellido+ ' '+cliente.segundoApellido}</td>
          <td>${cliente.ci}</td>
          <td >${cliente.celular+' '+cliente.telefono}</td>
          <td class="d-flex "> 
          <button type="submit" class="editarCliente btn btn-sm btnt-primary p-1" data-target="#ModificarProveedor"   title="Editar"><i class="fa-solid fa-pen-to-square fa-lg text-warning"></i></button> 
          <button class="eliminarcliente btn btn-sm btnt-primary ml-1"><i class="fa-solid fa-trash  fa-lg text-danger"  title="Eliminar"></i></button> 
          </td>
          </tr>
          `
          i++;
        });
        $('#tbCliente').html(template); 
      }
    });
 
  }


   $('#buscarCliente').keyup(function() {

  if($('#buscarCliente').val()) {
    let valor = $('#buscarCliente').val();
    $.ajax({
      url:'../cliente/buscarClientedatos',
      data: {valor},
      type: 'POST',
      success: function (response) {


        if(!response.error) {

          let cliente= JSON.parse(response);
        let template= "";
        var i=1;
      // console.log(response);
        cliente.forEach(cliente=>{
          template+=`
          <tr clienteId=${cliente.id}>
          <th class="">${i}</th>
          <td>${cliente.nombre+' '+cliente.primerApellido+ ' '+cliente.segundoApellido}</td>
          <td>${cliente.ci}</td>
          <td >${cliente.celular+' '+cliente.telefono}</td>
          <td class="d-flex "> 
          <button type="submit" class="editarCliente btn btn-sm btnt-primary p-1" data-target="#ModificarProveedor"   title="Editar"><i class="fa-solid fa-pen-to-square fa-lg text-warning"></i></button> 
          <button class="eliminarcliente btn btn-sm btnt-primary ml-1"><i class="fa-solid fa-trash  fa-lg text-danger"  title="Eliminar"></i></button> 
          </td>
          </tr>
          `
          i++;
        });
        $('#tbCliente').html(template); 


        }
      } 
    })
  }
});


//eliminar empleados 
  $(document).on('click','.eliminarcliente', function(){



    Swal.fire({
      icon: 'warning',
      text: 'Esta seguro de eliminar cliente',

      showCancelButton: true,
      confirmButtonText: 'Aceptar',
      cancelButtonText: 'Cancelar',
      background: 'rgb(251, 214, 169)',
      customContainerClass:'width:200px',
       customClass: {
    cancelButton: 'btnt-primary btn-sm', // Clase para el botón Cancelar
    confirmButton: 'btnt-primary',
    icon:'text-warning' // Clase para el botón Cancelar

  }
 
}).then((result) => {
  if (result.isConfirmed) {

    let element =$(this)[0].parentElement.parentElement;
    let id= $(element).attr('clienteId');
    let estado=0;

    $.post('../cliente/eliminar',{id,estado},function(response){
      var json= JSON.parse(response);
      if(json.uri===1)
      {
        toastr.success('cliente eliminado con exito');
        listarCliente();
      }
      else{
        toastr.warning('el cliente no puede ser eliminado');
        listarUsuario();
      }
    })
  }
});

})






 $(document).on('click','.editarCliente',function(){// modficair cliente
  let element =$(this)[0].parentElement.parentElement;
  let id= $(element).attr('clienteId');
  console.log(id);
  $.post('../cliente/datoCliente',{id},function(response){

    var json=JSON.parse(response);
    // console.log(json.email);
    console.log(json);

    $('#idM').val(json.id);
    $('#txtNombreM').val(json.nombre);
    $('#txtApellido1M').val(json.primerApellido);
    $('#txtApellido2M').val(json.segundoApellido);
    $('#txtCiM').val(json.ci);
    $('#txtCelularM').val(json.celular);
    $('#txtTelefonoM').val(json.telefono).focus();

    $("#ModificarCliente").modal("show");


  })

})


  $("#forModificarCliente").submit(function(ev){// guardamos los cambios de modificar alos empleasos
    ev.preventDefault();

    $.ajax({
      url: "../cliente/guardarCambios",
      type: "POST",
      data: $(this).serialize(),
      success: function(data){
        console.log(data);
        var json= JSON.parse(data);


        if (json.uri===1) {

          if(json.row>0){


          $("#ModificarCliente").modal("hide");
          toastr.success('Cambios guardado');
          listarCliente();
          }
          else
          {
            console.log(json.uri);
          $("#ModificarCliente").modal("hide");
           toastr.warning('Ningun campo modificado ');

          }
        }

        else
        {
          console.log(json.uri);
          $("#ModificarCliente").modal("hide");
           toastr.warning('Ningun campo modificado');

        }

      },


    });
  });


  $("#nuevoCliente").submit(function(ev){
    ev.preventDefault();

    $.ajax({
      url: "../cliente/agregarCliente",
      type: "POST",
      data: $(this).serialize(),
      success: function(data){

        // console.log(data);

        var json= JSON.parse(data);
        if(json.uri==1){
          toastr.success('nuevo cliente agregado');
          limmpiarCampos();
          $('#agregarclientelink').removeClass('active');
          $('#agregarCliente').removeClass('active');

                // Activa la pestaña deseada
          $('#listaCliente').addClass('active');
                // Activa la pestaña correspondiente en el contenido
          $('#listaclientelink').addClass('active');
          listarCliente();
        }
        else
        {
          toastr.warning('fallo registro de cliente');
        }

      },
    });
  });




});


 



function limmpiarCampos()
{
  const nombre=document.getElementById('txtNombre');
  const primerA=document.getElementById('txtApellido1');
  const segundoA=document.getElementById('txtApellido2');
  const ci=document.getElementById('txtCi');
  const celular=document.getElementById('txtCelular');
  const telefono=document.getElementById('txtTelefono');
  nombre.value="";
  primerA.value="";
  segundoA.value="";
  ci.value="";
  celular.value="";
  telefono.value="";
  nombre.focus();



}

function limmpiarCamposModal()
{
  const nombre=document.getElementById('txtNombreM');
  const primerA=document.getElementById('txtApellido1M');
  const segundoA=document.getElementById('txtApellido2M');
  const ci=document.getElementById('txtCiM');
  const celular=document.getElementById('txtCelularM');
  const telefono=document.getElementById('txtTelefonoM');
  nombre.value="";
  primerA.value="";
  segundoA.value="";
  ci.value="";
  celular.value="";
  telefono.value="";
  nombre.focus();

}






