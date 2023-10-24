   <!--  -->

<script>"use strict";</script>
<script src="<?php echo base_url();?>/calendario/res/jquery.js"></script>
<script src="<?php echo base_url();?>/calendario/res/momentjs.lang.js"></script>
<script src="<?php echo base_url();?>/calendario/res/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/calendario/res/underscore-min.js"></script>
<script src="<?php echo base_url();?>/calendario/res/clndr.min.js"></script>

   <div class="wrapper" style="background-image: url('<?php echo base_url();?>/img/fondo.jpg');">

    <div class="content-wrapper"   style=" background:rgba(0, 0, 0, .4);">

      <!-- Content Header (Pa  ge header) -->
      <section class="content-header " >

        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="t-primary">Calendario de eventos</h1>
            </div>
            <div class="col-sm-6">
               <ul class="d-flex justify-content-end t-primary" style=" list-style: none; padding: 0; margin: 0;">
                 <li title="Cuando un cliente no reazlizo un monto para recervar"><i class="fa-solid fa-square-full fa-xs pl-2" style="color:#E08402"></i>confirmar</li>
                 <li title="Cuando el cliente delanto un monto de reserva"><i class="fa-solid fa-square-full fa-xs pl-2" style="color:#008800"></i>reservado</li>
                 <li title="Cuando el cliente completo la paga "><i class="fa-solid fa-square-full fa-xs pl-2" style="color:#0D77B6"></i>Pagado</li>
                 <li title="Cuando el cliente reserva pero no completo la paga y ya es cerca al evento "><i class="fa-solid fa-square-full fa-xs pl-2" style="color:#FF0000"></i>Pendiente</li>
          

               </ul>
            </div>
          
            </div>
          </div><!-- /.container-fluid -->

        </section>

        <!-- Main content -->
        <section class="content " >

          <div class="container-fluid">

            <div class="box box-primary no-border">
              <div class="box-body ">
                <!-- THE CALENDAR -->
                <div id="mini-clndr" class="" >
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
  

       <div class="modal-body mx-1 px-2 fgt-secondary">
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

<<<<<<< HEAD
          <div class="col-12 px-1 m-0 " id="contenedorBloques" style="background: rgba(255, 255, 255, .4);">
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
=======
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
>>>>>>> 2ae43ddfc85c8ea6a60451d1774187d7421c2f47
            <div class="myBox">

              <input class="myImputField" type="date" name="" id="fechaFin" readonly>
              <label class="mylabel">Fin del  Evento</label>
              <label class="mylabel-icon"><i class="fa-regular fa-calendar-days"></i></label>

<<<<<<< HEAD
            </div>
          </div>
          <div class="col-7">
            <div class="myBox">


              <input type="text" class="myImputField" id="txtBuscaeServicio" required placeholder="" list="listaServicio"  onautocomplete="off" onchange="seleccionarServicio(this)" onkeypress="return soloLetrasEspacio(event)"> 
              <label class="mylabel" >Buscar Servicio</label>
            </div>

            <datalist id="listaServicio">

=======
              <input type="text" class="myImputField" id="txtBuscaeServicio" required placeholder="" list="listaServicio"  onautocomplete="off" onchange="seleccionarServicio(this)" onkeypress="return soloLetrasEspacio(event)"> 
              <label class="mylabel" >Buscar Servicio</label>
            </div>

            <datalist id="listaServicio">

>>>>>>> 2ae43ddfc85c8ea6a60451d1774187d7421c2f47
            </datalist>
          </div>
          <div class="col-1 d-flex justify-content-center align-items-center" >
            <button class="btnt-primary btn-sm" disabled ><i class="fa-solid fa-magnifying-glass fa-sm"></i></button>
          </div>
        </div >

<<<<<<< HEAD
        <div class="row p-0 mx-1" style="overflow-x:auto; min-width:50px">
=======
        <div class="row p-1" style="overflow-x:auto; min-width:50px">
