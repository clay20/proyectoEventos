 <!--  -->
<div class="wrapper">
 
  <div class="content-wrapper">

    <!-- Content Header (Pa  ge header) -->
    <section class="content-header " >

      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Eventos</h1>
          </div>
          <div class="col-sm-6 d-flex">
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
              <div id="mini-clndr" class="col-12 ">
                <div class="clndr ">  
                  <div class="col-8">


                    <div class="days-container">
                      <div class="days">
                        <div class="headers">
                        </div>
                         
                         </div>

                     </div>
                   </div>

                   <div class="col-4" id="listevents " style="background: yellow;">
                    <div class="event-listing hidden-xs">
                      <div class="event-listing-title text-center text-yellow">Eventos programados</div>
                        
                    </div>
                  </div>

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
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  
</div>
<!-- ./wrapper -->

<div class="modal modal-primary" id="modalAddEvent" aria-hidden="true"  >
  <div class="modal-dialog" >
    <div class="modal-content" style="background:lightskyblue;">
      <div class="modal-header" style="background:orange;">
        <div class="container">
          <div class="row">
       
          <h5 class="modal-title">Agregar un evento para el dia <span id="titleModalDay">2023-08-12</span></h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span  aria-hidden="true">×</span></button>
        </div>
        </div>
      </div>
      <div class="modal-body">
      
        <section>          
        <div class="row">
          <label>Nombre del evento</label>
          <input type="text" class="form-control mandatory-field" id="eventName" required="required" placeholder="Ej. XV de Rubi, Cena Graduación Escuela X Gen 2017-200, ...">
        </div>      
        </section>        
        <br>

        <section class="row">
          
          <div class="col-md-6">
            <label class="row">Persona que contrata el evento</label>
            <input type="text" class="row form-control mandatory-field" id="userName" required="required" placeholder="Ej. Lic. Arnulfo Levenstein">
          </div>

          <div class="col-md-6">        
            <div class="row">
              <span class="col-md-2 input-group-addon"><i class="fa fa-phone"></i></span>
              <input type="tel" id="tel" class="col-md-10 form-control form-control-sm " required="required" placeholder="Teléfono">
            </div>          

            <div class="row">
              <span class="col-md-2 input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="text" id="email" class="col-md-10 form-control form-control-sm" required="required" placeholder="Email">
            </div>
          </div>
          
        </section>

        <hr>
    <section class="row">
  

        <section class="col-md-6 " style=";padding:10px">          
        
        <div class=" row">
          <div class="col-md-12">
            Horas contratadas: <span id="numberHrs">1</span>
          </div>
          <div class="col-md-12">

            <div class="slider" id="eventHours-slider" style="position: relative; user-select: none; box-sizing: border-box; min-height: 16px; margin-left: 8px; margin-right: 8px;"><div class="track" style="position: absolute; top: 50%; user-select: none; cursor: pointer; width: 100%; margin-top: -2px;"></div><div class="dragger" style="position: absolute; top: 50%; user-select: none; cursor: pointer; margin-top: -8px; margin-left: -8px; left: 0px;"></div></div><input id="eventHours" type="text" value="1" data-slider="true" data-slider-range="1,12" data-slider-step="1" data-slider-snap="true" style="display: none;">
          </div>
        </div>

        <div class="form-group col-md-12 row">
          <div class="col-md-5 ">Hra incio</div>
          <div class="col-md-7">
            <input type="text" class="form-control form-control-sm " id="startH" value="10:00 PM" autocomplete="off">
          </div>
        </div>

        <div class="form-group col-md-12 row">
          <div class="col-md-5">Hra fin</div>
          <div class="col-md-7">
            <input type="text" class="form-control form-control-sm" id="endH" value="11:00 PM" title="Desliza a la derecha las horas contratadas" disabled="">
            <label class="label label-danger" id="alert-another-event" style="display: none;">Otro evento se realiza a esta hora</label>
          </div>
        </div>
        </section>
        
        <section class="col-md-6 row " style=";padding:10px">
        
        
         <div class="row" >
              <div class="col-4" >Adelanto</div>
              <div class="col-1 "> <span class="input-group-addon">Bs</span> </div>
              <div class="col-6 ">  <input id="payment" type="tel" class="form-control form-control-sm text-right"  style="text-align: right;"> </div>
              <div class="col-1 ">  <div class="input-group-addon">.00</div></div>
        </div> 
         <div class="row">
              <div class="col-4" >Resto</div>
              <div class="col-1 "> <span class="input-group-addon">Bs</span> </div>
              <div class="col-6 ">  <input id="remain" type="tel" class="form-control form-control-sm text-right" disabled="disabled" style="text-align: right;"> </div>
              <div class="col-1 ">  <div class="input-group-addon">.00</div></div>
        </div> 
          <div class="row">
              <div class="col-4" >Tota</div>
              <div class="col-1 "> <span class="input-group-addon">Bs</span> </div>
              <div class="col-6 ">  <input id="total" type="tel" class="form-control form-control-sm text-right" disabled="disabled" style="text-align: right;"> </div>
              <div class="col-1 ">  <div class="input-group-addon d-flex justify-content-start" >.00</div></div>
   
        </div>  
        </section>
        </section>
        <div class="clearfix"></div>        

      </div>
      <div class="modal-footer d-flex justify-content-around bgt.acent" >
        <button type="button" class="btn btn-outline " data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-outline" id="addCalendarEvt" onclick="addCalendarEvt( &quot;2023-08-12&quot;)">Agregar evento</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<div class="modal modal-default modal-md" id="modalDetailEvent" style="font-weight: lighter;">
  <div class="modal-dialog">
    <div class="box box-solid event-item" id="modalType">
      <div class="box-header with-border">
        <h3 class="">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
          <div id="eventActive" class="text-center" style="font-size: 25px; font-weight: bold;"></div>

        </h3>

        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="row">
        <div class="box-body col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1" id="infoDetail" style="font-size: 1.05em"></div>        
      </div>
      <!-- /.box-body -->
    </div>

    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>



