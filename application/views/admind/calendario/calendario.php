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
    <div class="modal-dialog modal-xl" >
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
<script type="text/javascript">
 
   

</script>



     <div class="modal-body mx-1 p-1 fgt-secondary">
      <section class="row p-0" >
        <div class="col-sm-12 col-lg-4" >
         <section class="row" style="background:rgba(251, 214, 169, .4);">
          <!-- Sección para el nombre del evento -->
          <div class="col-12" >
            <div class="myBox">
              <input class="myImputField form-control form-control-sm" id="nombreEvento" list="listaEventos" type="text" placeholder="Ej.Cena Graduación Compromiso Matrimonio..." autofocus autocomplete="off">
              <label class="mylabel">Tipo del Evento</label>
            </div>
          </div>
          <datalist id="listaEventos">
            <option>Matrimonio</option>
            <option>15 años</option>
            <option>Graduaciones</option>
            <option>Bautizos</option>
            <option>Cumpleaños</option>
          </datalist>

          <!-- Secciódn para la capacidad y detalles del evento -->
          <div class="col-12">
            <label >Capacidad del salon:</label>

              <input type="text" name="" value="400" disabled style="width: 40px; height: 25px;">
            <div class="row">
              <div class="col-lg-12 col-md-8 col-6">
       
                Invitados:<input  type="text" id="nroInvitados" name="nroInvitados" onkeypress="return soloNumero(event)" maxlength="3" minlength="1"   value="20" style="width: 40px; height: 25px;" required onchange="cantidadInvitados()">
              </div>



            </div>
           
         

       </div>
        <div class="col-12">
              Dias del Eevento:<input type="text" name="" maxlength="1" id="txtDia" value="1" required placeholder="dias" onchange="cargarFechasConsecutivas() ;agregarBloques() "style="width: 40px; height:25px">dias
        </div>
         
          <div class="row" id="contenedorBloques">
            <!-- muy impirta aqui se esta cargado lo ide de campos -->
          </div>

  
     </section>

   </div>
   <div class="col-sm-12 col-lg-8 p-1">
    <div class="col-12 d-flex ">

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
      <div class="col-4">
        <div class="myBox">

          <input class="myImputField" type="date" name="" id="fechaFin" readonly>
          <label class="mylabel">Fin del  Evento</label>
          <label class="mylabel-icon"><i class="fa-regular fa-calendar-days"></i></label>

        </div>
      </div>
      <div class="col-7">
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
    </div >

<div class="table-responsive">
  
    <table class="p-1" rules="all" width="100%" id="detalleServicio">
      <thead class="bgt-primary">
        <tr>
          <th style="text-align: center;"><small>Nombre Servicio</small></th>
          <th style="text-align: center;"><small>Fecha</small></th>
          <th style="text-align: center;"><small>Cant.</small></th>
          <th style="text-align: center;"><small>Precio(Bs)</small></th>
          <th style="text-align: center;"><small>inporte(Bs)</small></th>
          <th style="text-align: center;"><small>Descuento(Bs)</small></th>
          <th style="width:10px"></th>
        </tr>
      </thead>
      <tbody id="servicioDetalle" class="servicioDetalle">
       <!--  <tr servicioId=0 style="color:#001F3F">
          <td>Salon de Eventos</td>
          <td style="text-align:right; " class="myBox"><select  id="fechaSeleccion" class="fechaSeleccion myImputField"  onchange="seleccionarFila(this)"></select>   </td>

          <td style="text-align:right;"><input type="number" name="" id="cant1" style="width:40px ;height: 20px;" value="1" disabled></td>
          <td style="text-align:right;">3000.00</td>
          <td style="text-align:right;">3000.00</td>
          <td style="text-align:right;" class="myBox"><input type="text"  id="" class="descuentoParcial myImputField" onkeypress="return soloNumero(event)" maxlength="7" class="" name=""  value="0.00"  style=" text-align: right;padding-right: 28px;"><small class="mylabel-icon">bs.</small></td>
          <td><button class="btn btn-sm text-danger p-1" disabled><i class="fa-solid fa-circle-minus fa-lg"></i></button></td>
        </tr> -->
      </tbody>
      <tfoot class="bgt-primary">
       <tr>
        <td colspan="4"><small>Total</small></td>
        <td style="text-align:right;"><input type="text"  id="total" class="" name=""   style="width:80px; height: 20px; font: 10px; text-align: right; background: #CBDFFF;" readonly>bs.</td>
        <td style="text-align:right;"><input type="text"  id="descuento" class="" name=""   style="width:80px; height: 20px; font: 10px; text-align: right; background: #CBDFFF;" readonly>bs.</td>
      </tr>
      <tr>
        <td colspan="4"><small>Total a Pagar</small></td>
        <td style="text-align:right;"><input type="text"  id="totalPagar" class="" name=""   style="width:80px; height: 20px; font: 10px; text-align: right; background: #CBDFFF;" readonly>bs.</td>

      </tr>
      <tr>
        <td colspan="4"><small>Monto adelantado</small></td>
        <td style="text-align:right;"><input type="text"  id="montoAdelantado" onkeypress="return soloNumero(event)"  class="" name=""  value="0.00"  style="width:80px; height: 20px; font: 10px; text-align: right;">bs.</td>
      </tr>
      <tr>
        <th colspan="4"><small>Saldo a pagar</small></th>
        <td style="text-align:right;"><input type="text"  id="saldoPagar" class="" name=""   style="width:80px; height: 20px; font: 10px; text-align: right; background: #CBDFFF;" readonly>bs.</td>
      </tr>
    </tfoot>
  </table>
</div>



</div>
</section>


<!-- <div class="clearfix"></div>         -->

</div>
<div class="modal-footer d-flex justify-content-around p-1 bgt-acent " >
  <button type="button" class="btn-sm btnt-primary" id="btnGuardar" >Agregar</button>
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
  // window.dataLayer = window.dataLayer || [];
  // function gtag(){dataLayer.push(arguments);}
  // gtag('js', new Date());
  // reservarsalon = ['UA', '114663401', '1' ];
  // gtag('config', reservarsalon.join("-"));
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

  function cargarPorSeccion(){

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


// loadBySection();
cargarPorSeccion();

</script>