>>>>>>> 2ae43ddfc85c8ea6a60451d1774187d7421c2f47

          <table class="p-1" rules="all" width="100%" id="detalleServicio">
            <thead class="bgt-primary">
              <tr>
                <th style="text-align: center; min-width: 150px; width: auto;"><small>Nombre Servicio</small></th>
                <th style="text-align: center; min-width: 100px;"><small>dia/Cant</small></th>
                <th style="text-align: center;  min-width: 50px;"><small>PU(Bs)</small></th>
                <th style="text-align: center; min-width: 110px;"><small>inporte(Bs)</small></th>
<<<<<<< HEAD
                <th style="text-align: center;  min-width: 100px;"><small>Descuento(Bs)</small></th>
=======
                <th style="text-align: center;  min-width: 120px;"><small>Descuento(Bs)</small></th>
>>>>>>> 2ae43ddfc85c8ea6a60451d1774187d7421c2f47
                <th style="width:7px"></th>
              </tr>
            </thead>
            <tbody id="servicioDetalle" class="servicioDetalle">

            </tbody>
            <tfoot class="bgt-primary">
             <tr>
              <td colspan="3"><small>Total</small></td>
<<<<<<< HEAD
              <td style="text-align:right;"><input type="text"  id="total" class="" name=""   style="width:80px; height: 20px; font: 10px; text-align: right; background: #CBDFFF;" readonly><small>bs.</small></td>
              <td style="text-align:right;"><input type="text"  id="descuento" class="" name=""   style="width:80px; height: 20px; font: 10px; text-align: right; background: #CBDFFF;" readonly><small>bs.</small></td>
            
            </tr>
            <tr>
              <td colspan="3"><small>Total a Pagar</small></td>
              <td style="text-align:right;"><input type="text"  id="totalPagar" class="" name=""   style="width:80px; height: 20px; font: 10px; text-align: right; background: #CBDFFF;" readonly><small>bs.</small></td>
                   <td class="bgt-secondary" rowspan="3">
                   <div class="myBox">
                      <select class="myImputField" type="date" name="" id="plazoConfirmacion">
                        <option value="02:00" selected>02 HORAS</option>
                        <option value="05:00">05 HORAS</option>
                        <option value="12:00">12 HORAS</option>
                        <option value="24:00">24 HORAS</option>



                      </select>
                  <label class="mylabel" >Confirmacion</label>

                   </div>
                   </td>
=======
              <td style="text-align:right;"><input type="text"  id="total" class="" name=""   style="width:80px; height: 20px; font: 10px; text-align: right; background: #CBDFFF;" readonly>bs.</td>
              <td style="text-align:right;"><input type="text"  id="descuento" class="" name=""   style="width:80px; height: 20px; font: 10px; text-align: right; background: #CBDFFF;" readonly>bs.</td>
            </tr>
            <tr>
              <td colspan="3"><small>Total a Pagar</small></td>
              <td style="text-align:right;"><input type="text"  id="totalPagar" class="" name=""   style="width:80px; height: 20px; font: 10px; text-align: right; background: #CBDFFF;" readonly>bs.</td>

>>>>>>> 2ae43ddfc85c8ea6a60451d1774187d7421c2f47
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

<<<<<<< HEAD


<!-- Evento resevado con su estaod para esa fecha -->

  <div class="modal fade" id="detalleEvento" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
      <div class="modal-content">
        <div class="modal-header p-2 bgt-primary">
=======
  <div class="modal fade" id="detalleEvento" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header p-2 bgt-acent">
>>>>>>> 2ae43ddfc85c8ea6a60451d1774187d7421c2f47


         <div class="container">
           <div class="row">
<<<<<<< HEAD
            <div class=" col-10 d-flex justify-content-start align-items-center">
            <h5 class="modal-title "> Evento : <span id="dtnombreEvento"></span></h5>
              
            </div>
            <div class=" col-2 d-flex justify-content-end">
                  <button type="button" class="btn btn-sm" data-dismiss="modal" aria-label="Close"><span  aria-hidden="true" style="color: red;"><b>X</b></span></button>
            </div>
        
