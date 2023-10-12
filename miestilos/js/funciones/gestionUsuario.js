
$(document).ready(function(){
  // Global Settings
 

// mensage de inicio 

  // swal({
  //   title: "Are you sure?",
  //   text: "Once deleted, you will not be able to recover this imaginary file!",
  //   icon: "warning",
  //   buttons: true,
  //   dangerMode: true,
  // })
  // .then((willDelete) => {
  //   if (willDelete) {
  //     swal("Poof! Your imaginary file has been deleted!", {
  //       icon: "success",
  //     });
  //   } else {
  //     swal("Your imaginary file is safe!");
  //   }
  // });
//mensage fin de prueba

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
        <td class="d-none d-md-table-cell d-lg-table-cell">${usuario.ci}</td>
        <td class="d-none d-lg-table-cell">${usuario.sexo=='f'?'Femenino':'Masculino'}</td>
        <td class="d-none d-lg-table-cell">${usuario.fechaNacimiento}</td>
        <td  class="d-none d-md-table-cell d-lg-table-cell">${usuario.email}</td>
        <td>${usuario.nombreUsuario}</td>
        <td>${usuario.rol}</td>
        <td class="d-flex justify-content-center" > 

           <button type="submit" class="editaUsuario btn btn-sm btnt-primary" title="Editar" ><i class="fa-solid fa-pen-to-square fa-lg text-warning"></i></button> 
         <button class="eliminarUsuario btn btn-sm btnt-primary" title="Eliminar"><i class="fa-solid fa-trash  fa-lg text-danger"></i></button> 

        
          
        </td>

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
            <td class="d-none d-md-table-cell  d-lg-table-cell">${usuario.ci}</td>
            <td class="d-none d-lg-table-cell">${usuario.sexo=='f'?'Femenino':'Masculino'}</td>
            <td class="d-none d-lg-table-cell">${usuario.fechaNacimiento}</td>
            <td  class="d-none d-md-table-cell  d-lg-table-cell">${usuario.email}</td>
            <td>${usuario.nombreUsuario}</td>
            <td>${usuario.rol}</td>
             <td  class="d-flex justify-content-center"> 
      <button type="submit" class="editaUsuario btn btn-sm btnt-primary" title="Editar" ><i class="fa-solid fa-pen-to-square fa-lg text-warning"></i></button> 
     
         <button class="eliminarUsuario btn btn-sm btnt-primary" title="Eliminar"><i class="fa-solid fa-trash  fa-lg text-danger"></i></button> 

          
        </td>
            </tr>
            `
          });
          $('#listaUsuario').html(template); 
        }
      } 
    })
  }
});


 $(document).on('click','.eliminarUsuario', function(){

  if(confirm('Esta seguro de eliminar')){

    let element =$(this)[0].parentElement.parentElement;
    let id= $(element).attr('usuarioId');

    $.post('../usuario/eliminarDatosUsuarioa',{id},function(response){
      listarUsuario();
  listarUsuarioDesabilitados();


    })
  }

})

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



        <td title="abilitar"> <button class="abilitarUsuario btn btn-sm btnt-primary"><i class="fa-solid fa-trash  fa-lg text-warning"></i></button> </td>


        </tr>
        `
      });
      $('#Usuariodesabilitados').html(template); 
    }
  });
 }


 $('#buscarUsuarioD').keyup(function() {

  if($('#buscarUsuarioD').val()) {
    let valor = $('#buscarUsuarioD').val();
    $.ajax({
      url:'../usuario/usuarioDatosBuscarDesabilitados',
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
            <td class ="d-none d-lg-table-cell">${usuario.ci}</td>
            <td class="d-none d-lg-table-cell">${usuario.sexo=='f'?'Femenino':'Masculino'}</td>
            <td class="d-none d-lg-table-cell">${usuario.fechaNacimiento}</td>
            <td  class="d-none d-lg-table-cell">${usuario.email}</td>
            <td>${usuario.nombreUsuario}</td>
            <td>${usuario.rol}</td>
            <td title="abilitar"> <button class="abilitarUsuario btn btn-sm btnt-primary"><i class="fa-solid fa-trash  fa-lg text-warning"></i></button> </td>


            </tr>
            `
          });
          $('#Usuariodesabilitados').html(template); 
        }
      } 
    })
  }
});




 $(document).on('click','.abilitarUsuario', function(){//modificar la funcio para habilitar

  if(confirm('Esta seguro de abilitar el usuario desabilitador')){

    let element =$(this)[0].parentElement.parentElement;
    let id= $(element).attr('usuarioId');

    $.post('../usuario/activarDatosUsuarioa',{id},function(response){
      listarUsuario();
  listarUsuarioDesabilitados();


    })
  }

})


 





function limpiarFormularioAgregar() {
 $('#aux').val(0);
 $('#idE').val(0);
 $('#nombre').val('').prop('disabled',false);
 $('#nombreUsuario').val('');

 $('#primerApellido').val('').prop('disabled',false);
 $('#segundoApellidoD').val('').prop('disabled',false);
 $('#ci').val('').prop('disabled',false).focus();
 $('#fechaNacimiento').val('2022-01-01').prop('disabled',false);
 $('#emailA').val('');
 $('#limpiar').prop('disabled',true);

}

  $(document).on('click','#limpiar',function(){// limpiar datos de 

   limpiarFormularioAgregar();
 })




  $(document).on('click','.editaUsuario',function(){// modificacion de datos personales
    let element =$(this)[0].parentElement.parentElement;
    let id= $(element).attr('usuarioId');

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
      inputF=document.getElementById('radioF')
      inputM=document.getElementById('radioM')
      sexo=json.sexo;
       if(sexo==='f'){

        inputF.checked=true;
      }else
      {
        inputM.checked=true;
      }
     

      $("#rolId option").filter(function() {
        return $(this).text() === json.rol;
      }).prop("selected", true);

      console.log(json.email);
      $("#ModificarUsuario").modal("show");
    })

  })

  $("#formModificar").submit(function(ev){
    ev.preventDefault();

    $.ajax({
      url: "../usuario/modificarUsuario",
      type: "POST",
      data: $(this).serialize(),
      success: function(data){

        var json= JSON.parse(data);
        
        listarUsuario();
        $("#ModificarUsuario").modal("hide");

      
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

//guardar datos personales
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
  //agregag usuarios 
 $("#formRegistro2").submit(function(ev){
    ev.preventDefault();
    $.ajax({
      url: "../usuario/agregarUsuario",
      type: "POST",
      data: $(this).serialize(),
      success: function(data){
        var json= JSON.parse(data);
        if(json.uri==1)
        {
          swal("","Por favor verifique la conexion a internet'", "warning");

         
        }
        else
        {
          
          swal("Esta es un pruab", json.msg1+ ' ' +json.msg2, "success");
           limpiarFormularioAgregar();
          $('#agregarUsuarioLink').removeClass('active');
          $('#agregarUsuario').removeClass('active');

                // Activa la pestaña deseada
          $('#tabUsuariosLink').addClass('active');
                // Activa la pestaña correspondiente en el contenido
          $('#tabUsuarios').addClass('active');
          listarUsuario();
        }
        
      },

      statusCode: {
        400: function(xhr){
        },
        401: function(xhr){
        },         // Puedes agregar más códigos de estado aquí según sea necesario
      }
    });
  });

}); //cierre de documentos 


