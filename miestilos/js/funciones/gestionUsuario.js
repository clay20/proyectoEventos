$(document).ready(function() {
  // Global Settings

  listarUsuario();
  listarUsuarioDesabilitados();

  function listarUsuario()
  {
   $.ajax({
    url:'../usuario/modifiaDatosUsuarioaFUll',
    type:'POST',
    success:function(response){
      // console.log(response+"golas");
      let usuario= JSON.parse(response);
      let template= "";
      usuario.forEach(usuario=>{
        template+=`
        <tr usuarioId=${usuario.id}>
        <td>${usuario.nombre+' '+usuario.primerApellido+' '+usuario.segundoApellido}</td>
        <td>${usuario.ci}</td>
        <td class="d-none d-lg-table-cell">${usuario.sexo=='f'?'Femenino':'Masculino'}</td>
        <td class="d-none d-lg-table-cell">${usuario.fechaNacimiento}</td>
        <td  class="d-none d-lg-table-cell">${usuario.email}</td>
        <td>${usuario.nombreUsuario}</td>
        <td>${usuario.rol}</td>
        <td title="Editar"> 
        <button type="submit" class="editaUsuario btn btn-sm btnt-primary" ><i class="fa-solid fa-pen-to-square fa-lg text-warning"></i></button> 
        </td>
        <td title="Editar"> <button class="eliminarUsuario btn btn-sm btnt-primary"><i class="fa-solid fa-trash  fa-lg text-danger"></i></button> </td>
        </tr>
        `
      });
      $('#listaUsuario').html(template); 
    }
  });
 }
 function listarUsuarioDesabilitados()
 {
   $.ajax({
    url:'../usuario/usuarioDatosDesabilitadosFUll',
    type:'POST',
    success:function(response){
      // console.log(response+"golas");
      let usuario= JSON.parse(response);
      let template= "";
      usuario.forEach(usuario=>{
        template+=`
        <tr usuarioId=${usuario.id}>
        <td  class="d-none ">${usuario.id}</td>
        <td>${usuario.nombre+' '+usuario.primerApellido+' '+usuario.segundoApellido}</td>
        <td>${usuario.celular}</td>
        <td>${usuario.nombreCargo}</td>

        <td>${usuario.email}</td>
        <td>${usuario.rol}</td>
        <td>${usuario.nombreUsuario}</td>
        <td title="Editar"> <button class="eliminarUsuario btn btn-sm btnt-primary"><i class="fa-solid fa-trash  fa-lg text-success"></i></button> </td>


        </tr>
        `
      });
      $('#Usuariodesabilitados').html(template); 
    }
  });
 }

 $(document).on('click','.eliminarUsuario', function(){

  if(confirm('Esta seguro de eliminar')){

    let element =$(this)[0].parentElement.parentElement;
    let id= $(element).attr('usuarioId');

    $.post('../usuario/eliminarDatosUsuarioa',{id},function(response){
      listarUsuario();

    })
  }

})


 $(document).on('click','.editaUsuario',function(){

  let element =$(this)[0].parentElement.parentElement;
  let id= $(element).attr('usuarioId');
  console.log(id);
  $.post('../usuario/modifiaDatosUsuarioa',{id},function(response){

    var json=JSON.parse(response);
    // console.log(json.email);
    listarUsuario();
    $('#idD').val(json.id);

    $('#nombreUsuarioD').val(json.nombre);
    $('#primerApellidoD').val(json.primerApellido);
    $('#segundoApellidoD').val(json.segundoApellido);
    $('#ciD').val(json.ci);
    $('#email').val(json.email);

    $('#fechaNacimientoD').val(json.fechaNacimiento);
      // $('#rolId').val(1);

    $("#rolId option").filter(function() {
      return $(this).text() === json.rol;
    }).prop("selected", true);

    console.log(json.email);
    $("#ModificarUsuario").modal("show");
  })

})

 $(document).on('click','.editaUsuario',function(){// modificar daos perosnales

  let element =$(this)[0].parentElement.parentElement;
  let id= $(element).attr('usuarioId');
  console.log(id);
  $.post('../usuario/modifiaDatosUsuarioa',{id},function(response){

    var json=JSON.parse(response);
    // console.log(json.email);
    listarUsuario();
    $('#idD').val(json.id);

    $('#nombreP').val(json.nombre);
    $('#primerApellidoD').val(json.primerApellido);
    $('#segundoApellidoD').val(json.segundoApellido);
    $('#ciD').val(json.ci);
    $('#email').val(json.email);

    $('#fechaNacimientoD').val(json.fechaNacimiento);
      // $('#rolId').val(1);

    $("#rolId option").filter(function() {
      return $(this).text() === json.rol;
    }).prop("selected", true);

    console.log(json.email);
    $("#ModificarUsuario").modal("show");
  })

})
});



(function($){
  $("#formModificar").submit(function(ev){
    ev.preventDefault();

    $.ajax({
      url: "../usuario/modificarUsuario",
      type: "POST",
      data: $(this).serialize(),
      success: function(data){
        console.log(data);
        var json= JSON.parse(data);
        window.location.replace(json.url);
        msg.style.color="green";
        var alert =document.getElementById('alert');
        alert.style.display = "block";
                 
        // $("#ModificarUsuario").modal("hide");
         window.location.replace(json.url);
      },

      statusCode: {
        400: function(xhr){
        },
        401: function(xhr){
        },
                  // Puedes agregar más códigos de estado aquí según sea necesario
      }
    });
  });
})(jQuery);

(function($){
  $("#formRegistro2").submit(function(ev){
    ev.preventDefault();

    $.ajax({
      url: "../usuario/agregarUsuario",
      type: "POST",
      data: $(this).serialize(),
      success: function(data){


        console.log(data);
        var json= JSON.parse(data);
        window.location.replace(json.url);


        msg.style.color="green";
        var alert =document.getElementById('alert');
        alert.style.display = "block";
                  // $('#alert').style.display = "block";
        $('#alert').html('<div class="alert alert-danger" role="alert">'+json+'</div>')
        listarUsuario();
      },

      statusCode: {
        400: function(xhr){


        },
        401: function(xhr){


        },
                  // Puedes agregar más códigos de estado aquí según sea necesario
      }
    });
  });
})(jQuery);


//datos perosnales 