=======

            <h5 class="modal-title ">Nombre Cliente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span  aria-hidden="true">×</span></button>
>>>>>>> 2ae43ddfc85c8ea6a60451d1774187d7421c2f47


          </div>
        </div>
      </div>
<<<<<<< HEAD
      <div class="modal-body bgt-secondary m-0 p-0 px-2">
=======
      <div class="modal-body bgt-secondary">
>>>>>>> 2ae43ddfc85c8ea6a60451d1774187d7421c2f47

        <!-- Post -->        

        <div class="row">

          <div class=" col-md-12 ">
<<<<<<< HEAD
            <label class="row"><div class="col-lg-6 col-md-8 col-sm-12"> Servicios reservados para el <span id="dtdiaL"></span> <span id="dtdia"></span> </div>
             <div  class="col-lg-6 col-md-4 col-sm-12">Horas<span id="horaInicio">10:00</span> - <span id="horaFin">14:00</span></div></label>
            <table rules="all" width="100%"> 
              <thead class="bgt-acent">
                <tr class="t-secondary-n" style="text-align: center;">
                  <th>Nro</th>
                  <th>Servicio </th>
                  <th>cant. </th>
                  <th>PU <small>(bs.)</small></th>

                  <th>Precio Total<small>(bs.)</small></th>
           
                </tr>
              </thead>
              <tbody class="servicioReservado" id="servicioReservado">
            
=======
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
>>>>>>> 2ae43ddfc85c8ea6a60451d1774187d7421c2f47
              </tbody>


            </table>
           <div class="myBox">

  

          </div>
        </div>
      
   

  </div>




<<<<<<< HEAD
</div>

<div class="modal-footer d-flex justify-content-start p-2 bgt-acent t-secondary-n">
<div class="col-6">
  Cliente: <label id="eventoCliente"></label>

</div><div class="d-flex justify-content-end col-5">
  <span id="idReserva">d</span>
  <button type="button" class="btn btn-success" id="btnPagarCalendario">Cobrar</button>
</div>
=======

</div>

<div class="modal-footer d-flex justify-content-around p-1 bgt-acent">
 <label>Nombre Cliente</label>
>>>>>>> 2ae43ddfc85c8ea6a60451d1774187d7421c2f47
</div>
</div>
</div>
</div>




<<<<<<< HEAD
=======
<script>"use strict";</script>
<script src="<?php echo base_url();?>/calendario/res/jquery.js"></script>
<script src="<?php echo base_url();?>/calendario/res/momentjs.lang.js"></script>
<script src="<?php echo base_url();?>/calendario/res/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/calendario/res/underscore-min.js"></script>
<script src="<?php echo base_url();?>/calendario/res/clndr.min.js"></script>
>>>>>>> 2ae43ddfc85c8ea6a60451d1774187d7421c2f47


<script>
  // window.dataLayer = window.dataLayer || [];
  // function gtag(){dataLayer.push(arguments);}
  // gtag('js', new Date());
  // reservarsalon = ['UA', '114663401', '1' ];
  // gtag('config', reservarsalon.join("-"));
</script>

<script id="calendar-template" type="text/template">  
  <div class="row" >
    <div class="col-md-8 "  >

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

    <div class="col-md-4" id="listevents" style="background:rgba(255,171,107,0.3); height: 70vh;overflow-y: auto;">
      <div class="event-listing hidden-xs">
        <div class="event-listing-title text-center" style="background:rgba(255,171,107,0.5);">Eventos programados-<span id="mesL"></span> </div>
        <div>
           <table  class="table table-sm" rules="rows" width="100%">
            <tbody class="eventosMensuales">
                   
            </tbody>
          </table>
                
        </div>

      </div>
    </div>
  </div>

</script>

<script>


  var myCalendar;
  var currentPeriod = 202308;
  var eventsArray = [];
