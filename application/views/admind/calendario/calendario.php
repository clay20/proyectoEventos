 <!--  -->

 <div class="wrapper" style="background-image: url('<?php echo base_url();?>/img/fondo.jpg');">

  <div class="content-wrapper"   style=" background:rgba(0, 0, 0, .3);">

    <!-- Content Header (Pa  ge header) -->
    <section class="content-header " >

      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="t-primary">Calendario de eventos</h1>
          </div>
          <div class="col-sm-6 d-flex justify-content-end ">
            <ol class="row breadcrumb float-sm-right">
              <li><a href="<?php echo base_url();  ?>index.php/usuario/calAnual"> anual</a> 
                <i class= "fa fa-square text-green"></i> Pagados
                <i class="fa fa-square text-aqua"></i> Reservados
                <i class="fa fa-square text-yellow"></i> Pendientes</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->

      </section>

      <!-- Main content -->
      <section class="content " style=" " >

        <div class="container-fluid">

          <div class="box box-primary no-border">
            <div class="box-body no-padding">
              <!-- THE CALENDAR -->
              <div id="mini-clndr" >
                <div class="clndr">  

                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.row -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


  </div>
  <!-- ./wrapper -->

  <div class="modal modal-primary" id="modalAddEvent" aria-hidden="true"  >
    <div class="modal-dialog modal-lg" >
      <div class="modal-content" style="background:rgba(251, 214, 169, .9);">
        <div class="modal-header  p-2 m-0  bgt-primary" >
          <div class="container">
           <div class="row">

            <h5 class="modal-title ">Agregar un evento para el dia <span id="titleModalDay">2023-08-12</span>  <div class="row">
                   <input type="hidden" id="fecha" name="fechaEvento" >
                </div></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span  aria-hidden="true">×</span></button>


          </div>
        </div>
      </div>




      <div class="modal-body mx-1 p-1 fgt-secondary">
        <section class="row p-1" >
          <div class="col-sm-12 col-lg-4" >
           <section class="row">
            <!-- Sección para el nombre del evento -->
            <div class="col-12">
              <div class="myBox">
                <input class="myImputField form-control" type="text" placeholder="Ej.Cena Graduación Compromiso Matrimonio..." autofocus autocomplete="off">
                <label class="mylabel">Nombre del evento</label>
              </div>
            </div>

            <!-- Sección para la capacidad y detalles del evento -->
            <div class="col-12">
              <label>Capacidad del salon</label>
              <div class="row">
                <div class="col-lg-12 col-md-8 col-6">
                  minimo<input type="text" name="" value="100" disabled style="width: 40px; height: 25px;">
                  maximo<input type="text" name="" value="400" disabled style="width: 40px; height: 25px;">
                </div>
                <div class="col-lg-12 col-md-4 col-4 d-flex justify-content-center">
                  Nro Invitados<input type="number" name="" value="" style="width: 40px; height: 25px;">
                </div>

               
              </div>
               <div class="row">
                <div class="col-12 d-flex justify-content-start">
                  
                  Horas contratadas: <span id="numberHrs">1</span>
                </div>
                  <div class=" col-lg-12 col-md-6 col-sm-6 d-flex" style="background: red;">
                    
                    <div class="col-6">
                    <label>Hora Inicio</label>
                      
                    </div>
                    <div class="col-6">
                    <input type="text" id="startH" value="10:00 PM" style="width:80px">
                      
                    </div>
                  </div>
                  
                
                    <div class="col-lg-12 col-md-6 col-sm-6 d-flex" >
                      
                    <div class="col-6">
                    <label>Hora Fin</label>
                      
                    </div>
                    <div class="col-6">
                    <input type="text" value="11:00 PM" disabled="" style="width:80px">
                      
                    </div>
                    </div>
                </div>
               
            </div>
          </section>

        </div>
        <div class="col-sm-12 col-lg-8 p-1">
          <div class="col-12 d-flex">

            <div class="col-11">
              <div class="myBox">

                <input type="hidden" id="txtId" name="idCliente">
                <input type="text" class="myImputField" id="nombreCliente" required placeholder="" list="listaCliente" onchange="seleccionCliente(this)" autocomplete="off"> 
                <label class="mylabel" id="lbLeyenda">Persona que contrata el evento</label>
              </div>

              <datalist id="listaCliente">
               
              </datalist>
             
            </div>
            <div class="col-1 d-flex justify-content-center align-items-center" >
              <button class="btnt-primary btn-sm" title="Nuevo Cliente" data-toggle="modal" data-target="#agregarCliente"><i class="fa-solid fa-square-plus d-flex justify-content-center"></i></button>
              
            </div>
          </div>
          <div class="col-12 d-flex">

            <div class="col-11">
              <div class="myBox">


                <input type="text" class="myImputField" id="txtBuscaeServicio" required placeholder="" list="listaServicio"  onautocomplete="off" onchange="seleccionarServicio(this)"> 
                <label class="mylabel" >Buscar Servicio</label>
              </div>

              <datalist id="listaServicio">
              
              </datalist>
            </div>
            <div class="col-1 d-flex justify-content-center align-items-center" >
              <button class="btnt-primary btn-sm" disabled ><i class="fa-solid fa-magnifying-glass fa-sm"></i></button>
            </div>
          </div>

          <table class="p-1" rules="all" width="100%">
            <thead class="bgt-primary">
              <tr>
                <tr>
    <th style="text-align: center;"><small>Nom. Servicio</small></th>
    <th style="text-align: center;"><small>Cant.</small></th>
    <th style="text-align: center;"><small>Precio</small></th>
    <th style="text-align: center;"><small>Total</small></th>
    <th style="text-align: center;"><small>Descuento</small></th>
    <th style="width:10px"></th>
  </tr>
              </thead>
              <tbody id="servicioDetalle">
                <tr>
                  <td>Salon</td>
                  <td style="text-align:right;"><input type="number" name="" style="width:40px ;height: 20px;" value="1" disabled></td>
                  <td style="text-align:right;">3000</td>
                  <td style="text-align:right;">2000</td>
                  <td style="text-align:right;"><input class=""   type="number" name="" style="width:40px ;height: 20px;" value="10"></td>

                  <td><button class="btn btn-sm text-danger p-1" disabled><i class="fa-solid fa-circle-minus fa-lg"></i></button></td>
                </tr>
                 



              </tbody>
              <tfoot class="bgt-primary">
               <tr>
                <th colspan ="3"><small>Total general</small> </th>

                <td style="text-align:right;">3000 Bs</td>
                <th></th>

              </tr>
              <tr>
                <td colspan ="3"><small>Monto adelantado</small> </td>

                <th style="text-align:right;">1000 Bs</th>
                

              </tr>
              <tr>
                <th colspan ="3"><small>Saldo a pagar</small> </th>

                <th style="text-align:right;">2000 Bs</th>
               

              </tr>

            </tfoot>
          </table>

        </div>
      </section>


      <!-- <div class="clearfix"></div>         -->

    </div>
    <div class="modal-footer d-flex justify-content-around p-1 bgt-acent " >
      <button type="button" class="btn-sm btnt-primary" id="addCalendarEvt" >Agregar</button>
      <button type="button" class="btn-sm btnt-primary " data-dismiss="modal">Cancelar</button>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->

