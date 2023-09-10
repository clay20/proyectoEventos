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
        <td class="d-none d-lg-table-cell">${usuario.ci}</td>
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
  $('#buscarUsuario').keyup(function() {
  
      if($('#buscarUsuario').val()) {
        let valor = $('#buscarUsuario').val();
        $.ajax({
          url:'../usuario/usuarioDatosBuscar',
          data: {valor},
          type: 'POST',
          success: function (response) {
            if(!response.error) {
              let usuario= JSON.parse(response);
              console.log(usuario);
              let template= "";
              usuario.forEach(usuario=>{
                template+=`
                <tr usuarioId=${usuario.id}>
                <td>${usuario.nombre+' '+usuario.primerApellido+' '+usuario.segundoApellido}</td>
                <td class="d-none d-lg-table-cell">${usuario.ci}</td>
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
          } 
        })
      }
  });


  $('#buscarUsuarioD').keyup(function() {
  
      if($('#buscarUsuarioD').val()) {
        let valor = $('#buscarUsuarioD').val();
        $.ajax({
          url:'../usuario/usuarioDatosBuscar',
          data: {valor},
          type: 'POST',
          success: function (response) {
            if(!response.error) {
              let usuario= JSON.parse(response);
              console.log(usuario);
              let template= "";
              usuario.forEach(usuario=>{
                template+=`
                <tr usuarioId=${usuario.id}>
                <td>${usuario.nombre+' '+usuario.primerApellido+' '+usuario.segundoApellido}</td>
                <td class="d-none d-lg-table-cell">${usuario.ci}</td>
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
          } 
        })
      }
  });



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
        <td>${usuario.nombre+' '+usuario.primerApellido+' '+usuario.segundoApellido}</td>
        <td class ="d-none d-lg-table-cell">${usuario.ci}</td>
        <td class="d-none d-lg-table-cell">${usuario.sexo=='f'?'Femenino':'Masculino'}</td>
        <td class="d-none d-lg-table-cell">${usuario.fechaNacimiento}</td>
        <td  class="d-none d-lg-table-cell">${usuario.email}</td>
        <td>${usuario.nombreUsuario}</td>
        <td>${usuario.rol}</td>



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


 $(document).on('click','.editaUsuario',function(){// modificaionde datos a nivel general
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
  $(document).on('click','.editaUsuario',function(){// modificacion de datos personales
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
         // window.location.replace(json.url);
          $("#ModificarUsuario").modal("hide");
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

//guardar datos personales
(function($){
  $("#formDatosPersonales").submit(function(ev){
    ev.preventDefault();

    $.ajax({
      url: "../usuario/modificarDatosPersonales",
      type: "POST",
      data: $(this).serialize(),
      success: function(data){
        console.log(data);
        var json= JSON.parse(data);
       
      console.log(data);
        // $("#ModificarUsuario").modal("hide");
      alert('Ok');
         window.location.replace(json.url);
          $("#editarDatosPersonales").modal("hide");
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
        alert(json.msg1);
        alert(json.msg2);
        window.location.replace(json.url);
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