<<<<<<< HEAD
  var fechasAColor = [];
  var estado=[];
  var fechaActual ;
$(document).ready(function() {
    fechaActual = moment();
  // console.log("Fecha actual:", fechaActual.format('YYYY-MMMM-dddd'));
=======
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

>>>>>>> 2ae43ddfc85c8ea6a60451d1774187d7421c2f47

   cargarFechasDesdeBaseDeDatos();
 
});

  function cargarFechasDesdeBaseDeDatos() {
    $.ajax({
    url: '../reservas/listaFechasReservar', // Reemplaza con la URL de tu servidor
    method: 'POST',
    success: function (response) {
      let fechas = JSON.parse(response);

         fechas.forEach(fecha=>{


        fechasAColor.push(fecha.fecha);
        estado.push(fecha.estado);
         });


    },

  });
  }
  function aplicarEstilosAFechas() {
   
      var i=0;
      fechasAColor.forEach(function (fecha) {
        var currentCell = $('#mini-clndr .calendar-day-' + fecha);
        currentCell.addClass('colored-date has-event');
      


       if(estado[i]==1){
            currentCell.css({
        'background-color': '#E08402',
        'color': '001F3F', 
      });
        }
          else if(estado[i]==2){
            currentCell.css({
        'background-color': '#008800',
        'color': '#C7FFCB', 
      });
        }  else if(estado[i]==3){
            currentCell.css({
        'background-color': '#0D77B6',
        'color': '#F8FCFF', 
      });
        }
        else
        {
               currentCell.css({
            'background-color': '#FA7070',
            'color': '#000', 
          });
         }

         //codigo done si as mes pasado tiene pendienetes
    //       if (moment(fecha).isBefore(fechaActual, 'day')) {
    //   currentCell.css({
    //     'background-color': '#808080', 
    //     'color': '#00162B', 
    //   });
    // }
        i=i+1;
      
      });
    }
  var time=0;
  function cargarPorSeccion(){
  moment.locale('es'); /*Lang*/

    var aux;
<<<<<<< HEAD
=======

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



>>>>>>> 2ae43ddfc85c8ea6a60451d1774187d7421c2f47
    myCalendar = $('#mini-clndr').clndr({

      daysOfTheWeek: ['Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa', 'Do'],
      template  :    $('#calendar-template').html(),
      events    :    eventsArray,

<<<<<<< HEAD
      ready     :    function() {setInterval(getNewData, 1000);  
   // aplicarEstilosAFechas();
   // listaEventoDelMes(aux.date);
=======
      ready     :    function(){ 
   aplicarEstilosAFechas();
>>>>>>> 2ae43ddfc85c8ea6a60451d1774187d7421c2f47
  
    },  

    clickEvents: {

      click: function(target){
        aux = target;

        dayClass = aux.element.className;

        /*today o YYYY-mm-dd*/
        clickedDay = aux.date._i;  /*dayClass.split(" ")[1].replace("calendar-day-", '');*/

        if ( dayClass.indexOf('event') > -1 ){

          eventDetail = aux.events[0];
<<<<<<< HEAD
          prepareModalDetail( clickedDay, eventDetail,aux );

        }else{

          if ( dayClass.indexOf('past') < 0 && dayClass.indexOf('adjacent-month') < 0 ) {
            prepareModalToAdd( clickedDay );

           fechaActual= aux.date;
=======
          prepareModalDetail( clickedDay, eventDetail );

        }else{

          if ( dayClass.indexOf('past') < 0 && dayClass.indexOf('adjacent-month') < 0 ) {
            prepareModalToAdd( clickedDay );
>>>>>>> 2ae43ddfc85c8ea6a60451d1774187d7421c2f47

          }else
          {
            toastr.info("La fecha seleccionada debe estar dentro de este mes.");
          }
        }

      },
      onMonthChange: function(month) {
        // waitOnCalendarLoad(true);
        currentPeriod =  month.format('YYYYMM');
<<<<<<< HEAD
        var mesL=month.format('MMMM');//nombre mes

        var diaL=month.format('dddd');//nombre dias
=======
        aplicarEstilosAFechas();
      }

    }

  });
>>>>>>> 2ae43ddfc85c8ea6a60451d1774187d7421c2f47

        var mes=month.format('MM');
        var anio=month.format('YYYY');
        aplicarEstilosAFechas();
        // console.log(month);
        listaEventoDelMes(month);
      }

    }

  });


