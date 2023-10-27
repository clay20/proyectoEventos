
<div class="wrapper " style="background: #C69F74;">

  <div class="content-wrapper p-0 px-2"   style=" background-image: url('<?php echo base_url();?>/img/fondo.jpg');">
    <!--  (cabecera header) -->
    <section class=" p-2 m-0">


      <div class="row  d-flex justify-content-center">
        <div class="col-8 d-flex justify-content-center align-items-center">

          <h3 class="t-primary" >Reporte General de  Ingresos</h3>
        </div>
        
      </div>


    </section>
    <section class="px-2 py-1" style="background:rgba(255, 255, 255, .2); height: 75vh;"  >

      <div class="col-12 d-flex justify-content-end" >
      
        <button  title="Imprimir" class="btn btn-sm m-0  p-1 btnt-primary imprimirReporte" title="Eventos Realizados"><b><i class="fa-solid fa-print fa-xl text-success"  ></i></b></button>

      </div>
   <div class="d-flex justify-content-center justify-content-center">
     <div class="d-flex"> 
     <div class="d-flex align-items-center">
        <h5>Desde </h5>
       <div class="myBox">
          
            <input id="fechaIncio" class="myImputField" type="date" value="2023-10-26" name="fechaIncio" >
        </div>
     </div>
      <div class="d-flex align-items-center">
        <h5>Hasta </h5>

        <div class="myBox">
          
            <input id="fechaFin" class="myImputField" type="date" value="2023-10-27" name="fechaFin" >
        </div>
     </div>
      </div>
   </div>

      <div>

        <div>
          <table id="" class="table table-sm"   width="100%" >

           <thead class="t-secondary ">
            <tr style="text-align: center;">
              <th>Nro </th>
              <th>Fecha</th>
              <th>Cliente</th>
              <th>Total Bl.</th>
          
            </tr>
          </thead>
          <tbody class=" t-secondary-n tReporteGeneral" id="">
          

         </tbody>
         <tfoot id="">
             <tr>
               <th>
                 <td colspan="3"><h5>Ingresos:</h5></td>
               </th>
               <th>
                  <span id="ingresos"></span>
               </th>
             </tr>
         </tfoot>
       </table>
     </div>
     <div>
       bdff
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
      <div class="row " >

        <div class=" col-md-12 ">

              <div class="" style="max-height: 70vh ">
            
          <table rules="all"  id=""> 
            <thead class="bgt-acent">
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

            </thead>
            <tbody class="servicioReservado" id="servicioReservado">
           
         
             </tbody>
          <tfoot >
           <tr>
             <th >
                Total
             </th>
             <th>
               <span id="Ingresos"></span>
             </th>
           </tr>
          </tfoot>


        </table>

              </div>
   
 </div><div>
   
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
