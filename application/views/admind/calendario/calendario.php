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

        </section>

      </div>
  </div>

    <div class="modal modal-primary" id="modalAddEvent" aria-hidden="true"  >
      <div class="modal-dialog modal-xl" >
        <div class="modal-content" style="background:rgba(251, 214, 169, .9);">
          <div class="modal-header  p-2 m-0  bgt-primary" >
            <div class="container">
             <div class="row">

              <div class="col-11  d-flex justify-content-start align-items-center">
                <h5 class="modal-title ">Agregar un evento para el dia <span id="titleModalDay">2023-08-12</span> </h5>
              </div>
              <div class="col-1 d-flex justify-content-end align-items-center m-0 p-0">
               <button type="button" class="btn " data-dismiss="modal" aria-label="Close"><span  aria-hidden="true"><i class="fa-solid fa-x fa-lg t-light" style="color:red"></i></span></button>
             </div>

             <input type="hidden" name="fecha" id="fecha" >
           </div>
         </div>
       </div>
  

       <div class="modal-body mx-1 p-1 fgt-secondary">
        <section class="row p-0" >
          <div class="col-sm-12 col-lg-4" >
           <section class="row" style="background:rgba(251, 214, 169, .4);">
            <!-- Sección para el nombre del evento -->
            <div class="col-12" >
              <div class="myBox">
                <input class="myImputField form-control form-control-sm" id="nombreEvento" list="listaEventos" type="text" placeholder="Ej.Cena Graduación Compromiso Matrimonio..." autofocus autocomplete="off" onkeypress="return soloLetrasEspacio(event)">
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
            <div class="col-xl-12 col-lg-12  col-md-6  col-sm-12 col-12 d-flex">
              <div class=" col-8">    <label >Capacidad del salon:</label>
              </div>
              <div class="col-4">
               <input type="text" name="" value="400" disabled style="width: 40px; height: 25px;">
               <input type="hidden" name="" id="maxCapacidad" value="400" >

               <label><i class="fa-solid fa-person "></i></label> 
             </div>

             <div class="row">
              <div class="">
                <label>
                </label><input  type="hidden" id="nroInvitados" name="nroInvitados" onkeypress="return soloNumero(event)" maxlength="3" minlength="1"   value="20" style="width: 40px; height: 25px;" required onchange="cantidadInvitados()">
              </div>
            </div>
          </div>
          <div class="col-xl-12 col-lg-12  col-md-6  col-sm-12 col-12 d-flex">
            <div class="col-8">
              <label>  Dias del Evento:</label>
            </div>
            <div class="col-4">
              <input type="text" name="" maxlength="1" id="txtDia" onkeypress="return soloNumero(event)"  value="1" required placeholder="dias" onchange="agregarBloques() "style="width: 40px; height:25px"> 

              <i class="fa-solid fa-calendar-day"></i>
            </div> 
          </div>

          <div class="col-12 p-0 " id="contenedorBloques" style="background: rgba(255, 255, 255, .4);">
            <!-- muy impirta aqui se esta cargado lo ide de campos -->
          </div>

          <hr class="bgt-primary " style="
          height: 2px;
          ">
        </section>

      </div>
      <div class="col-sm-12 col-lg-8 p-1">
        <div class="col-12 d-flex ">

          <div class="col-11">
            <div class="myBox">

              <input type="hidden" id="txtId" name="idCliente">
              <input type="text" class="myImputField" id="nombreCliente" required placeholder="" list="listaCliente" onchange="seleccionCliente(this)" autocomplete="off" onkeypress="return soloLetrasEspacio(event)"> 
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


              <input type="text" class="myImputField" id="txtBuscaeServicio" required placeholder="" list="listaServicio"  onautocomplete="off" onchange="seleccionarServicio(this)" onkeypress="return soloLetrasEspacio(event)"> 
              <label class="mylabel" >Buscar Servicio</label>
            </div>

            <datalist id="listaServicio">

            </datalist>
          </div>
          <div class="col-1 d-flex justify-content-center align-items-center" >
            <button class="btnt-primary btn-sm" disabled ><i class="fa-solid fa-magnifying-glass fa-sm"></i></button>
          </div>
        </div >

        <div class="row p-1" style="overflow-x:auto; min-width:50px">

          <table class="p-1" rules="all" width="100%" id="detalleServicio">
            <thead class="bgt-primary">
              <tr>
                <th style="text-align: center; min-width: 150px; width: auto;"><small>Nombre Servicio</small></th>
                <th style="text-align: center; min-width: 100px;"><small>dia/Cant</small></th>
                <th style="text-align: center;  min-width: 50px;"><small>PU(Bs)</small></th>
                <th style="text-align: center; min-width: 110px;"><small>inporte(Bs)</small></th>
                <th style="text-align: center;  min-width: 120px;"><small>Descuento(Bs)</small></th>
                <th style="width:7px"></th>
              </tr>
            </thead>
            <tbody id="servicioDetalle" class="servicioDetalle">

            </tbody>
            <tfoot class="bgt-primary">
             <tr>
              <td colspan="3"><small>Total</small></td>
              <td style="text-align:right;"><input type="text"  id="total" class="" name=""   style="width:80px; height: 20px; font: 10px; text-align: right; background: #CBDFFF;" readonly>bs.</td>
              <td style="text-align:right;"><input type="text"  id="descuento" class="" name=""   style="width:80px; height: 20px; font: 10px; text-align: right; background: #CBDFFF;" readonly>bs.</td>
            </tr>
            <tr>
              <td colspan="3"><small>Total a Pagar</small></td>
              <td style="text-align:right;"><input type="text"  id="totalPagar" class="" name=""   style="width:80px; height: 20px; font: 10px; text-align: right; background: #CBDFFF;" readonly>bs.</td>

            </tr>
            <tr>
              <td colspan="3"><small>Monto adelantado</small></td>
              <td style="text-align:right;"><input type="text"  id="montoAdelantado" onkeypress="return soloNumero(event)"  class="" name=""  value="0.00"  style="width:80px; height: 20px; font: 10px; text-align: right;">bs.</td>
            </tr>
            <tr>
              <th colspan="3"><small>Saldo a pagar</small></th>
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
  <button type="button" class=" btn btn-md btnt-primary" id="btnGuardar" > <i class="fa-solid fa-floppy-disk text-success"></i> Agregar</button>
  <button type="button" class=" btn btn-md btnt-primary " data-dismiss="modal"> <i class="fa-solid fa-xmark text-warning"></i>Cancelar</button>
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

  <div class="modal fade" id="detalleEvento" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header p-2 bgt-acent">


         <div class="container">
           <div class="row">

            <h5 class="modal-title ">Nombre Cliente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span  aria-hidden="true">×</span></button>


          </div>
        </div>
      </div>
      <div class="modal-body bgt-secondary">

        <!-- Post -->        

        <div class="row">

          <div class=" col-md-12 ">
            <label class="mylabel" for=""> Servicio reservados para este dia</label>
            <table border="1" rules="all" width="100%"> 
              <thead class="bgt-primary">
                <tr>
                  <th>Servicio </th>
                  <th>canti </th>
                  <th>Precio Total </th>
                  <th>Incio</th>
                  <th>Fin</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Servicio q</td>
                  <td>200</td>
                  <td>234</td>
                  <td>00:00</td>
                  <td>08:00</td>
                </tr>
                  <tr>
                  <td>Servicio q</td>
                  <td>200</td>
                  <td>234</td>
                  <td>00:00</td>
                  <td>08:00</td>
                </tr>  <tr>
                  <td>Servicio q</td>
                  <td>200</td>
                  <td>234</td>
                  <td>00:00</td>
                  <td>08:00</td>
                </tr>  <tr>
                  <td>Servicio q</td>
                  <td>200</td>
                  <td>234</td>
                  <td>00:00</td>
                  <td>08:00</td>
                </tr>  <tr>
                  <td>Servicio q</td>
                  <td>200</td>
                  <td>234</td>
                  <td>00:00</td>
                  <td>08:00</td>
                </tr>
              </tbody>


            </table>
           <div class="myBox">

  

          </div>
        </div>
      
   

  </div>





