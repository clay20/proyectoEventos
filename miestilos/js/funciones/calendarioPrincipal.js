
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
  var ids = [];

  $(".servicioDetalle").find('tr').each(function() {
    var id = $(this).find(".ids").val();
    ids.push(id);
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
      // console.log(servicio+"desde aqui"+ids);
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
  const nroInvitado = document.getElementById("nroInvitados");
  const diasEventos = document.getElementById("txtDia").value;
  var fecha = document.getElementById('fecha');
  var horaInicio = $(`#inicioH1`).val();
  var duracion = $(`#horaRange1`).val();

  for (let i = 0; i < datalist.options.length; i++) {
    if (datalist.options[i].value === data.value) {
      id = datalist.options[i].getAttribute('servicioId');
      precio = datalist.options[i].getAttribute('precio');
      servicio = datalist.options[i].getAttribute('nombre');
      maximo = datalist.options[i].getAttribute('maximo');
      cant = Math.ceil(nroInvitado.value / 400 * maximo);

            // Agregar aquí la lógica para procesar cada elemento seleccionado
      generarNuevaFila(servicio,diasEventos,precio,id,cant,maximo);

    }
  }

    // Limpiar el campo de búsqueda después de procesar todos los elementos
  buscarServicio.value = "";
    // actualizarPrecio();
  ListaServicio();
}

var estadosCheckboxes = [];
var valoresInputsTexto = [];
var valoresInputsDescuento = [];


function generarCheckboxes() {
    // Obtener el número ingresado
  var numero = document.getElementById("txtDia").value;
  var tabla = document.getElementById("servicioDetalle");
  var filas = tabla.getElementsByTagName("tr");

  for (var i = 0; i <filas.length; i++) {
    var celdaDiaCat = filas[i].cells[1];
    celdaDiaCat.innerHTML = ""; 


    var max = filas[i].cells[0].querySelector("#maximo");

        // Recuperar estados de checkboxes y valores de inputs de texto
    var checkboxes = estadosCheckboxes[i] || [];
    var valoresTexto = valoresInputsTexto[i] || [];
    var valorDescuento=valoresInputsDescuento[i] || [];

    for (var j = 1; j <= numero; j++) {

      var invitados = document.getElementById("nroInvitados" + (j)); 
      var cant = Math.ceil((invitados.value / 400) * max.value);
      var divDia = document.createElement("div");
      divDia.className = "d-flex justify-content-start align-items-center diaDiv";


      var checkboxDia = document.createElement("input");
      checkboxDia.type = "checkbox";
      checkboxDia.id = "dia" + j;
      checkboxDia.name = "dia" + j;
      checkboxDia.className="diaBox";
      checkboxDia.style.width="22px";
      checkboxDia.style.height="22px";
      if(j<=checkboxes.length)
      {

        checkboxDia.checked = checkboxes[j-1] && true;
      }else
      {
        checkboxDia.checked =  true;

      }



      var lbDia = document.createElement("span");
      lbDia.textContent = " Día " + j;

      var inputDia = document.createElement("input");
      inputDia.type = "text";
      inputDia.id="cant"+j;
      inputDia.className="inputCat";
      inputDia.style.textAlign = "right"; 

      inputDia.minLength=1;
      inputDia.maxLength=3;

      inputDia.onkeypress = function(event) {
        return soloNumero(event);
      };

      inputDia.style.width="35px"
      inputDia.style.height="22px" 
      inputDia.value = valoresTexto[j-1] || cant;



      divDia.appendChild(lbDia);
      divDia.appendChild(checkboxDia);
        divDia.appendChild(inputDia); // Agregar el input de texto


        celdaDiaCat.appendChild(divDia);
      }
      console.log(valoresTexto);

        // Celda de importe
        // var celdaImporte = filas[i].Cells[3];
      var celdaImporte = filas[i].cells[3];

      celdaImporte.innerHTML = "";

      celdaImporte.classList.add("text-right");

      for (var k = 1; k <= numero; k++) {
        var divImporte = document.createElement("div");
        divImporte.className="divImporte";
        var labelDia = document.createElement("span");
        labelDia.textContent = "0.00";
        labelDia.id = "importe"+k;
        labelDia.className = "";     
        divImporte.appendChild(labelDia);

        celdaImporte.appendChild(divImporte);
      }

        // Celda de descuento
      var celdaDescuento = filas[i].cells[4];
      celdaDescuento.classList.add("text-right");
      celdaDescuento.innerHTML = ""; 


      for (var j = 1; j <= numero; j++) {
        var divDiaDes = document.createElement("div");
        divDiaDes.className="d-flex justify-content-end align-items-center divDes"
        var inputDiaSDes = document.createElement("input");
        inputDiaSDes.type = "text";
        inputDiaSDes.id="descuento"+j;
        inputDiaSDes.value=valorDescuento[j-1]|| 0.00 ;
        // console.log(valorDescuento[j-1]);
        inputDiaSDes.className = "descuentoT";  
        inputDiaSDes.onkeypress = function(event) {
          return soloNumero(event);
        };

        inputDiaSDes.style.width = "60px";
        inputDiaSDes.style.height = "22px";   
        inputDiaSDes.style.textAlign = "right"; 
        divDiaDes.appendChild(inputDiaSDes);
        celdaDescuento.appendChild(divDiaDes);
      }
    }


    cantidadPrecio();
  }




//persistencia de datos temporales

  function actualizarCheckboxes() {
            // Obtener la tabla
    var tabla = document.getElementById("servicioDetalle");
    var filas = tabla.getElementsByTagName("tr");

            // Guardar los estados de los checkboxes y valores de inputs de texto antes de limpiar la tabla
    estadosCheckboxes = [];
    valoresInputsTexto = [];
    valoresInputsDescuento = [];

    for (var i = 0; i < filas.length; i++) {
      var celdaDiaCat = filas[i].cells[1];
      var divsDia = celdaDiaCat.getElementsByClassName("diaDiv");



      var celdaDiaCat = filas[i].cells[4];
      var divDes = celdaDiaCat.getElementsByClassName("divDes");
      var descuentos = [];

      var estados = [];
      var valores = [];
      for (var j = 0; j <divsDia.length; j++) {
        var checkbox = divsDia[j].querySelector("input[type=checkbox]");
        var inputTexto = divsDia[j].querySelector("input[type=text]");

        var inputTextoDes = divDes[j].querySelector("input[type=text]");


        estados.push(checkbox.checked);
        valores.push(inputTexto.value);
        descuentos.push(inputTextoDes.value);

      }

      estadosCheckboxes.push(estados);
      valoresInputsTexto.push(valores);
      valoresInputsDescuento.push(descuentos);



    }
            // Actualizar la tabla
    generarCheckboxes();
  }








  function generarNuevaFila(nombreServicio, dias,pu,id,cant,max,) {
    // Obtener la tabla
    var tabla = document.getElementById("servicioDetalle");
    var numero = dias;
    var nuevaFila = tabla.insertRow();
    var celdaNombreServicio = nuevaFila.insertCell();
    var divNmbre = document.createElement("div");


    var inputId = document.createElement("input");
    inputId.value=id;
    var maximo = document.createElement("input");
    maximo.value=max;
    maximo.id="maximo";
    maximo.type="hidden";
    var labelNombre = document.createElement("label");
    labelNombre.textContent =  nombreServicio;
    inputId.type = "hidden";



    inputId.className = "ids"; 
    divNmbre.appendChild(inputId);
    divNmbre.appendChild(maximo);

    divNmbre.appendChild(labelNombre);


    celdaNombreServicio.appendChild(divNmbre);

    // Segunda celda para checkboxes con etiquetas y cantidad
    var celdaDiaCat = nuevaFila.insertCell();

    for (var i = 1; i <= numero; i++) {

     var invitados = document.getElementById("nroInvitados" + i);
     var cant = Math.ceil((invitados.value / 400) * max);
     var divDia = document.createElement("div");
     divDia.className = "d-flex  justify-content-start align-items-center diaDiv";

     var checkboxDia = document.createElement("input");
     checkboxDia.type = "checkbox";
     checkboxDia.id = "dia" + i;
     checkboxDia.name = "dia" + i;

     checkboxDia.style.width="22px"
     checkboxDia.style.height="22px"
     checkboxDia.checked=true;
     checkboxDia.className="diaBox";


     var lbDia = document.createElement("span");
     lbDia.textContent = " Día " + i;

     var inputDia = document.createElement("input");
     inputDia.type = "text";
     inputDia.id="cant"+i;
     inputDia.className="inputCat";
     inputDia.style.textAlign = "right"; 

     inputDia.minLength=1;
     inputDia.maxLength=3;

     inputDia.onkeypress = function(event) {
      return soloNumero(event);
    };

    inputDia.style.width="35px"

    inputDia.style.height="22px" 
    inputDia.value=cant;


    divDia.appendChild(lbDia);
    divDia.appendChild(checkboxDia);
        divDia.appendChild(inputDia); // Agregar el input de texto


        celdaDiaCat.appendChild(divDia);

      }

    // Tercera celda para precio
      var celdaPrecio = nuevaFila.insertCell();
      celdaPrecio.classList.add("text-right");
      celdaPrecio.innerHTML = pu;






      var celdaInporte = nuevaFila.insertCell();
      celdaInporte.classList.add("text-right");

      for (var i = 1; i <= numero; i++) {
        var divImporte = document.createElement("div");
        divImporte.className="divImporte";
        var labelDia = document.createElement("span");
        labelDia.textContent = "0.00";
        labelDia.id = "importe"+i;
            // labelDia.style.marginTop = '4px';


        labelDia.className = "";     
        divImporte.appendChild(labelDia);

        celdaInporte.appendChild(divImporte);
      }
      var celdaDescuento = nuevaFila.insertCell();
      celdaDescuento.classList.add("text-right");

      for (var i = 1; i <= numero; i++) {
        var divDiaDes = document.createElement("div");

        divDiaDes.className="d-flex justify-content-end align-items-center divDes"
        var inputDiaSDes = document.createElement("input");
        inputDiaSDes.type = "text";
        inputDiaSDes.id="descuento"+i;
        inputDiaSDes.value="0.00";
        inputDiaSDes.className = "descuentoT";  
        inputDiaSDes.onkeypress = function(event) {
          return soloNumero(event);
        };
        inputDiaSDes.style.width = "60px";
        inputDiaSDes.style.height = "22px";   
        inputDiaSDes.style.textAlign = "right"; 
        divDiaDes.appendChild(inputDiaSDes);
        celdaDescuento.appendChild(divDiaDes);
      }
// Cuarta celda para el botón eliminar
      var celdaBotonEliminar = nuevaFila.insertCell();
      var btnEliminar = document.createElement("button");
      btnEliminar.type = "button";
      btnEliminar.id = "eliminar";
btnEliminar.className = "btn btn-sm"; // Agregar clase de Bootstrap para un botón rojo
btnEliminar.title = "Eliminar";
var ico = document.createElement("i");
ico.className = "fa-solid fa-circle-minus fa-xl text-danger m-0 ";
btnEliminar.appendChild(ico);  // <-- Corregido de btn a btnEliminar
btnEliminar.addEventListener("click", function() {
  $(this).closest('tr').remove();
  actualizarPrecio();
  actualizarCheckboxes();

});

celdaBotonEliminar.appendChild(btnEliminar);
    // actualizarCheckboxes();
cantidadPrecio();
}


  function eliminarFilasSinCheck() {
            // Obtener la tabla
            var tabla = document.getElementById("servicioDetalle");

            // Obtener todas las filas de la tabla
            var filas = tabla.getElementsByTagName("tr");

            // Recorrer las filas en reversa (empezando desde el final)
            for (var i = 0 ;i<filas.length ; i++) {
                var celdaDiaCat = filas[i].cells[1];
                var divsDia = celdaDiaCat.getElementsByClassName("diaDiv");

                // Verificar si algún checkbox está marcado
                var algunCheckboxMarcado = Array.from(divsDia).some(div => {
                    var checkbox = div.querySelector("input[type=checkbox]");
                    return checkbox.checked;
                });
                console.log(algunCheckboxMarcado);

                // Si no hay ningún checkbox marcado, eliminar la fila
                if (!algunCheckboxMarcado) {
                    tabla.deleteRow(i);
                }

            }
            ListaServicio();
  }













function cantidadPrecio() {
  // Obtener la tabla
  var tabla = document.getElementById("servicioDetalle");
  var filas = tabla.getElementsByTagName("tr");

  for (var i = 0; i < filas.length; i++) {
    var celdaDiaCat = filas[i].cells[1];
    var precio = filas[i].cells[2].textContent;
    var celdaImporte = filas[i].cells[3];

    var divsDia = celdaDiaCat.getElementsByClassName("diaDiv");
    var divsImporte = celdaImporte.getElementsByClassName("divImporte");


    for (var j = 0; j < divsDia.length; j++) {

      var inputTexto = divsDia[j].querySelector("input[type=text]");
      cant=inputTexto.value;
      var label = divsImporte[j].querySelector("span");
      label.textContent = (cant * precio).toFixed(2);
    }
  }
  actualizarPrecio();
  eliminarFilasSinCheck();
}


$(document).on("keyup", ".servicioDetalle .descuentoT", function () {


  des = Number($(this).val());

  var divActual = $(this).closest("div.divDes");
  var indiceDiv = divActual.index();


  var impSub = $(this).closest("tr").find("td:eq(3) span#importe" + (indiceDiv + 1)).text();
  if(impSub<=des){
    var descuento=impSub==0? 0:impSub/2;
    $(this).val(descuento);
    toastr.info("El descuento no debe ser mayor a 50% " +descuento);
  } 



  actualizarPrecio();


})



$(document).on("click", ".diaBox", function() {



  var divActual = $(this).closest("div.diaDiv");
  var indiceDiv = divActual.index();

  if ($(this).is(":checked")) {

    precio = Number($(this).closest("tr").find("td:eq(2)").text());
    maximo = Number($(this).closest("tr").find("td:eq(0) div input#maximo").val());
    nroInvitado = $("#nroInvitados"+(indiceDiv+1));
    var cant = Math.ceil((nroInvitado.val() / 400) * maximo);
    var ele= $(this).closest("tr").find("td:eq(1) div input#cant" + (indiceDiv + 1));
    ele.val(cant);

    var importe = $(this).closest("tr").find("td:eq(3) span#importe" + (indiceDiv + 1));
    importe.text((parseFloat(ele.val())*precio).toFixed(2));


    actualizarPrecio();



  } 
  else {
   $(this).closest("tr").find("td:eq(1) div input#cant" + (indiceDiv + 1)).val(0);


   $(this).closest("tr").find("td:eq(3) span#importe" + (indiceDiv + 1)).text((0).toFixed(2));
   $(this).closest("tr").find("td:eq(4) div input#descuento" + (indiceDiv + 1)).val((0).toFixed(2));
   actualizarPrecio();


 }
});



















$(document).on("keyup", ".servicioDetalle .inputCat", function () {
  cant = Number($(this).val());
  precio = Number($(this).closest("tr").find("td:eq(2)").text());
  var importe=0;
  var divActual = $(this).closest("div.diaDiv");
  var indiceDiv = divActual.index();

// alert('indeic '+indiceDiv);
  maximo = Number($(this).closest("tr").find("td:eq(0) #maximo").val());  //es como es stok en un 
  nombreservicio = $(this).closest("tr").find("td:eq(0) label").html();


  if (!Number.isInteger(cant) || cant >= maximo) {
    $(this).addClass("is-invalid");
    // $(this).closest("tr").find("td:eq(5)").text(0);


    $(this).val(maximo);
    importe = maximo*precio;
    console.log(nombreservicio+"  deve ser menor "+maximo+" es cantidad maxima");
    toastr.info(nombreservicio+"  deve ser menor a "+maximo+" es cantidad maxima");

  } else {
    $(this).removeClass("is-invalid");
    importe = (cant*precio).toFixed(2);




  }
  var sudElement = $(this).closest("tr").find("td:eq(3) span#importe" + (indiceDiv + 1));
  sudElement.text(importe); 
  actualizarPrecio();

});


// $(document).on("keyup", ".servicioDetalle .descuentoParcial", function () {
//   actualizarPrecio();
// });




function actualizarPrecio() {
  var total = 0;
  var descuentoTotal = 0;
  var subtotal = 0;
  var subdescuentoTotal = 0;

  var tabla = document.getElementById("servicioDetalle");
  var filas = tabla.getElementsByTagName("tr");

  for (var i = 0; i < filas.length; i++) {

    var celdaImporte = filas[i].cells[3];//
    var celdaDes = filas[i].cells[4];//

    var divsImporte = celdaImporte.getElementsByClassName("divImporte");  
    var divDes = celdaDes.getElementsByClassName("divDes");  

    for (var j = 0; j < divsImporte.length; j++) {


     var label = divsImporte[j].querySelector("span");
     subtotal=subtotal+ parseFloat(label.textContent) ;
     var des = divDes[j].querySelector("input");
     subdescuentoTotal =subdescuentoTotal+ parseFloat(des.value);
   }
   total+=parseFloat(subtotal);
   subtotal=0;
   descuentoTotal+=subdescuentoTotal;
   subdescuentoTotal=0;
 }

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

var estadoInvitados = [];

function valoresInvitados(dias) {
  estadoInvitados = [];

  for (var i = 0; i < dias; i++) {
    var nInv = document.getElementById("nroInvitados" + (i+1));

    estadoInvitados[i] =  nInv.value;
  }

}


function agregarBloques() {
    // Obtener el valor ingresado por el usuario
  var cantidadBloques = parseInt(document.getElementById("txtDia").value);
  var fechaIngresada = document.getElementById("fecha").value;

  var contenedor = document.getElementById("contenedorBloques");
  contenedor.innerHTML = "";
  var resValores;
  var fFin;
  for (var i = 0; i < cantidadBloques; i++) {

    var nuevoBloque = document.createElement("div");
    nuevoBloque.className = "col-12";

    if (i < estadoInvitados.length && estadoInvitados.length!=0) {
      resValores = estadoInvitados[i];
    } else {
      resValores = 100;
    }
    // fechas sumas 
    var fechaObjeto = new Date(fechaIngresada);
    var nuevaFecha = new Date(fechaObjeto);
    nuevaFecha.setDate(fechaObjeto.getDate() + i);
    var nuevaFechaFormateada = nuevaFecha.toISOString().slice(0, 10);
    fFin=nuevaFechaFormateada;
    // fechas sumas 

    var innerHTML = `
    <div class="col-12 m-0 p-0">

    <div class="row">
    <div class="col-xl-7 col-lg-12 col-md-7 col-sm-7 col-7 d-flex">
    <div class="col-12">
    <strong> Horario dia ${i + 1}:</strong>  <mark><b><span id="horas${i + 1}" name="">8</span></b></mark> Horas
    </div>

    </div>
    <div class="col-xl-5 col-lg-12 col-md-5 col-sm-5 col-5 d-flex">

    <div class="col-6">
    <label>
    Invitados:</label>
    </div>
    <div class="col-6">
    <input class="invitados"  type="text" id="nroInvitados${i+1}" name="nroInvitados" onkeypress="return soloNumero(event)" maxlength="3" minlength="1"   value="${resValores}" style="width: 40px; height: 25px;" required ">

    </div>  
    </div>
    </div>
    <div class="row">
    <input class="form-control" type="range" id="horaRange${i+1}" min="1" max="12" value="8" name="horaRange${i+1}" onchange="actualizarHoraFin(this, ${i + 1})" >
    </div>
    <div class="row">  
    <div class="col-12 d-flex">
    <div class="col-6 d-flex">
    <span>Hora Inicio</span> <input type="time" id="inicioH${i + 1}" step="3600" name="inicioH${i + 1}" value="10:00" style="width:80px" onchange="actualizarHoraFinPorCambioHora(this, ${i + 1})">
    </div>
    <div class="col-6 d-flex">
    <span>Hora Fin</span> <input type="time" id="finH${i + 1}" step="3600" name="finH${i + 1}" value="11:00" readonly style="width:80px">
    </div>

    </div>


    <input type="hidden" id="fecha${i + 1}" name="fecha${i + 1}" class="" value="${nuevaFechaFormateada}" >
    </div>
    </div>
    <hr class="bgt-primary">

    `;

    nuevoBloque.innerHTML = innerHTML;

      // Agregar el nuevo bloque al contenedor
    contenedor.appendChild(nuevoBloque);
  }
  fechaFin=document.getElementById('fechaFin');
  fechaFin.value=fFin;
  var cantN=document.getElementById('txtId');
  cantN.disabled=true;
  actualizarCheckboxes();
  actualizarPrecio();
}




$(document).on("keyup", ".invitados", function () {
  invitados = Number($(this).val());
  var id = $(this).attr('id');
var indice=id[id.length-1]; //tenemos el id para manda ahora en la tabla que
var capacidadMaxima= document.getElementById("maxCapacidad").value;

//neceistamos hacer el calculo
if( invitados<=capacidadMaxima)
{
 var tabla = document.getElementById("servicioDetalle");
 var filas = tabla.getElementsByTagName("tr");

 for (var i = 0; i < filas.length; i++) {
  var celdaDiaCat = filas[i].cells[1];
  var divsDia = celdaDiaCat.getElementsByClassName("diaDiv");
  var max = filas[i].cells[0].querySelector("#maximo");


  for (var j = 0; j < divsDia.length; j++) {

   if(j==indice-1){
    var cant = Math.ceil((invitados/ capacidadMaxima) * max.value);
    var inputTexto = divsDia[j].querySelector("input[type=text]");
    inputTexto.value=cant;

  }


}
}


}else
{
  $(this).val(capacidadMaxima);
  toastr.info("Cantidad de invitados debe ser menor "+capacidadMaxima+"");


}

var dias =document.getElementById("txtDia");
valoresInvitados(dias.value);

cantidadPrecio();

});


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


function validarCampos()
{
  var bar= false;

  var tipoEvento = document.getElementById("nombreEvento");
  var dia = document.getElementById("txtDia");
  var fecha =document.getElementById("fecha");
  var fechafin =document.getElementById("fechaFIn");
  var cliente=document.getElementById("nombreCliente");
  var tabla = document.getElementById("servicioDetalle");
  var filas = tabla.getElementsByTagName("tr");
  var servicio=document.getElementById("txtBuscaeServicio");
  if(tipoEvento.value=="")
  {
    tipoEvento.focus();
    toastr.info("Debe seleccionar un tipo de evento");
  }
  if(dia.value=="")
  {
    dia.focus();
    dia.value=1;
    toastr.warning("almenos debe ir un dia");
    fechaFin.value=fecha.value;
    var eventoChange = new Event("change");

    dia.dispatchEvent(eventoChange);

  }
  if(cliente.value=="")
  {
    cliente.focus();
    toastr.info("Elige un cliente");
  }

  if(filas.length==0)
  {
    servicio.focus();
    toastr.info("Debes eligir eligir los servicios");

  }

}


$(document).ready( function () {
 $("#btnGuardar").on("click", function(){ 

   validarCampos();




   fechaInici=$("#fecha").val();
   nombreEvento= $('#nombreEvento').val();
   dias= $('#txtDia').val();
   fechaFin=$("#fechaFin").val();



   horaInicios = new Array();
   horaFines = new Array();
   duraciones = new Array();
   invitados=new Array();
   fechas=new Array();
   for (var i = 1; i <= dias; i++) {

    horaInicio = $(`#inicioH${i}`).val();
    duracion = $(`#horaRange${i}`).val();
    horaFin = $(`#finH${i}`).val();
    invitado=$(`#nroInvitados${i}`).val();
    fecha=$(`#fecha${i}`).val();


    horaInicios[i] = horaInicio;
    duraciones[i] = duracion;
    horaFines[i] = horaFin;
    invitados[i]=invitado;
    fechas[i]=fecha;
  }

  idCliente=$("#txtId").val();//el cliente que pide una reseerva
  ids=new Array();
  $(".servicioDetalle").find('tr').each(function() {
    ids.push($(this).find("td:eq(0) input.idServicios").val());

  });

  var ids = [];
  var cbxDia = [];
  var cantidades = [];
  var descuento = [];
  var importes=[];

  var tabla = document.getElementById("servicioDetalle");
  var filas = tabla.getElementsByTagName("tr");

  for (var i = 0; i < filas.length; i++) {
    var celdaDiaCat = filas[i].cells[1];
    var id = filas[i].cells[0].querySelector("div input.ids").value;


    var divsDia = celdaDiaCat.getElementsByClassName("diaDiv");
    var celdaDiaCat = filas[i].cells[4];

    var divDes = celdaDiaCat.getElementsByClassName("divDes");
    var descuentos = [];
    var estados = [];
    var valores = [];


    var celdImporte = filas[i].cells[3];//celda donde esta importe
    var divimpo = celdImporte.getElementsByClassName("divImporte");
    var importe=[];

    for (var j = 0; j <divsDia.length; j++) {
      var checkbox = divsDia[j].querySelector("input[type=checkbox]");
      var inputTexto = divsDia[j].querySelector("input[type=text]");
      var inputTextoDes = divDes[j].querySelector("input[type=text]");
      var importeServicio=divimpo[j].querySelector("span");

      estados.push(checkbox.checked);
      valores.push(inputTexto.value);
      descuentos.push(inputTextoDes.value);
      importe.push(importeServicio.innerText);
      // console.log(importeServicio);
    }

    cbxDia.push(estados);
    cantidades.push(valores);
    descuento.push(descuentos);
    ids.push(id);
    importes.push(importe);

  }

  console.log(ids);
  console.log(cbxDia);
  console.log(importes);
  console.log(cantidades);
  console.log(descuentos);
  console.log(fecha);






 // fecha
  var pu = new Array();
  $(".servicioDetalle").find('tr').each(function() {
    pu.push($(this).find("td:eq(2)").text());
  });



  totalSinDescuento=$("#total").val();
  totalDescuento=$("#descuento").val();
  totalPagar=$("#totalPagar").val();//ya con descuento de anterior
  adelandto=$("#montoAdelantado").val();
  saldoPagar=$("#saldoPagar").val();


  // agregarReservar(fechaInici,nombreEvento,numInvitados,dias,horaInicios,horaFines,duraciones,fechaFin,idCliente,
  //   ids, fechaHoraInicio,fechaHoraFin,horasDuracion,cants,precios,importes,descuentos,totalSinDescuento,
  //   totalDescuento,totalPagar,adelandto,saldoPagar);

  // fechaInici,nombreEvento,numInvitados,dias,horaInicios,horaFines,duraciones,fechaFin,idCliente,
  // ids, fechaHoraInicio,fechaHoraFin,horasDuracion,cants,precios,importes,descuentos,totalSinDescuento,
  // totalDescuento,totalPagar,adelandto,saldoPagar




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