</div>

<!-- Modal -->
<form id="formNuevoCliente" action="#" method="POST">
     

<div class="modal fade" id="agregarCliente" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header p-1 bgt-acent">
       

           <div class="container">
           <div class="row">

            <h5 class="modal-title ">Nuevo cliente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span  aria-hidden="true">×</span></button>


          </div>
        </div>
      </div>
      <div class="modal-body bgt-secondary">
       
                  <!-- Post -->        

                  <div class="row">

                    <div class=" col-md-12 ">
                     <div class="myBox">

                      <input  class="myImputField" type="text" name="nombre" id="txtNombre" onkeypress="return soloLetrasEspacio(event)" minlength="1" maxlength="25" required autofocus />
                      <label class="mylabel" for="">Nombre</label>
                      

                    </div>
                        </div>
                        <div class=" col-sm-12 col-md-6">
                         <div class="myBox">

                          <input  class="myImputField form-control-md" type="text" name="primerApellido" id="txtApellido1" onkeypress="return soloLetrasEspacio(event)" minlength="1" maxlength="25" required  />
                          <label class="mylabel" for="">Primer Apellido</label>
                       

                        </div>
                      </div>
                      <div class=" col-sm-12 col-md-6 ">
                       <div class="myBox">

                        <input  class="myImputField form-control-sm" type="text" name="segundoApellido" id="txtApellido2" onkeypress="return soloLetrasEspacio(event)" minlength="1" maxlength="25"  />
                        <label class="mylabel" for="">Segundo Apellido</label>
                      

                      </div>
                    </div>

                  </div>


                      <div class="row">


                       <div class=" col-md-12 col-sm-12">
                         <div class="myBox">

                          <input  class="myImputField" type="text" name="ci" id="txtCi" onkeypress="return LetrasNumero(event)" minlength ="1" maxlength ="9"  required  />
                          <label class="mylabel" for="">C.I.</label>
                          <label class="mylabel-icon" for=""><i class="fa-solid fa-id-card"></i></label>

                        </div>
                      </div>
                      <div  class=" col-sm-12 col-md-6  ">
                        <div class="myBox">

                          <input  class="myImputField" type="text" name="celular" id="txtCelular" onkeypress="return soloNumero(event)" minlength ="1" maxlength ="9"  required  />
                          <label class="mylabel" for="">Celular</label>
                          <label class="mylabel-icon" for=""><i class="fa-solid fa-mobile-retro"></i></label>

                        </div>
                      </div>
                      <div  class=" col-sm-12 col-md-6">
                        <div class="myBox">

                          <input  class="myImputField" type="text" name="telefono" id="txtTelefono"  onkeypress="return soloNumero(event)"minlength ="1" maxlength ="9"/>
                          <label class="mylabel" for="">Telefono</label>
                          <label class="mylabel-icon" for=""><i class="fa-solid fa-phone"></i></label>

                        </div>
                      </div>
                    </div>
               
             

                </div>
      
      <div class="modal-footer d-flex justify-content-around p-1 bgt-acent">
         <button class="btn btn-sm btnt-primary" type="submit"><i class="fas fa-save"></i>Guardar</button>
        <button type="button" class="btn btnt-primary btn-sm" data-dismiss="modal"><i class="fas fa-times"> </i>Cancelar</button>
      </div>
    </div>
  </div>