<script>"use strict";</script>
<script src="<?php echo base_url();?>/calendario/res/jquery.js"></script>

<script src="<?php echo base_url();?>/calendario/res/momentjs.lang.js"></script>ss

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
<div class="col-md-8">

  <div class="controls">
    <div class="clndr-previous-button">&lsaquo;</div><div class="month"><%= month %>&nbsp;<%= year %></div>
    <div class="clndr-next-button">&rsaquo;</div>
  </div>

  <div class="days-container">
    <div class="days">
      <div class="headers">
        <% _.each(daysOfTheWeek, function(day) { %><div class="day-header"><%= day %></div><% }); %>
      </div>
        <% _.each(days, function(day) { %><div class="<%= day.classes %>" id="<%= day.id %>"><%= day.day %></div><% }); %>
    </div>
  </div>

</div>

<div class="col-md-4" id="listevents"  style="background:lightskyblue;">
  <div class="event-listing hidden-xs">
    <div class="event-listing-title text-center">Eventos programados</div>
      <% _.each(eventsThisMonth, function(event) { %>
        <div class="event-item col-md-12 box box-primary" id="detailEvent<%= event.id %>">            
          <div class="">
            <div class="event-item-date col-md-4" data-sql-date="<%= event.date %>" data-sql-date-start-pay="<%= event.firstPay %>" data-status="<%= event.paystatus %>" ><%= event.dateFormat %></div>
            <div class="event-item-name col-md-8"> 
              <a role="button" data-toggle="collapse" href="#<%= event.date %>" aria-expanded="false" aria-controls="collapseExample" class="deTitle"> <%= event.title %>&nbsp;<i class="fa fa-caret-down pull-right"></i></a>              
            </div>
          </div>

          <div class="collapse col-md-12" id="<%= event.date %>" style="font-weight: 100">
            <div class="col-sm-12">
              <br>
              <div> <i class="fa fa-user"> </i> <%= event.personname %> </div>
                
              <div> <i class="fa fa-envelope"></i> <%= event.email %> </div>

              <div> <i class="fa fa-phone"></i> <%= event.tel %> </div>
                
              <br>
              <div class="row">
                <div class="deHours">
                  <div class="col-xs-7">
                    <i class="fa fa-clock-o"></i> 
                    Horas Contratadas: 
                  </div>
                  <div class="col-xs-5 text-right"> <span><%= event.eventHours %></span> h.</div>
                </div>

                <div class="deHIni"> 
                  <div class="col-xs-7">
                    <i class="fa fa-hourglass-start"></i> Hora de inicio: 
                  </div>
                  <div class="col-xs-5 text-right"> <span><%= event.startH %></span> </div>
                </div>
                  
                <div class="deHFin"> 
                  <div class="col-xs-7">
                    <i class="fa fa-hourglass-end"></i> Hora fin: 
                  </div>
                  <div class="col-xs-5 text-right"> <span><%= event.endH %></span> </div>
                </div>
              </div>

              <br>
              <div class="row"> 
                <div class="deTotal">
                  <div class="col-xs-7"> 
                    <i class="fa fa-money"></i> Total a pagar: 
                  </div>
                  <div class="col-xs-5 text-right">$ <span><%= event.totalFormat %></span> </div> 
                </div>
                
                <div class="dePay">
                  <div class="col-xs-7">                 
                    <i class="fa fa-money"></i> Pagado: 
                  </div>
                  <div class="col-xs-5 text-right">$ <span><%= event.paymentFormat %></span> </div> 
                </div>
              
                <div class="deSaldo">
                  <div class="col-xs-7">                                   
                    <i class="fa fa-money"></i> Resto: 
                  </div>
                  <div class="col-xs-5 text-right">$ <span><%= event.restFormat %></span> </div> 
                </div>
              </div>
                
              <div>&nbsp;</div>

              <div class="row">
                
                <div class="col-xs-12">
                  <a href="/salon/eventlist/<%= event.id %>" class="btn btn-default btn-sm col-xs-12">
                   <i class="fa fa-eye"></i> Estado de Cuenta 
                  </a>
                </div>
              </div>

            </div>
          </div>

        </div>
      <% }); %>
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


