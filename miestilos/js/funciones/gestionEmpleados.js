$(document).ready(function() {
  // Global Settings

  listarUsuario();
  listarUsuarioDesabilitados();

function listarUsuario()
  {
   $.ajax({
    url:'../empleado/listaEmpleados',
    type:'POST',
    success:function(response){
      // console.log(response+"golas");
      let empleado= JSON.parse(response);
      let template= "";
      var i=1;
      empleado.forEach(empleado=>{
        template+=`
        <tr empleadoId=${empleado.id}>
        <td>${i}</td>

        <td>${empleado.nombreCompleto}</td>
        <td class="d-none d-lg-table-cell">${empleado.ci}</td>
        <td class="d-none d-lg-table-cell">${empleado.fechaNacimiento}</td>
        <td class="d-none d-lg-table-cell">${empleado.sexo}</td>
        <td  class="d-none d-lg-table-cell">${empleado.nombreCargo}</td>
        <td>${empleado.salario}</td>
        <td>${empleado.telefono}</td>
        <td title="Editar"> 
        <button type="submit" class="editarEmpleado btn btn-sm btnt-primary" ><i class="fa-solid fa-pen-to-square fa-lg text-warning"></i></button> 
        </td>
        <td title="Editar"> <button class="eliminarEmpleado btn btn-sm btnt-primary"><i class="fa-solid fa-trash  fa-lg text-danger"></i></button> </td>
        </tr>
        `
        i++;
      });
      $('#listaEmpleadoT').html(template); 
    }
  });
 }
//eliminar empleados 
 $(document).on('click','.eliminarEmpleado', function(){
 
  if(confirm('Esta seguro de eliminar')){

    let element =$(this)[0].parentElement.parentElement;
    let id= $(element).attr('empleadoId');
    let estado=0;

    $.post('../empleado/eliminarAbilitar',{id,estado},function(response){
      listarUsuario();
  listarUsuarioDesabilitados();
    })
  }

})


//  fal desarrollar para este caso

 $('#buscarEmpleado').keyup(function() {
  
      if($('#buscarEmpleado').val()) {
        let valor = $('#buscarEmpleado').val();
        $.ajax({
          url:'../empleado/usuarioDatosBuscar',
          data: {valor},
          type: 'POST',
          success: function (response) {
            if(!response.error) {

               let empleado= JSON.parse(response);
                  let template= "";
                  var i=1;
                  empleado.forEach(empleado=>{
                    template+=`
                    <tr empleadoId=${empleado.id}>
                    <td>${i}</td>

                    <td>${empleado.nombreCompleto}</td>
                    <td class="d-none d-lg-table-cell">${empleado.ci}</td>
                    <td class="d-none d-lg-table-cell">${empleado.fechaNacimiento}</td>
                    <td class="d-none d-lg-table-cell">${empleado.sexo}</td>
                    <td  class="d-none d-lg-table-cell">${empleado.nombreCargo}</td>
                    <td>${empleado.salario}</td>
                    <td>${empleado.telefono}</td>
                    <td title="Editar"> 
                    <button type="submit" class="editarEmpleado btn btn-sm btnt-primary" ><i class="fa-solid fa-pen-to-square fa-lg text-warning"></i></button> 
                    </td>
                    <td title="Editar"> <button class="eliminarEmpleado btn btn-sm btnt-primary"><i class="fa-solid fa-trash  fa-lg text-danger"></i></button> </td>
                    </tr>
                    `
                    i++;
                  });
                  $('#listaEmpleadoT').html(template); 
                } 
                        
          } 
        })
      }
  });



//lista de empleaso desabilitados

 function listarUsuarioDesabilitados()
  {
   $.ajax({
    url:'../empleado/listaEmpleadosDesabilitados',
    type:'POST',
    success:function(response){
      // console.log(response+"golas");
      let empleado= JSON.parse(response);
      let template= "";
      var i=1;
      empleado.forEach(empleado=>{
        template+=`
        <tr empleadoId=${empleado.id}>
        <td>${i}</td>

        <td>${empleado.nombreCompleto}</td>
        <td class="d-none d-lg-table-cell">${empleado.ci}</td>
        <td class="d-none d-lg-table-cell">${empleado.fechaNacimiento}</td>
        <td class="d-none d-lg-table-cell">${empleado.sexo}</td>
        <td  class="d-none d-lg-table-cell">${empleado.nombreCargo}</td>
        <td>${empleado.salario}</td>
        <td>${empleado.telefono}</td>
        <td title="Editar"> 
        <button type="submit" class="abilitarEmpleado btn btn-sm btnt-primary" ><i class="fa-solid fa-pen-to-square fa-lg text-warning"></i></button> 
        </td>
       
        `
        i++;
      });
      $('#listaEmpleadoTDesabilitados').html(template); 
    }
  });
 }
 //abilitar empleado eliminado

$(document).on('click','.abilitarEmpleado', function(){
 
  if(confirm('Esta seguro abilitar')){

    let element =$(this)[0].parentElement.parentElement;
    let id= $(element).attr('empleadoId');
    let estado=1;

    $.post('../empleado/eliminarAbilitar',{id,estado},function(response){
      listarUsuario();
  listarUsuarioDesabilitados();
    })
  }

})





 $(document).on('click','.editarEmpleado',function(){// modificaionde datos a nivel general
  let element =$(this)[0].parentElement.parentElement;
  let id= $(element).attr('empleadoId');
  console.log(id);
  $.post('../empleado/datoEmpleado',{id},function(response){

    var json=JSON.parse(response);
    // console.log(json.email);
    console.log(json);
    $('#id').val(json.id);

    $('#nombre').val(json.nombre);
    $('#primerApellido').val(json.primerApellido);
    $('#segundoApellido').val(json.segundoApellido);
    $('#ci').val(json.ci);
    $('#sexo').val(json.sexo);

    if (json.sexo === 'm') {
    $("#radioF").prop("checked", true); // Selecciona el botón "Femenino"
} else if (json.sexo === "f") {
    $("#radioM").prop("checked", true); // Selecciona el botón "Masculino"
}
    $('#fechaNacimiento').val(json.fechaNacimiento);
    $('#salario').val(json.salario);
    $('#telefono').val(json.telefono);
    $('#fechaInicio').val(json.fechaInicio);

    $("#cargoId option").filter(function() {
      return $(this).text() === json.nombreCargo;
    }).prop("selected", true);

    console.log(json.nombreCargo);
    $("#modificarEmpleado").modal("show");
  })

})

  $("#formModificarEmpleado").submit(function(ev){// guardamos los cambios de modificar alos empleasos
    ev.preventDefault();

    $.ajax({
      url: "../empleado/empleadoModificar",
      type: "POST",
      data: $(this).serialize(),
      success: function(data){
        console.log(data);
        var json= JSON.parse(data);
  
         
          if (json.uri===1) {
              $("#modificarEmpleado").modal("hide");
                // window.location.replace(json.url);
           listarUsuario();
          }

          else
          {
            console.log(json.msg);
          }
        alert('hola');
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



});





//agregar

(function($){
  $("#formularioRegistroEmpleados").submit(function(ev){
    ev.preventDefault();

    $.ajax({
      url: "../empleado/agregarEmpleado",
      type: "POST",
      data: $(this).serialize(),
      success: function(data){

        console.log(data);
        var json= JSON.parse(data);
       
        alert(json.msg);
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
