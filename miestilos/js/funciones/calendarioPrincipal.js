
function prepareModalDetail( clickedDay, eventDetail ){

  c = $(".calendar-day-" + clickedDay);
  c = c.attr("class").split(" ");  

  classModalType = c[ c.length-1 ] ;

  $("#modalType").removeClass().addClass('box box-solid event-item ' + classModalType);

  $("#eventActive").text( '"' + eventDetail.title + '"' );

  $("#infoDetail").html( $("#detailEvent"+eventDetail.id+" #"+eventDetail.date).html() );

  $("#modalDetailEvent").modal();

}

function prepareModalToAdd( clickedDay ){

  $("#titleModalDay").text( clickedDay );
  $("#fecha").val(clickedDay);

  $("#addCalendarEvt")
  .removeAttr('onclick')
  .attr('onclick', 'addCalendarEvt( "' + clickedDay + '")');

  $("#modalAddEvent").modal({backdrop:"static"});
    // mensaje();

  ListaServicio();
  actualizarPrecio();
  cargarFechasConsecutivas();
  agregarBloques();



}


  $('#nombreCliente').keyup(function() {//buscamo al empledo para signiar un usuario

    if($('#nombreCliente').val()) {
      let valor = $('#nombreCliente').val();
      $.ajax({
          url:'../cliente/buscarClientedatos',// tenesmo ir dirento ala controlador de model usuario desde air llmaar
          data: {valor},
          type: 'POST',
          success: function (response) {
            if(!response.error) {
              let cliente= JSON.parse(response);
              // console.log(cliente);
              let template= "";
              cliente.forEach(cliente=>{
                template+=`
                <option 
                clienteId=${cliente.id}                 
                value=" ${cliente.nombre+' '+cliente.primerApellido+' '+cliente.segundoApellido}" 
                nombre="${cliente.nombre}"
                primerApellido='${cliente.primerApellido}'
                segundoApellido='${cliente.segundoApellido}'>

                ${'C.i: ' +cliente.ci +'- Contacto: '+cliente.celular+'-'+cliente.telefono}
                </option>
                `
              });
              $('#listaCliente').html(template); 
              actualizarPrecio();

            }
          } 
        })
    }
  });



  function seleccionCliente(data) {
   const datalist = document.getElementById('listaCliente')                  
   const inputId=document.getElementById('txtId');
   const inputNombre=document.getElementById('nombreCliente');
   const lbleyenda=document.getElementById('lbLeyenda');

   for (let i = 0; i < datalist.options.length; i++) {
    if (datalist.options[i].value === data.value) {

      id= datalist.options[i].getAttribute('clienteId');
      inputId.value=id;
      lbleyenda.innerText="Nombre del Cliente";
      inputNombre.disabled=false; 

      break; 
    }
  }                             
}
//funcion guarada nuevo cliente
$("#formNuevoCliente").submit(function(ev){
  ev.preventDefault();
  const ci=document.getElementById('txtCi');
  const celular=document.getElementById('txtCelular');
  const telefono=document.getElementById('txtTelefono');
  if(ci.value.length>=6)
  {

    $.ajax({
      url: "../cliente/nuevoCliente",
      type: "POST",
      data: $(this).serialize(),
      success: function(data){
        var json= JSON.parse(data);
        console.log(json);
        if(json.id!=0)
        {
          swal("","Registro con exito'", "success");
          limmpiarCampos();
          $("#agregarCliente").modal("hide");
          const inputNombre=document.getElementById('nombreCliente');
          const inputId=document.getElementById('txtId');
          const lbleyenda=document.getElementById('lbLeyenda');
          inputId.value=json.id;
          inputNombre.value=json.nombre +' '+json.primerApellido+' '+json.segundoApellido;
          lbleyenda.innerText="Nombre del Cliente";
        }
        else
        {
          swal("","Registro con exito'", "herror");   
        }
        
      },

    });
  }
  else
  {
    ci.setCustomValidity('C.I. debe ser mayor a 7 caracteres');
    ci.focus();
  }
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

}

//buscar servicio en 
function ListaServicio() {
    ids = new Array();

    $(".servicioDetalle").find('tr').each(function() {
        ids.push($(this).find("td:eq(0) input.idServicios").val());
    });

    // Agregar un valor predeterminado de cero si el array está vacío
    if (ids.length === 0) {
        ids.push(0);
    }

    // Continuar con la solicitud AJAX
    $.ajax({
        url: '../servicios/listaServiciosNOAgregados',
        data: { ids },
        type: 'POST',
        success: function(response) {
            let servicio = JSON.parse(response);
            let template = "";
            console.log(servicio+"desde aqui"+ids);
            servicio.forEach(servicio => {
                template += `
                    <option servicioId=${servicio.id}
                        value="${servicio.nombre}"
                        nombre="${servicio.nombre}"
                        medida="${servicio.medida}"
                        precio="${servicio.precio}"
                        maximo="${servicio.maximo}">
                        ${servicio.descriccion}
                    </option>
                `;
            });
            $('#listaServicio').html(template);
        }
    });
}


function seleccionarServicio(data) {
  const datalist = document.getElementById('listaServicio');
  const buscarServicio = document.getElementById('txtBuscaeServicio');
  const nroInvitado=document.getElementById("nroInvitados");
  const diasEventos=document.getElementById("txtDia");
     var fecha=document.getElementById('fecha');
    var horaInicio = $(`#inicioH1`).val();
      var duracion = $(`#horaRange1`).val();

  for (let i = 0; i < datalist.options.length; i++) {
    if (datalist.options[i].value === data.value) {
      id = datalist.options[i].getAttribute('servicioId');
      precio = datalist.options[i].getAttribute('precio');
      servicio = datalist.options[i].getAttribute('nombre');
      maximo = datalist.options[i].getAttribute('maximo');
      cant = Math.ceil(nroInvitado.value / 400 * maximo);
      console.log(verificaExiste(id,diasEventos.value));
      if(!verificaExiste(id,diasEventos.value)){




        let template = "";
        template += `
        <tr servicioId=${id}>
        <td><small> ${servicio}</small>  <input type="hidden" class="idServicios" value =${id} ></td>
        <td style="text-align:right;" class="myBox"><select class="fechaSeleccion myImputField" onchange="seleccionarFila(this)"></select>  </td>
        <td style="text-align:right;">
        <input type="text" id="cant1" onkeypress="return soloNumero(event)"   name="" minlength="1" maxlength="3"  style="width:40px ;height: 20px;" value="${cant}">
        <input type ="hidden" value="${maximo}" id="maximotd">
        <input type="hidden" id="fechaHoraInicio" name="fechaHoraInicio" class=""  value="${fecha.value+' '+horaInicio}">
        <input type="hidden" id="fechaHoraFin" name="fechaHoraFin" class="" value="${duracion}" >
        <input type="hidden" id="duracion" name="duracion" class="" value="${duracion}" >

        </td>
        <td style="text-align:right;">${precio}</td>
        <td style="text-align:right;">${precio*cant}</td>
        <td style="text-align:right;"><input type="text"  onkeypress="return soloNumero(event)" id="descuentoParcial" class="descuentoParcial" name=""  maxlength="7"  value="0.00"  style="width:80px; height: 20px; font: 10px; text-align: right;">bs.</td>
        <td><button class="btn btn-sm text-danger p-1 btnEliminarFila"><i class="fa-solid fa-circle-minus fa-lg"></i></button></td>
        </tr>`;
      // Agregar las filas a la tabla usando append
      // $('#servicioDetalle').html('');  // Limpiar contenido anterior
        $('#servicioDetalle').append(template);

      }
      else
      {
    toastr.info("servicio ya esta agregado");

         // swal("", 'el servicio ya existe agregado por favor agregar mas antiad' "warning");
     }
     buscarServicio.value="";
     actualizarPrecio();
     cargarFechasConsecutivas();
  ListaServicio();
     break;
   }
 }
}


function verificaExiste(idSe, diasEvento) {
  var ban = false;
  var cont = 1;

  $(".servicioDetalle tr").each(function () {
    let id = $(this).attr('servicioId');

    if (id == idSe) {
      // Hacer algo si existe el elemento con el ID específico
      if (cont == diasEvento) {
        ban = true;
      }
      cont += 1;
      console.log("Elemento encontrado con ID:" + idSe + 'cont ' + cont + '' + diasEvento);
    }
  });

  return ban;
}


$(document).on('click', '.btnEliminarFila', function() {
  // Obtener la fila padre y eliminarla
  $(this).closest('tr').remove();
  actualizarPrecio();

});



$(document).on("keyup", ".servicioDetalle #cant1", function () {
  cant = Number($(this).val());
  precio = Number($(this).closest("tr").find("td:eq(3)").text());


  maximo = Number($(this).closest("tr").find("td:eq(2) #maximotd").val());
  nombreservicio = $(this).closest("tr").find("td:eq(0)").text();



  nroInvitado=Number($("#nroInvitados").val());

      // stock = Number($(this).closest("tr").find("td:eq(3)").text());

  if (!Number.isInteger(cant) || cant >= maximo) {
    $(this).addClass("is-invalid");
    // $(this).closest("tr").find("td:eq(5)").text(0);
    actualizarPrecio();
    console.log(nombreservicio+"  deve ser menor "+maximo+" es cantidad maxima");
    toastr.info(nombreservicio+"  deve ser menor a "+maximo+" es cantidad maxima");

    $(this).val(maximo);
  } else {
    $(this).removeClass("is-invalid");
    importe = cant*precio;
    $(this).closest("tr").find("td:eq(4)").text(importe.toFixed(2));
    actualizarPrecio();
  }


});


$(document).on("keyup", ".servicioDetalle .descuentoParcial", function () {
  actualizarPrecio();
});




function actualizarPrecio() {
  var total = 0;
  var descuentoTotal = 0;

  $(".servicioDetalle tr").each(function () {
    total += Number($(this).find("td:eq(4)").text());
    descuentoTotal += Number($(this).find("td:eq(5) input").val());
  });

    // alert(total);
    // Actualizar campos en el DOM
  $("#total").val(total.toFixed(2));
  $("#descuento").val(descuentoTotal.toFixed(2));
  
  var valorMontoAdelantado = $("#montoAdelantado").val();
  var totalPagar=total-descuentoTotal;
  $("#totalPagar").val(totalPagar.toFixed(2));

  totalPagar =totalPagar- valorMontoAdelantado;
  $("#saldoPagar").val(totalPagar.toFixed(2));

}




$(document).on('keyup', '#montoAdelantado', function () {
  var total = parseFloat($("#total").val()) || 0;
  var valorMontoAdelantado = parseFloat($(this).val()) || 0;

  if (total >= valorMontoAdelantado) {
    var saldo = total - valorMontoAdelantado;
    $("#saldoPagar").val(saldo.toFixed(2));
        $(this).css("background-color", ""); // Restaurar el color de fondo
        $(this).css("background-color", "#fff"); 

      } else {
        console.log('El monto a pagar no debe ser mayor al total.');
        $(this).css("background-color", "#FF8080"); 
        // Cambiar el color de fondo a un rojo suave si no cumple
        $(this).css("border-bottom", "2px solid #ff9999"); 
      }

      actualizarPrecio();
    });


 //mas funciones hora fechas interacti de la vistas

function cargarFechasConsecutivas() {
  // Obtener el valor ingresado por el usuario en el campo de fecha
  var fechaIngresada = document.getElementById("fecha").value;
  var cantidadFechas = document.getElementById("txtDia").value;
  var comboboxes = document.querySelectorAll(".fechaSeleccion");
  var ultimaFechaInput = document.getElementById("fechaFin");

  var fecha = new Date(fechaIngresada);

  comboboxes.forEach(function(combobox) {
    // Obtener la selección actual antes de limpiar el combobox
    var seleccionActual = combobox.value;

    combobox.innerHTML = "";

    // Agregar la cantidad especificada de fechas consecutivas al combobox
    for (var i = 0; i < cantidadFechas; i++) {
      var nuevaFecha = new Date(fecha);
      nuevaFecha.setDate(fecha.getDate() + i);

      // Formatear la fecha como "YYYY-MM-DD"
      var fechaFormateada = nuevaFecha.toISOString().split('T')[0];

      // Crear una opción y agregarla al combobox
      var opcion = document.createElement("option");
      opcion.value = fechaFormateada;
      opcion.text = fechaFormateada;
      combobox.add(opcion);
    }

    // Establecer la selección actual o la primera fecha si no hay ninguna selección
    combobox.value = seleccionActual || combobox.options[0].value;
  });

  // Mostrar la última fecha consecutiva en el campo de última fecha
  var ultimaFecha = new Date(fecha);
  ultimaFecha.setDate(fecha.getDate() + parseInt(cantidadFechas) - 1);
  ultimaFechaInput.value = ultimaFecha.toISOString().split('T')[0];

  // Guardar en localStorage
  localStorage.setItem("ultimaFechaInput", ultimaFechaInput.value);
}

// Llamar a la función al cargar la página
window.onload = function() {
  var ultimaFechaGuardada = localStorage.getItem("ultimaFechaInput");
  document.getElementById("ultimaFecha").value = ultimaFechaGuardada;
};

function sumasFEchas(fecha)
{  
     
}

function agregarBloques() {
    // Obtener el valor ingresado por el usuario
  var cantidadBloques = parseInt(document.getElementById("txtDia").value);
  var fechaIngresada = document.getElementById("fecha").value;

  var contenedor = document.getElementById("contenedorBloques");
  contenedor.innerHTML = "";
  for (var i = 0; i < cantidadBloques; i++) {

    var nuevoBloque = document.createElement("div");
    nuevoBloque.className = "col-12";


    // fechas sumas 
        var fechaObjeto = new Date(fechaIngresada);
    var nuevaFecha = new Date(fechaObjeto);
    nuevaFecha.setDate(fechaObjeto.getDate() + i);
    var nuevaFechaFormateada = nuevaFecha.toISOString().slice(0, 10);
    // fechas sumas 

    var innerHTML = `
    <div class="col-12 d-flex justify-content-start">
    Horario dia ${i + 1}: <mark><span id="horas${i + 1}" name="">8</span></mark>
    </div>
    <div class="col-12">
    <input class="form-control" type="range" id="horaRange${i+1}" min="1" max="12" value="8" name="horaRange${i+1}" onchange="actualizarHoraFin(this, ${i + 1})" >
    </div>
    <div class="col-12">     
    <small>Hora Inicio</small> <input type="time" id="inicioH${i + 1}" step="3600" name="inicioH${i + 1}" value="10:00" style="width:80px" onchange="actualizarHoraFinPorCambioHora(this, ${i + 1})">
    <small>Hora Fin</small> <input type="time" id="finH${i + 1}" step="3600" name="finH${i + 1}" value="11:00" readonly style="width:80px">
    <input type="datetime" id="fecha${i + 1}" name="fecha${i + 1}" class="" value="${nuevaFechaFormateada}" >
    </div>
    `;

    nuevoBloque.innerHTML = innerHTML;

      // Agregar el nuevo bloque al contenedor
    contenedor.appendChild(nuevoBloque);
  }
  var cantN=document.getElementById('txtId');
  cantN.disabled=true;
  eliminarFilas();
}

//elimninar la columnas que quedaron sin fecha  
function eliminarFilas() {
  var filas = document.querySelectorAll("#detalleServicio tbody tr");

  filas.forEach(function (fila) {
    var numeroEnSelect = fila.querySelector("select").value;
    if (!numeroEnSelect) {
      fila.remove();
    }
  });
}
function actualizarHoraFin(inputRange, index) {

  var valorRango = inputRange.value;
  var horaFinElemento = document.getElementById(`finH${index}`);
  var horaRange = document.getElementById(`horaRange${index}`);

  var horas = document.getElementById(`horas${index}`);
  horas.innerText=horaRange.value;
  var horaInicio = new Date(`2000-01-01T${document.getElementById(`inicioH${index}`).value}:00`);
  horaInicio.setHours(horaInicio.getHours() + parseInt(valorRango));
  horaFinElemento.value = horaInicio.toLocaleTimeString([], {hour: '2-digit', minute: '2-digit'});
}

function actualizarHoraFinPorCambioHora(inputHoraInicio, index) {
  var valorHoraInicio = $(inputHoraInicio).val();
  var horaFinElemento = $(`#finH${index}`);
  var horasElemento = $(`#numberHrs${index}`);
  var valorRango = $(`#horaRange${index}`).val();

  horasElemento.text(valorRango);

  var horaInicio = new Date(`2000-01-01T${valorHoraInicio}:00`);
  horaInicio.setHours(horaInicio.getHours() + parseInt(valorRango));
  horaFinElemento.val(horaInicio.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }));
} 
function seleccionarFila(select) {
  // Obtener la fila padre del select
  var fila = select.parentNode.parentNode;
  var fechaHoraIni = $(fila).find("td:eq(2) input#fechaHoraInicio");
  var fechaHoraFin = $(fila).find("td:eq(2) input#fechaHoraFin");
  var duracion = $(fila).find("td:eq(2) input#duracion");

  


  var posicionOpcion = select.selectedIndex;
  var horaInicio = $(`#inicioH${posicionOpcion + 1}`).val();
  var duracionR = $(`#horaRange${posicionOpcion + 1}`).val();



  var seleValor = select.value;
  fechaHoraIni.val(seleValor+' '+horaInicio);
fechaHoraFin.val(duracionR);
duracion.val(duracionR);

  // Establecer la clase de color según la posición de la opción
  if (posicionOpcion === 0) {
    fila.style.background = '';
  } else if (posicionOpcion === 1) {
    fila.style.background = 'rgba(182,255,241,0.3)';
  } else if (posicionOpcion === 2) {
    fila.style.background = 'rgba(183,210,255,0.3)';
  } else if (posicionOpcion === 3) {
    fila.style.background = 'rgba(0,171,107,0.3)';
  }

  console.log("Posición de la opción seleccionada:", posicionOpcion);
  // Imprimir la posición de la opción seleccionada

  ordenarFilasPorFecha();
}



