
<div class="wrapper"  >

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper " style=" background-image: url('<?php echo base_url();?>/img/fondo.jpg'); background-repeat: no-repeat" >
    <!-- Content cabeera (pagima cabera) -->
    <section class="content-header">
      <div>
        <div class="row">
          
         <div class="col-lg-4">
           <div class="myBox">

            <input  class="myImputField" type="password" required  />
            <label class="mylabel" for="">Password</label>
            <label class="mylabel-icon" for=""><i class="fas fa-chart-pie"></i></label>

          </div>
        </div>

      </div>
    </div>
    
    
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="">


      <!-- Small Box (Stat card) -->
      <h5 class="mb-2 mt-4">Estado Verde =Completado,Amrarillo=Falta Rojo = Cancelado</h5>

      <a href="<?php echo base_url(); ?>index.php/usuario/functionPdf" target="_blank">
        <button type="submit"> Reporte pdf</button></a>
        <!-- Small Box (Stat card) -->
        <a href="<?php echo base_url();  ?>index.php/usuario/reporteExcel" target="_blank">
          <button type="submit" > Reporte excel</button></a>
          <a href="<?php echo base_url();  ?>index.php/usuario/reporteExcel2" target="_blank">
            <button type="submit" > Reporte x2</button></a>
            reporteTare
            <a href="<?php echo base_url();  ?>index.php/usuario/reporteTare" target="_blank">
              <button type="submit" > Reporte  Tarea</button></a>
              <a href="#" target="_blank">
                <?php echo form_open_multipart("email/send") ?>
                <input type="hidden" name="msg" value="des homes">
                <button type="submit" > Enviar</button>
                <?php echo form_close(); ?></a>

                
                
                


              </div>


            </section>
          </div>
        </div>