</div>
</form>

<script>"use strict";</script>
<script src="<?php echo base_url();?>/calendario/res/jquery.js"></script>
<script src="<?php echo base_url();?>/calendario/res/momentjs.lang.js"></script>
<script src="<?php echo base_url();?>/calendario/res/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/calendario/res/underscore-min.js"></script>
<script src="<?php echo base_url();?>/calendario/res/clndr.min.js"></script>


<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  reservarsalon = ['UA', '114663401', '1' ];
  gtag('config', reservarsalon.join("-"));
</script>

<script id="calendar-template" type="text/template">  
  <div class="row" >
    <div class="col-md-8 " >

      <div class="controls d-flex " style="background:rgba(0,31,63,0.5);">
        <div class="clndr-previous-button">&lsaquo;</div>
        <div class="month"><%= month %>&nbsp;<%= year %></div>
        <div class="clndr-next-button">&rsaquo;</div>
      </div>

      <div class="days-container " >
        <div class="days" style="background:rgba(255,171,107,0.4);">
          <div class="headers" style="background:rgba(0,31,63,1);">
            <% _.each(daysOfTheWeek, function(day) { %><div class="day-header"><%= day %></div><% }); %>
          </div>
          <% _.each(days, function(day) { %><div class="<%= day.classes %>" id="<%= day.id %>"><%= day.day %></div><% }); %>
        </div>
      </div>

    </div>

    <div class="col-md-4" id="listevents" style="background:rgba(255,171,107,0.3); height: 50vh;">
      <div class="event-listing hidden-xs">
        <div class="event-listing-title text-center" style="background:rgba(255,171,107,0.5);">Eventos programados</div>
        <div>

        </div>

      </div>
    </div>
  </div>
