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
    <div class="modal-dialog modal-lg " >
      <div class="modal-content">
        <div class="modal-header  p-2 m-0  bgt-acent" >
          <div class="container">
           <div class="row">

            <h5 class="modal-title ">Agregar un evento para el dia <span id="titleModalDay">2023-08-12</span></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span  aria-hidden="true">×</span></button>


          </div>
        </div>
      </div>




      <div class="modal-body mx-1 p-1 bgt-secondary">
        <section class="row p-1" >
          <div class="col-sm-12 col-lg-4" >
            <section class="row">


              <div class="col-12">
                <div class="myBox">

                  <input  class="myImputField" type="text" class="form-control" placeholder="Ej.Cena Graduación Compromiso Matrimodio..." autofocus autocomplete="off">
                  <label class="mylabel">Nombre del evento</label>
                </div>
              </div>  


              <label>Capacidad</label>
              <div class="col-12">
                <div class="row ">

                 <div class="col-12">

                   MIN<input type="text" name="" value="100" disabled style="width: 40px;">
                   MAX <input type="text" name="" value="400" disabled style="width: 40px;">
                 </div>
                 <div class="col-12">
                   
                   Nro Invitado<input type="text" name="" value="" style="width: 40px;">
                 </div>
                 <div>

                   Horas contratadas: <span id="numberHrs">1</span>
                   <div>


                     <label>  Hra ini</label><input type="text" id="startH" value="10:00 PM" style="width:100px" >
                   </div>
                   <div>

                     <label>Hra Fin</label> <input type="text" value="11:00 PM" disabled="" style="width:100px">
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


                <input type="text" class="myImputField" required placeholder="" list="listaCliente"> 
                <label class="mylabel">Persona que contrata el evento</label>
              </div>

              <datalist id="listaCliente">
                <option>pedro appleesdf sdfsfs  uno</option>
                <option>Mario Esfsdf Rfsfdsdf uno</option>
                <option>Clinte sdfsdfsfds  uno</option>

              </datalist>
            </div>
            <div class="col-1 d-flex justify-content-center align-items-center" >
              <button class="btnt-primary btn-sm" title="Nuevo Cliente"><i class="fa-solid fa-square-plus d-flex justify-content-center"></i></button>
            </div>
          </div>
          <div class="col-12 d-flex">

            <div class="col-11">
              <div class="myBox">


                <input type="text" class="myImputField" required placeholder="" list="listaServicio"> 
                <label class="mylabel">Buscar Servicio</label>
              </div>

              <datalist id="listaServicio">
                <option>Servicio 1</option>
                <option>Servicio 1</option>
                <option>Servicio 1</option>


              </datalist>
            </div>
            <div class="col-1 d-flex justify-content-center align-items-center" >
              <button class="btnt-primary btn-sm" title="Nuevo Cliente"><i class="fa-solid fa-square d-flex justify-content-center"></i></button>
            </div>
          </div>
       
       <table class="p-1" rules="rows">
        <thead class="table-dark">
          <tr>
            <th>Nombre servicio</th>
            <th>cantidas</th>
            <th>Precio/uni bs</th>
            <th>subTotal bs</th>
            <th>Descuentos bs</th>
          

          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Salon</td>
            <td><input class=""   type="number" name="" style="width:40px ;height: 20px;" value="1"></td>
            <td>2000</td>
            <td>2000</td>
            <td><input class=""   type="number" name="" style="width:40px ;height: 20px;" value="10"></td>

            <td><button class="btn btn-sm text-danger btnt-primary">-</button></td>

          </tr>
           <tr>
            <td>Salon</td>
            <td><input class=""   type="number" name="" style="width:40px ;height: 20px;" value="1"></td>
            <td>2000</td>
            <td>2000</td>
            <td><input class=""   type="number" name="" style="width:40px ;height: 20px;" value="10"></td>

            <td><button class="btn btn-sm text-danger btnt-primary">-</button></td>

          </tr> <tr>
            <td>Salon</td>
            <td><input class=""   type="number" name="" style="width:40px ;height: 20px;" value="1"></td>
            <td>2000</td>
            <td>2000</td>
            <td><input class=""   type="number" name="" style="width:40px ;height: 20px;" value="10"></td>

            <td><button class="btn btn-sm text-danger btnt-primary">-</button></td>

          </tr> 
          <tr>
            <td>Salon</td>
            <td><input class=""   type="number" name="" style="width:40px ;height: 20px;" value="1"></td>
            <td>2000</td>
            <td>2000</td>
            <td><input class=""   type="number" name="" style="width:40px ;height: 20px;" value="10"></td>

            <td><button class="btn btn-sm text-danger btnt-primary">-</button></td>

          </tr><tr>
            <td>Salon</td>
            <td><input class=""   type="number" name="" style="width:40px ;height: 20px;" value="1"></td>
            <td>2000</td>
            <td>2000</td>
            <td><input class=""   type="number" name="" style="width:40px ;height: 20px;" value="10"></td>

            <td><button class="btn btn-sm text-danger btnt-primary">-</button></td>

          </tr><tr>
            <td>Salon</td>
            <td><input class=""   type="number" name="" style="width:40px ;height: 20px;" value="1"></td>
            <td>2000</td>
            <td>2000</td>
            <td><input class=""   type="number" name="" style="width:40px ;height: 20px;" value="10"></td>

            <td><button class="btn btn-sm text-danger btnt-primary">-</button></td>

          </tr><tr>
            <td>Salon</td>
            <td><input class=""   type="number" name="" style="width:40px ;height: 20px;" value="1"></td>
            <td>2000</td>
            <td>2000</td>
            <td><input class=""   type="number" name="" style="width:40px ;height: 20px;" value="10"></td>

            <td><button class="btn btn-sm text-danger btnt-primary">-</button></td>

          </tr><tr>
            <td>Salon</td>
            <td><input class=""   type="number" name="" style="width:40px ;height: 20px;" value="1"></td>
            <td>2000</td>
            <td>2000</td>
            <td><input class=""   type="number" name="" style="width:40px ;height: 20px;" value="10"></td>

            <td><button class="btn btn-sm text-danger btnt-primary">-</button></td>

          </tr>

         
          

        </tbody>
        <tfoot class="table-dark">
         <tr>
          <th colspan ="3"><small>Total general</small> </th>

            <td>3000 Bs</td>
              <th></th>

            </tr>
            <tr>
              <td colspan ="3"><small>Monto adelantado</small> </td>

                <th>1000 Bs</th>
                  <th></th>

                </tr>
                <tr>
                  <th colspan ="3"><small>Saldo a pagar</small> </th>

                    <th>2000 Bs</th>
                      <th></th>

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






