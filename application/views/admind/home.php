
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
          <button type="submit" > Reporte excel2</button></a>
          reporteTare
          <a href="<?php echo base_url();  ?>index.php/usuario/reporteTare" target="_blank">
            <button type="submit" > Reporte  Tarea</button></a>
             <a href="#" target="_blank">
              <?php echo form_open_multipart("email/send") ?>
              <input type="hidden" name="msg" value="des homes">
            <button type="submit" > Enviar</button>
            <?php echo form_close(); ?></a>

            <div class="row">
              <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3>Tipo Evento </h3>

                    <p>Fecha</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                  </div>
                  <a href="#" class="small-box-footer"  data-toggle="modal" data-target="#staticBackdrop">
                    mas info <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>

                    <p>Bounce Rate</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3>44</h3>

                    <p>User Registrations</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-user-plus"></i>
                  </div>
                  <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3>65</h3>

                    <p>Unique Visitors</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-chart-pie"></i>
                  </div>
                  <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
              <!-- ./col -->
            </div>
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog  modal-dialog-centered" role="document" style="opacity:.9">
                <div class="modal-content bgt-acent opacity-50">
                  <div class="modal-header" style="background: #D28C58;">
                    <h5 class="modal-title" id="staticBackdropLabel">Nombre del Eventos</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body" style="background:#FFC888">


                    <div>
                     
                      <div class="row">
           <div class="col-lg-4">
             <div class="myBox">

            <input  class="myImputField" type="password" required  />
            <label class="mylabel">Password</label>
            </div>
           </div>

        </div>
                    </div>

                  </div>
                  <div class="modal-footer d-flex justify-content-around">
                    <button type="button" class="btn btn-sm  btnt-primary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-sm  btnt-primary">Gurdar</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-info">
                  <!-- Loading (remove the following to stop the loading)-->
                  <div class="overlay">
                    <i class="fas fa-3x fa-sync-alt"></i>
                  </div>
                  <!-- end loading -->
                  <div class="inner">
                    <h3>150</h3>

                    <p>New Orders</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                  </div>
                  <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-success">
                  <!-- Loading (remove the following to stop the loading)-->
                  <div class="overlay dark">
                    <i class="fas fa-3x fa-sync-alt"></i>
                  </div>
                  <!-- end loading -->
                  <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>

                    <p>Bounce Rate</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
              <!-- ./col -->
            </div>


          </div>


        </section>
      </div>
    </div>