</script>

<script>

  var myCalendar;
  var currentPeriod = 202308;
  var eventsArray = [];

  function loadBySection(){

  moment.locale('es'); /*Lang*/

    var aux;

    myCalendar = $('#mini-clndr').clndr({

      daysOfTheWeek: ['Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa', 'Do'],
      template  :    $('#calendar-template').html(),
      events    :    eventsArray,

      ready     :    function(){ setInterval(getNewData, 1000); },  

      clickEvents: {
      // fired whenever a calendar box is clicked.
      // returns a 'target' object containing the DOM element, any events, and the date as a moment.js object.
        click: function(target){
          aux = target;

          dayClass = aux.element.className;

        /*today o YYYY-mm-dd*/
        clickedDay = aux.date._i;  /*dayClass.split(" ")[1].replace("calendar-day-", '');*/

          if ( dayClass.indexOf('event') > -1 ){

            eventDetail = aux.events[0];
            prepareModalDetail( clickedDay, eventDetail );

          }else{

            if ( dayClass.indexOf('past') < 0 && dayClass.indexOf('adjacent-month') < 0 ) {
              prepareModalToAdd( clickedDay );
             
            }

          }

        },
        onMonthChange: function(month) {
          waitOnCalendarLoad(true);
          currentPeriod =  month.format('YYYYMM');
        }

      }

    });






    var enjoyhint_instance = new EnjoyHint({});



// https://github.com/xbsoftware/enjoyhint
    enjoyhint_instance.set(enjoyhint_script_steps);
    enjoyhint_instance.run();
  }


  function passValidation(){

  // Validar que no esten vacios los campos
    fieldsToCheck = ['eventName', 'userName', 'tel', 'email', 'total'];

    for (i = 0; i < fieldsToCheck.length; i++) { 

      fieldCheck = fieldsToCheck[i];

      var eventVal = $("#"+fieldCheck).val();

      if ( eventVal == '' || eventVal.length < 1 || eventVal == 0 ) {
        $("#"+fieldCheck).parent().addClass("has-error");      
        return false;
      }

    }

    return true;

  }


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
      mensaje();
      ListaServicio()


  }