// Calcula la hora fin en caso de cambiar las horas contratadas
$("#eventHours").bind("slider:changed", function (event, data) {
  // The currently selected value of the slider
  $("#numberHrs").text(data.value);

  startH = $("#startH").val();
  changeEndHour( startH, data.value );

  // The value as a ratio of the slider (between 0 and 1)
/*  alert(data.ratio);*/
});


$("#startH").timepicker({ 'timeFormat': 'h:i A', 'step': 60, 'minTime': '07:00am', 'maxTime': '11:00pm', 'disableTextInput': true });


// Calcula la hora fin en caso de cambiar la hora
$("#startH").change(function(){ 

  startH = $(this).val();
  numberHrs = $("#eventHours").val();

  changeEndHour( startH, numberHrs );


});



$("#dateNewPay").datepicker({
  format:'dd-M-yyyy', 
  language: 'es',
  autoclose:true, 
  todayHighlight: false,
  endDate:"+0d", /*No se puede pagar 1 dia despues del evento, se tiene que liquidar antes*/
  startDate: "05-05-2017", // Esto se setea despues con cada click de "Agregar Pago"
  weekStart: 1
});
  
$("#dateNewPay").datepicker('update', Date());
/*En Calendario interno*/

$('#dateNewPay').datepicker()
    .on('changeDate', function(e) {

      console.log(e);

    });

$("#total, #payment, #remain").inputmask({ alias: "currency", digits: 0, prefix: '', allowMinus: false });

$("#totalBefore, #payBefore, #saldoBefore, #newPay, #newSaldo").inputmask({ alias: "currency", digits: 0, prefix: ''});

$("#tel").inputmask({"mask": "(999) 999-9999", "clearIncomplete": true});
$("#email").inputmask("email", { "clearIncomplete": true });

$("#total, #payment").on('input', function(){
  
  //total =  $("#total").val().replace(/,/g, "");
  //payment = $("#payment").val().replace(/,/g, "");

  total =  $("#total").inputmask('unmaskedvalue');
  payment = $("#payment").inputmask('unmaskedvalue');

  remain = parseInt( total ) - (parseInt( payment ) || 0);

  // Que no se pase del resto por pagar
  if ( remain < 0 ) {  
    $("#payment").val( total );    
    remain = 0;
  }


  $("#remain").val( remain );

});


// Colores de los dias del calendario
colourByStatus();

$("#salonSelect").custom_select({
  'name': 'e_salon', 
  'options': {"ea38":"Flamingos A","si57":"Flamingos B","bs95":"Flamingos C"},
  'selected': "si57"
});
$("#e_salon").on('change',function(){ 
   document.location = document.location.pathname+'?e_salon='+$(this).val()
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

  $("#addCalendarEvt")
    .removeAttr('onclick')
    .attr('onclick', 'addCalendarEvt( "' + clickedDay + '")');

  $("#modalAddEvent").modal({backdrop:"static"});

}


function addCalendarEvt( clickedDay ){

  if ( !passValidation() ) {
    return 0;
  }

/*  console.log( clickedDay );*/


  fieldsToGetVal = ['eventName', 'userName', 'tel', 'email', 'eventHours', 'startH', 'total', 'payment'];
  var ivtosend = '';

  for (i = 0; i < fieldsToGetVal.length; i++) {

    fieldToSend = fieldsToGetVal[i];
    valueToSend = $("#"+fieldToSend).val();

    ivtosend += '"' + fieldToSend + '":"' + valueToSend + '",';

  }

  // Agregar lo que falta
  ivtosend += '"day":"' + clickedDay + '"';
  ivtosend = '{' + ivtosend + '}';

  var objson = JSON.parse(ivtosend);

  $.post( 
    'aqui var ir nuestro direccion' + 
    3 + 
    '/'+ currentPeriod, 
     objson ,
    function( data ){
      
      console.log(data);
      $("#modalAddEvent .modal-header .close").click();

      // Limpiar campos ---------------------------
      for (i = 0; i < fieldsToGetVal.length; i++) {
        fieldToSend = fieldsToGetVal[i];
        $("#"+fieldToSend).val("");
      }
      // Campos que no se mandan pero se calculan
      $("#remain").val("0");
      $("#startH").val("10:00 PM");
      $("#eventHours").simpleSlider("setValue", 1);
      $("#eventHours").val(1);

      // Remover la clase error
      $(".has-error").removeClass('has-error');      
      // End limpiar campos ------------------------

    });
  
}

var uuidJson = 0;

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

              // Get reservations with client data
              $.get('aqui var nuestro direccion https/ssf' + currentPeriod + '/?e_salon=si57',
                  function( jsonFull ){
                    refreshWithNewData( myCalendar, jsonFull.events );
                    colourByStatus();
                  })

            }

          }

    })

}


loadBySection();



</script>