</div>

<div class="modal-footer d-flex justify-content-around p-1 bgt-acent">
 <label>Nombre Cliente</label>
</div>
</div>
</div>
</div>




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
  var fechasAColor = ['2023-10-20','2023-10-30'];
  var estado=[0,1,2]
$(document).ready(function() {
      cargarFechasDesdeBaseDeDatos();
});
  function cargarFechasDesdeBaseDeDatos() {
    $.ajax({
    url: '../reservas/listaFechasReservar', // Reemplaza con la URL de tu servidor
    method: 'POST',
    dataType: 'json',
    success: function (response) {
      // Manejar los datos recibidos, asumiendo que data es un array de fechas
      // aplicarEstilosAFechasDesdeBaseDeDatos(data);
      // let fechas = JSON.parse(response);
      response.forEach(function(objeto) {
       
        fechasAColor.push(objeto.fecha);
        estado.push(objeto.estado);

      });

    },

  });
  }


  function cargarPorSeccion(){

  moment.locale('es'); /*Lang*/

    var aux;

    function aplicarEstilosAFechas() {
   
      var i=0;
      fechasAColor.forEach(function (fecha) {
        var currentCell = $('#mini-clndr .calendar-day-' + fecha);
        currentCell.addClass('colored-date has-event');
      
        if(estado[i]==0){
            currentCell.css({
        'background-color': '#ffaaaa',
        'color': '#000', 
      });
        }
        else if(estado[i]==1){
            currentCell.css({
        'background-color': '#ffa222',
        'color': '#000', 
      });
        }
          else if(estado[i]==2){
            currentCell.css({
        'background-color': '#f11122',
        'color': '#000', 
      });
        }  else if(estado[i]==2){
            currentCell.css({
        'background-color': '#33a222',
        'color': '#000', 
      });
        }
        else
        {
               currentCell.css({
        'background-color': '#aaa222',
        'color': '#000', 
      });
        }
        i=i+1;
      
      });
    }



    myCalendar = $('#mini-clndr').clndr({

      daysOfTheWeek: ['Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa', 'Do'],
      template  :    $('#calendar-template').html(),
      events    :    eventsArray,

      ready     :    function(){ 
   aplicarEstilosAFechas();
  
    },  

    clickEvents: {

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

          }else
          {
            toastr.info("La fecha seleccionada debe estar dentro de este mes.");
          }
        }

      },
      onMonthChange: function(month) {
        // waitOnCalendarLoad(true);
        currentPeriod =  month.format('YYYYMM');
        aplicarEstilosAFechas();
      }

    }

  });






