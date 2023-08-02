
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  reservarsalon = ['UA', '114663401', '1' ];
  gtag('config', reservarsalon.join("-"));
</script>

<script id="calendar-template" type="text/template">  
<div class="col-md-8">

  <div class="controls">
    <div class="clndr-previous-button">&lsaquo;</div><div class="month"><%= month %>&nbsp;<%= year %></div><div class="clndr-next-button">&rsaquo;</div>
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

<div class="col-md-4" id="listevents">
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

</script>


<script>
  
var myCalendar;
var currentPeriod = 202507;
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


/*Calendario Interno del Popup de Pago Adicional*/
$.fn.datepicker.dates['es'] = {
    days: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"],
    daysShort: ["Dom", "Lun", "Mar", "Mier", "Jue", "Vie", "Sab"],
    daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
    months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "OCtubre", "Noviembre", "Diciembre"],
    monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
    today: "Hoy",
    clear: "Limpiar",
    format: "mm/dd/yyyy",
    titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
    weekStart: 0
};

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

var enjoyhint_script_steps = [
{
  'none #colors-descr' : 'Descripción de los colores: <br>Verde: Evento pagado al 100% <br> Azul: Evento pagado parcialmente <br> Naranja: Evento sin pago alguno',
  'showSkip': false,
  'showNext': true,
  'nextButton' : {className: 'btn-success', text: 'Siguiente'}
},
{
  'click .days-container' : 'Da click en un día disponible. (Cada 24 h. se eliminan los eventos en la cuenta DEMO)',
  'showSkip': false,
},
{
  'none #eventName' : 'Coloca el nombre del evento',
  'showSkip': false,
  'showNext': true,
  'nextButton' : {className: 'btn-success', text: 'Siguiente'}
},
  {
    'none #userName' : 'Nombre de la persona que contrata el servicio',
    'showSkip': false,
    'showNext': true,
    'nextButton' : {className: '', text: 'Siguiente'},
  },
  {
    'none #tel' : 'Teléfono del cliente',
    'showSkip': false,
    'showNext': true,
    'nextButton' : {className: '', text: 'Siguiente'},    
  },
  {
    'none #email': 'Email del cliente',
    'showSkip': false,
    'showNext': true,
    'nextButton' : {className: '', text: 'Siguiente'},
  },
  {
    'none #startH': 'Selecciona la hora de inicio del Evento',
    'showSkip': false,
    'showNext': true,
    'nextButton' : {className: '', text: 'Siguiente'},
  },
  {
    'none #eventHours-slider' : 'Desliza para seleccionar las horas contratadas',
    'showSkip': false,
    'showNext': true,
    'nextButton' : {className: '', text: 'Siguiente'},    

  },
  {
    'none #total': 'Coloca el monto total por reservar el salón',
    'showSkip': false,
    'showNext': true,
    'nextButton' : {className: '', text: 'Siguiente'},    

  },
  {
    'none #payment' : 'Si recibiste un adelanto, colócalo aca, si no, dejalo en 0',
    'showSkip': false,
    'showNext': true,
    'nextButton' : {className: '', text: 'Siguiente'},
  },
  {
    'click #addCalendarEvt': 'Agrega tu evento',
    'showSkip': false    
  },    
  {
    'click #listevents': 'Da click en el nombre de tu evento y después en "Estado de cuenta"',    
    'showSkip': false,
    'showNext': true,    
    'nextButton' : {className: '', text: 'Ok'},    
  }
];

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
    'https://demo.reservarsalon.com' + 
    '/calendar/addInternal/' + 
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

  $.get('https://demo.reservarsalon.com' + 
        '/calendar/json/' + 
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
              $.get('https://demo.reservarsalon.com' +
                  '/salon/json/' + currentPeriod + '/?e_salon=si57',
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