function ordenarFilasPorFecha(){
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("detalleServicio");
  switching = true;

  // Hacer un bucle hasta que no haya cambios para cambiar
  while (switching) {
    switching = false;
    rows = table.rows;

    // Hacer un bucle a través de todas las filas, excepto la primera (cabecera)
    for (i = 1; i < rows.length - 1; i++) {
      shouldSwitch = false;

      // Obtener los dos elementos que se deben comparar, uno de la columna actual y otro de la siguiente
      x = rows[i].getElementsByTagName("TD")[1];
      y = rows[i + 1].getElementsByTagName("TD")[1];

      // Comprobar si las dos fechas deben intercambiarse
      if (new Date(x.children[0].value) > new Date(y.children[0].value)) {
        // Marcar que se debe hacer el cambio y romper el bucle
        shouldSwitch = true;
        break;
      }
    }

    if (shouldSwitch) {
      // Intercambiar las filas y marcar que se ha hecho un cambio
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }

  // Aplicar el color al fondo de la fila según la opción seleccionada
  for (i = 0; i < rows.length; i++) {
    // Obtener la fecha de la celda de la fila actual
    var fechaCelda = rows[i].getElementsByTagName("TD")[1].children[0].value;

    // Obtener el color asociado a la fecha desde el mapeo
    var filaColor = colorMapping[fechaCelda];

    // Asignar el color al fondo de la fila
    rows[i].style.backgroundColor = filaColor;
  }
}



$(document).ready( function () {
 $("#btnGuardar").on("click", function(){ 
  fechaInici=$("#fecha").val();
  nombreEvento= $('#nombreEvento').val();
  numInvitados= $('#nroInvitados').val();
  dias= $('#txtDia').val();


horaInicios = new Array();
horaFines = new Array();
duraciones = new Array();

for (var i = 1; i <= dias; i++) {

  horaInicio = $(`#inicioH${i}`).val();
  duracion = $(`#horaRange${i}`).val();
  horaFin = $(`#finH${i}`).val();

  horaInicios[i] = horaInicio;
  duraciones[i] = duracion;
  horaFines[i] = horaFin;
}


 fechaFin=$("#fechaFin").val();
idCliente=$("#txtId").val();



  ids=new Array();
 $(".servicioDetalle").find('tr').each(function() {
  ids.push($(this).find("td:eq(0) input.idServicios").val());
});
 // fecha
 fechaHoraInicio=new Array();
  $(".servicioDetalle").find('tr').each (function() {
    fechaHoraInicio.push($(this).find("td:eq(2)input#fechaHoraInicio").val());
  }); 
 fechaHoraFin=new Array();
  $(".servicioDetalle").find('tr').each (function() {
    fechaHoraFin.push($(this).find("td:eq(2)input#fechaHoraFin").val());
  }); 
 horasDuracion=new Array();
  $(".servicioDetalle").find('tr').each (function() {
    horasDuracion.push($(this).find("td:eq(2)input#duracion").val());
  }); 
 cants=new Array();
  $(".servicioDetalle").find('tr').each (function() {
    cants.push($(this).find("td:eq(2)input#cant1").val());
  }); 

 precios=new Array();
  $(".servicioDetalle").find('tr').each (function() {
    precios.push($(this).find("td:eq(3)").text());
  }); 

 importes=new Array();
  $(".servicioDetalle").find('tr').each (function() {
    importes.push($(this).find("td:eq(4)").text());
  }); 
descuentos=new Array();
  $(".servicioDetalle").find('tr').each (function() {
    descuentos.push($(this).find("td:eq(5)#descuentoParcial").val());
  }); 





 totalSinDescuento=$("#total").val();
 totalDescuento=$("#descuento").val();
 totalPagar=$("#totalPagar").val();
 adelandto=$("#montoAdelantado").val();
 saldoPagar=$("#saldoPagar").val();




  // cants=new Array();
  // $(".list-product").find('tr').each (function() {
  //   cants.push($(this).find("#cant").val());
  // }); 

  agregarReservar(fechaInici,nombreEvento,numInvitados,dias,horaInicios,horaFines,duraciones,fechaFin,idCliente,
ids, fechaHoraInicio,fechaHoraFin,horasDuracion,cants,precios,importes,descuentos,totalSinDescuento,
totalDescuento,totalPagar,adelandto,saldoPagar);

fechaInici,nombreEvento,numInvitados,dias,horaInicios,horaFines,duraciones,fechaFin,idCliente,
ids, fechaHoraInicio,fechaHoraFin,horasDuracion,cants,precios,importes,descuentos,totalSinDescuento,
totalDescuento,totalPagar,adelandto,saldoPagar




});

});

function agregarReservar(
fechaInici,nombreEvento,numInvitados,dias,horaInicios,horaFines,duraciones,fechaFin,idCliente,
ids, fechaHoraInicio,fechaHoraFin,horasDuracion,cants,precios,importes,descuentos,totalSinDescuento,
totalDescuento,totalPagar,adelandto,saldoPagar){
  $.ajax({
    url: "../reservas/agregar",
    type: "POST",
    data:{
fechaInici,nombreEvento,numInvitados,dias,horaInicios,horaFines,duraciones,fechaFin,idCliente,
ids, fechaHoraInicio,fechaHoraFin,horasDuracion,cants,precios,importes,descuentos,totalSinDescuento,
totalDescuento,totalPagar,adelandto,saldoPagar
}
,
    success: function(resp){

                 toastr.info('pureba mensage');

  toast.info('');
    },
    error: function(){ 
      // window.location="<?php echo base_url(); ?>ventas";
    }
  });
}