//     var enjoyhint_instance = new EnjoyHint({});



// // https://github.com/xbsoftware/enjoyhint
//     enjoyhint_instance.set(enjoyhint_script_steps);
//     enjoyhint_instance.run();

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

  // Agregar lo que falta
    // ivtosend += '"day":"' + clickedDay + '"';
    // ivtosend = '{' + ivtosend + '}';

    // var objson = JSON.parse(ivtosend);

    // $.post( 
    //   'aqui var ir nuestro direccion' + 
    //   3 + 
    //   '/'+ currentPeriod, 
    //   objson ,
    //   function( data ){

    //     console.log(data);
    //     $("#modalAddEvent .modal-header .close").click();

    //   // Limpiar campos ---------------------------
    //     for (i = 0; i < fieldsToGetVal.length; i++) {
    //       fieldToSend = fieldsToGetVal[i];
    //       $("#"+fieldToSend).val("");
    //     }
    //   // Campos que no se mandan pero se calculan
    //     $("#remain").val("0");
    //     $("#startH").val("10:00 PM");
    //     $("#eventHours").simpleSlider("setValue", 1);
    //     $("#eventHours").val(1);

    //   // Remover la clase error
    //     $(".has-error").removeClass('has-error');      
    //   // End limpiar campos ------------------------

    //   });

  

  // var uuidJson = 0;

  function getNewData(){

    $.get('aqui var ir nuetro httpd://' + 
      3 +
      '/'+ currentPeriod,               

      function(data){

          //data = JSON.parse( data );

        uuidExternal = data.uuid;


        if ( uuidJson != uuidExternal ) {

          waitOnCalendarLoad(false);
          uuidJson = uuidExternal;

          if ( uuidExternal === undefined ) {

              // Como no hay eventos ese mes, cambiar el uuid por currentperiod, 
              // Asi no queda sin cargarse el calendario(waitOnCalendarLoad) por comparar 2 undefined
            uuidJson = currentPeriod; 

          }else{

           
                refreshWithNewData( myCalendar, jsonFull.events );
                colourByStatus();
           

          }

        }

      })

  }


// loadBySection();
  cargarPorSeccion();

</script>






