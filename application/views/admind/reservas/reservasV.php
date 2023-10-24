
<div class="wrapper " style="background: #C69F74;">

  <div class="content-wrapper p-0 px-2"   style=" background-image: url('<?php echo base_url();?>/img/fondo.jpg');">
    <!--  (cabecera header) -->
    <section class=" px-0 pt-0 m-0">


      <div class="row ">
        <div class="col-8 d-flex justify-content-start align-items-center">

          <h3 class="t-primary" > Reservas</h3>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center ">
          <div class="myBox">
            <label class="mylabel-icon"><i class="fas fa-search"></i></label>
            <input id="buscarUsuario" class="myImputField" type="search" name="buscarUsuario" >
          </div>

        </div>
      </div>


    </section>
    <section class="px-2 py-1" style="background:rgba(255, 255, 255, .2); height: 75vh;"  >

      <div>
        <a href="<?php echo base_url();?>index.php/usuario/calendario" title="Se redicccionara al calderario"><button class="btn btn-sm m-0 btnt-primary p-1"><b><i class="fa-solid fa-plus fa-xl"></i></b></button></a>

        <button class="btn btn-sm m-0  p-1 btnt-primary" title="Eventos Realizados"><b><i class="fa-solid fa-calendar-check fa-xl text-success"  ></i></b></button>

      </div>


      <div>

        <div>
          <table id="miTablaR" rules="all" width="100%" >

           <thead class="t-secondary ">
            <tr style="text-align: center;">
              <th>Fecha</th>
              <th>Cliente</th>
              <th>Evento-Dias</th>
          

              <th>Total</th>
              <th>Adelanto</th>
              <th>Saldo Pagar</th>

              <th>
                <div class="d-flex justify-content-center align-items-center">
                  Estado
                  <button class="btn btn-sm m-0" type="button"><i class="fa-solid fa-sort"></i></button> 
                </div>
              </th>
              <th style="width:10px">Cobrar</th>

              <th style="width:10px">Acciones</th>
            </tr>
          </thead>
          <tbody class="clienteReservadoT t-secondary-n">
          

         </tbody>
         <tfoot id="">
           
         </tfoot>
       </table>
     </div>
   </div>
 </section>

 <div class="modal fade" id="servicioCobro" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header p-2 bgt-primary">


       <div class="container">
         <div class="row">
          <div class=" col-10 d-flex justify-content-start align-items-center">
            <h5 class="modal-title ">  Cliente:  <span id="nombreCliente" style="color:white;"> AAAAA BBBBBB cCC</span></h5>

          </div>
          <div class=" col-2 d-flex justify-content-end">
            <button type="button" class="btn btn-sm" data-dismiss="modal" aria-label="Close"><span  aria-hidden="true" style="color: red;"><b>X</b></span></button>
          </div>



        </div>
      </div>
    </div>
    <div class="modal-body bgt-secondary m-0 p-0 px-2">

      <!-- Post -->        
      <div>
    
      </div>
      <div class="row">

        <div class=" col-md-12 ">

          <table rules="all" width="100%" id=""> 
            <thead class="bgt-acent">
             

            </thead>
            <tbody class="servicioReservado" id="servicioReservado">
           
         
             </tbody>
          <tfoot rules="none">
            <tr>
              <th colspan="4" style="text-align: right;"> Total Parcial </th>
              <th style="text-align: right;"> <span id="tParcial"></span>  </th>
              <th style="text-align: right;"> <span id="tDes"></span> </th>

            </tr>
             <tr>
              <th colspan="4" style="text-align: right;"> Total Pagar </th>
              <th style="text-align: right;"> <span id="tTotal"></span>  </th>
        
            </tr>
              <tr>
              <th colspan="4" style="text-align: right;"> Anticipo </th>
              <th style="text-align: right;"> <span id="tAdelando"></span>  </th>
        
            </tr>
             <tr>
              <th colspan="4" style="text-align: right;"> Saldo a pagar </th>
              <th style="text-align: right;"> <span id="tPagar"></span>  </th>
        
            </tr>
          </tfoot>


        </table>
   <div class="myBox">



   </div>
 </div>