function mensaje(){
  console.log("");
}

  $('#nombreCliente').keyup(function() {//buscamo al empledo para signiar un usuario

    if($('#nombreCliente').val()) {
      let valor = $('#nombreCliente').val();
      $.ajax({
          url:'../cliente/buscarCliente',// tenesmo ir dirento ala controlador de model usuario desde air llmaar
          data: {valor},
          type: 'POST',
          success: function (response) {
            if(!response.error) {
              let cliente= JSON.parse(response);
              console.log(cliente);
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
function ListaServicio()
  {
  
   $.ajax({
    url:'../servicios/listaServicios',
    type:'POST',
    success:function(response){
      
      let servicio= JSON.parse(response);
      let template= "";
      
      servicio.forEach(servicio=>{
        template+=`
        <option servicioId=${servicio.id}
        

        value=${servicio.nombre}
        nombre=${servicio.nombre}

        medida = ${servicio.medida}
        precio= ${servicio.precio} >
        ${servicio.descriccion+' '+servicio.proveedor}
        </option>

        `
      
      });
      $('#listaServicio').html(template); 
    }
  });
 }

function seleccionarServicio(data) {
  const datalist = document.getElementById('listaServicio');
  const buscarServicio = document.getElementById('txtBuscaeServicio');

  for (let i = 0; i < datalist.options.length; i++) {
    if (datalist.options[i].value === data.value) {
      id = datalist.options[i].getAttribute('clienteId');
      precio = datalist.options[i].getAttribute('precio');
      servicio = datalist.options[i].getAttribute('nombre');

      let template = "";

   
        template += `
        <tr servicioId=${id}>
          <td>${servicio}</td>
          <td style="text-align:right;"><input type="number" name="" style="width:40px ;height: 20px;" value="1"></td>
          <td style="text-align:right;">${precio}</td>
          <td style="text-align:right;">${'34234'}</td>
          <td style="text-align:right;"><input class="" type="number" name="" style="width:40px ;height: 20px;" value="10"></td>
          <td><button class="btn btn-sm text-danger p-1 btnEliminarFila"><i class="fa-solid fa-circle-minus fa-lg"></i></button></td>
        </tr>`;
      

      // Agregar las filas a la tabla usando append
      // $('#servicioDetalle').html('');  // Limpiar contenido anterior
      $('#servicioDetalle').append(template);
     
       buscarServicio.value="";
      break;
    }
  }
}

$(document).on('click', '.btnEliminarFila', function() {
  // Obtener la fila padre y eliminarla
  $(this).closest('tr').remove();
});



//   function addCalendarEvt( clickedDay ){

//     if ( !passValidation() ) {
//       return 0;
//     }

// /*  console.log( clickedDay );*/


//     fieldsToGetVal = ['eventName', 'userName', 'tel', 'email', 'eventHours', 'startH', 'total', 'payment'];
//     var ivtosend = '';

//     for (i = 0; i < fieldsToGetVal.length; i++) {

//       fieldToSend = fieldsToGetVal[i];
//       valueToSend = $("#"+fieldToSend).val();

//       ivtosend += '"' + fieldToSend + '":"' + valueToSend + '",';

//     }

//   // Agregar lo que falta
//     ivtosend += '"day":"' + clickedDay + '"';
//     ivtosend = '{' + ivtosend + '}';

//     var objson = JSON.parse(ivtosend);

//     $.post( 
//       'aqui var ir nuestro direccion' + 
//       3 + 
//       '/'+ currentPeriod, 
//       objson ,
//       function( data ){

//         console.log(data);
//         $("#modalAddEvent .modal-header .close").click();

//       // Limpiar campos ---------------------------
//         for (i = 0; i < fieldsToGetVal.length; i++) {
//           fieldToSend = fieldsToGetVal[i];
//           $("#"+fieldToSend).val("");
//         }
//       // Campos que no se mandan pero se calculan
//         $("#remain").val("0");
//         $("#startH").val("10:00 PM");
//         $("#eventHours").simpleSlider("setValue", 1);
//         $("#eventHours").val(1);

//       // Remover la clase error
//         $(".has-error").removeClass('has-error');      
//       // End limpiar campos ------------------------

//       });

//   }

  // var uuidJson = 0;

  // function getNewDatad(){

  //   $.get('aqui var ir nuetro httpd://' + 
  //     3 +
  //     '/'+ currentPeriod,               

  //     function(data){

  //         //data = JSON.parse( data );

  //       uuidExternal = data.uuid;


  //       if ( uuidJson != uuidExternal ) {

  //         waitOnCalendarLoad(false);
  //         uuidJson = uuidExternal;

  //         if ( uuidExternal === undefined ) {

  //             // Como no hay eventos ese mes, cambiar el uuid por currentperiod, 
  //             // Asi no queda sin cargarse el calendario(waitOnCalendarLoad) por comparar 2 undefined
  //           uuidJson = currentPeriod; 

  //         }else{

  //             // Get reservations with client data
  //           $.get('aqui var nuestro direccion https/ssf' + currentPeriod + '/?e_salon=si57',
  //             function( jsonFull ){
  //               refreshWithNewData( myCalendar, jsonFull.events );
  //               colourByStatus();
  //             })

  //         }

  //       }

  //     })

  // }


  loadBySection();



</script>