<<<<<<< HEAD

//     var enjoyhint_instance = new EnjoyHint({});



// // https://github.com/xbsoftware/enjoyhint
//     enjoyhint_instance.set(enjoyhint_script_steps);
//     enjoyhint_instance.run();

}

function listaEventoDelMes(month){
  mes=month.format('MM');
  anio=month.format('YYYY');
  mesL=month.format('MMMM');
 actual = moment();
 hoy=actual.format('YYYY-MM-DD');
      $.ajax({
    url: '../reservas/listaReservasMensuales', 
    method: 'POST',
    data:{mes,anio,hoy},
    success: function (res) {
 
        var servicios= JSON.parse(res);    
        let template= "";
      servicios.forEach(servicioR=>{
        // console.log(servicioR.estado);   
        template+=` <tr title="${servicioR.nombreCompleto}">
      <td>
         ${
          servicioR.estado == 1 
            ? '<i class="fa fa-square" style="color:#E08402"></i>' 
            : servicioR.estado == 2 
              ? '<i class="fa fa-square" style="color:#008800"></i>' 
              : servicioR.estado ==3 
                ? '<i class="fa fa-square" style="color:#0D77B6"></i>' 
                : '<i class="fa fa-square" style="color:red"></i>'
        }
      </td>

      <td>${servicioR.dias}</td>
      <td>${servicioR.evento}</td>

      <td>${servicioR.nombreCompleto}</td>
    </tr>
        `
      });
      $('.eventosMensuales').html(template); 

        var mes=document.getElementById('mesL');
      mes.textContent=mesL;

    },

  });
      // console.log('deee +');
}

  var ban=1;
  function getNewData(){
          if(ban==1)
          {
              // cargarFechasDesdeBaseDeDatos();

               listaEventoDelMes(fechaActual);
               aplicarEstilosAFechas();
               ban=0;
            
          } 
        
  }
  function actuliazarNuevoEventoagreados(){
         
       cargarFechasDesdeBaseDeDatos();
      listaEventoDelMes(fechaActual);
      // aplicarEstilosAFechas();
            
         
        setTimeout(aplicarEstilosAFechas, 1000);
  }

  cargarPorSeccion();
  


  $('#btnPagarCalendario').click(function() {
    cargarYMostrarModal('http://localhost/web2/proyectodegrado/proyectoEventosAndrea/index.php/reservas/index');
    alert("gg");



     function cargarYMostrarModal(ruta) {
    $.ajax({
      url: ruta,
      dataType: 'html',
      success: function(data) {
        // Agrega el contenido al contenedor y muestra el modal
        $('#modalContainer').html(data);
        $('#miModal').modal('show');
=======

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
>>>>>>> 2ae43ddfc85c8ea6a60451d1774187d7421c2f47

        // Delegación de eventos para el botón en la segunda vista
        $('#miTablaSegundaVista').on('click', '.btnMostrarAlert', function() {
          // Obtener datos de la fila
          var nombre = $(this).closest('tr').find('.nombre').text();
          var edad = $(this).closest('tr').find('.edad').text();

          // Mostrar alerta
          alert(`Se presionó el botón en la fila:\nNombre: ${nombre}\nEdad: ${edad}`);
        });

        // Simular clic aleatorio después de un segundo
        // setTimeout(simularClicAleatorio, 1000);
      },
      error: function() {
        console.error('Error al cargar el modal.');
      }
    });
  }
  });
</script>