</div>
</div>
<div class="modal-footer d-flex justify-content-start p-1 bgt-acent t-secondary-n">
  <div class="d-flex justify-content-center align-items-center col-12">
     <h5>Ingrese Monto a Pagar</h5>
    <input class="form-control form-control-md col-sm-3 " style="text-align:right;" onkeypress="return soloNumeroPunto(event)" type="text" name="" maxlength="7"    id="txtPagar" autocomplete="off">
    <button type="button" class="btn btn-md btn-success" id="btnPagar" >Pagar</button>
    <input type="hidden" name="" id="txtIdeReserva">
  </div>
</div>
</div>
</div>
</div>

<!-- Servicio cobro fin -->

<!-- Moda modificar  -->
<div class="modal fade" id="servciosModificar" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header p-2 bgt-primary">


       <div class="container">
         <div class="row">
          <div class=" col-10 d-flex justify-content-start align-items-center">
            <h5 class="modal-title "> Modifcar Servicio - Cliente:  <span id="nombreCliente" style="color:white;"> AAAAA BBBBBB cCC</span></h5>
            
          </div>
          <div class=" col-2 d-flex justify-content-end">
            <button type="button" class="btn btn-sm" data-dismiss="modal" aria-label="Close"><span  aria-hidden="true" style="color: red;"><b>X</b></span></button>
          </div>
          


        </div>
      </div>
    </div>
    <div class="modal-body bgt-secondary m-0 p-0 px-2">

      <!-- Post -->        
      <div>
        Modicar serviico
      </div>
      <div class="row">

        <div class=" col-md-12 ">

          <table rules="all" width="100%"> 
            <thead class="bgt-acent">
              <tr class="t-secondary-n" style="text-align: center;">
                <th style="width:20px">Nro</th>
                <th style="text-align:right; margin-right: 2px;">Servicio </th>
                <th>cant. </th>
                <th>PU</th>
                <th>importe</th>
                <th>descuento</th>
                <!-- <th>Precio Total<small>(bs.)</small></th> -->
                <th style="width:10px"></th>

                
              </tr>
              
            </thead>
            <tbody class="servicioReservadox" id="servicioReservadox">
             <tr >
              <th colspan="8">
                <div class="row d-flex justify-content-start align-items-center ">
                  <div class="col-9 d-f ">
                    <div class="row">
                     <div class=" col-4 ">
                       Servicios <span>23-23-23</span>
                     </div>
                     <div class=" col-8 "> 
                      <span >Invitados</span>
                      <input id="moInivtados"  type="numbers" name="" placeholder="Invitados" style="width:39px" readonly>
                      <span >Inicio</span>
                      <input id="moInivtados"  type="time" name="" placeholder="Invitados" readonly>
                      <span >Fin</span>
                      <input id="moInivtados"  type="time" name="" placeholder="Invitados" readonly>

                    </div>
                  </div>
                  
                </div>
                <div class="col-3 d-flex justify-content-end align-items-center">
                 <button class="btn btn-lg p-0 m-0 "> <i class="fa-solid fa-circle-plus 2xl " style="color:green;" ></i></button>
               </div>
             </div>
           </th>

         </tr>
         <tr>
           <td>1</td>
           <td>Salon</td>
           <td style="text-align:center;"><input type="text" name="" readonly style="width:40px;height:25px"></td>
           <td style="text-align:right;">200</td>
           <td style="text-align:right;">3000</td>
           <td style="text-align:right;">3000</td>

           <td><button class="btn btn-lg p-0 m-0 "> <i class="fa-solid fa-circle-minus 2xl"  style="color:red"></i></button></td>
         </tr> 
           <tr>
           <td>1</td>
           <td>Salon</td>
           <td style="text-align:center;"><input type="text" name="" readonly style="width:40px;height:25px"></td>
           <td style="text-align:right;">200</td>
           <td style="text-align:right;">3000</td>
           <td style="text-align:right;">3000</td>

           <td><button class="btn btn-lg p-0 m-0 "> <i class="fa-solid fa-circle-minus 2xl"  style="color:red"></i></button></td>
         </tr> 
           <tr >
              <th colspan="8">
                <div class="row d-flex justify-content-start align-items-center ">
                  <div class="col-9 d-f ">
                    <div class="row">
                     <div class=" col-4 ">
                       Servicios <span>23-23-23</span>
                     </div>
                     <div class=" col-8 "> 
                      <span >Invitados</span>
                      <input id="moInivtados"  type="numbers" name="" placeholder="Invitados" style="width:39px" readonly>
                      <span >Inicio</span>
                      <input id="moInivtados"  type="time" name="" placeholder="Invitados" readonly>
                      <span >Fin</span>
                      <input id="moInivtados"  type="time" name="" placeholder="Invitados" readonly>

                    </div>
                  </div>
                  
                </div>
                <div class="col-3 d-flex justify-content-end align-items-center">
                 <button class="btn btn-lg p-0 m-0 "> <i class="fa-solid fa-circle-plus 2xl " style="color:green;" ></i></button>
               </div>
             </div>
           </th>

         </tr>
         <tr>
           <td>1</td>
           <td>Salon</td>
           <td style="text-align:center;"><input type="text" name="" readonly style="width:40px;height:25px"></td>
           <td style="text-align:right;">200</td>
           <td style="text-align:right;">3000</td>
           <td style="text-align:right;">3000</td>

           <td><button class="btn btn-lg p-0 m-0 "> <i class="fa-solid fa-circle-minus 2xl"  style="color:red"></i></button></td>
         </tr> 
           <tr>
           <td>1</td>
           <td>Salon</td>
           <td style="text-align:center;"><input type="text" name="" readonly style="width:40px;height:25px"></td>
           <td style="text-align:right;">200</td>
           <td style="text-align:right;">3000</td>
           <td style="text-align:right;">3000</td>

           <td><button class="btn btn-lg p-0 m-0 "> <i class="fa-solid fa-circle-minus 2xl"  style="color:red"></i></button></td>
         </tr>   <tr >
              <th colspan="8">
                <div class="row d-flex justify-content-start align-items-center ">
                  <div class="col-9 d-f ">
                    <div class="row">
                     <div class=" col-4 ">
                       Servicios <span>23-23-23</span>
                     </div>
                     <div class=" col-8 "> 
                      <span >Invitados</span>
                      <input id="moInivtados"  type="numbers" name="" placeholder="Invitados" style="width:39px" readonly>
                      <span >Inicio</span>
                      <input id="moInivtados"  type="time" name="" placeholder="Invitados" readonly>
                      <span >Fin</span>
                      <input id="moInivtados"  type="time" name="" placeholder="Invitados" readonly>

                    </div>
                  </div>
                  
                </div>
                <div class="col-3 d-flex justify-content-end align-items-center">
                 <button class="btn btn-lg p-0 m-0 "> <i class="fa-solid fa-circle-plus 2xl " style="color:green;" ></i></button>
               </div>
             </div>
           </th>

         </tr>
         <tr>
           <td>1</td>
           <td>Salon</td>
           <td style="text-align:center;"><input type="text" name="" readonly style="width:40px;height:25px"></td>
           <td style="text-align:right;">200</td>
           <td style="text-align:right;">3000</td>
           <td style="text-align:right;">3000</td>

           <td><button class="btn btn-lg p-0 m-0 "> <i class="fa-solid fa-circle-minus 2xl"  style="color:red"></i></button></td>
         </tr> 
           <tr>
           <td>1</td>
           <td>Salon</td>
           <td style="text-align:center;"><input type="text" name="" readonly style="width:40px;height:25px"></td>
           <td style="text-align:right;">200</td>
           <td style="text-align:right;">3000</td>
           <td style="text-align:right;">3000</td>

           <td><button class="btn btn-lg p-0 m-0 "> <i class="fa-solid fa-circle-minus 2xl"  style="color:red"></i></button></td>
         </tr> 



     </tbody>



   </table>
   <div class="myBox">



   </div>
 </div>
 
 
</div>
</div>
<div class="modal-footer d-flex justify-content-start p-1 bgt-acent t-secondary-n">
  <div class="col-6">
    Cliente: <label id="eventoCliente"></label>

  </div><div class="d-flex justify-content-end col-5">
    <button type="button" class="btn btn-success">Cobrar</button>
  </div>
</div>
</div>
</div>
</div>
<!-- fin servici modificar -->