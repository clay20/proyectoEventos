

<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-sm-12 d-flex justify-content-center">
            <h1><b>Editar Datos Del Cliente</b></h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">





        <div class="row">
          <div class="col-12">
            <div class="card">

              <div class="card-body">
                <div class="tab-content">


                  <div class="active tab-pane" id="agregarEmpleado">
                    <!-- Post -->
                          <?php foreach ($empleado ->result() as $row) {
                              ?>

                             



                    <?php  echo form_open_multipart('cliente/guardarCambios'); ?>
                    <div class="post">
                      <div class="row ">
                        <div  class=" col-sm-6 col-md-4  col-12  ">
                          <label class="col form-label " for="nombreUsuario" >Nombre</label>
                          <br>
                          <input  type="hidden" value="<?php echo $row->id; ?>" id="nombreUsuario" name="id" placeholder="Nombre" required autofocus>
                          <input class="col form-control form-control-sm" type="text" value="<?php echo $row->nombre; ?>" id="nombreUsuario" name="nombre" placeholder="Nombre" required autofocus>
                        </div>
                        <div  class=" col-sm-6 col-md-4  col-12 ">
                          <div class="form-group">


                            <label class="form-label" >Primer Apellido</label>
                            <input class="form-control form-control-sm"  type="text" value="<?php echo $row->primerApellido; ?>" name="primerApellido" placeholder="Primer Apellido" required>
                          </div>
                        </div>
                        <div  class=" col-sm-6 col-md-4  col-12 ">
                          <label class="form-label" >Segundo Apellido</label>
                          <input class="form-control form-control-sm" type="text" value="<?php echo $row->segundoApellido; ?>" name="segundoApellido" placeholder="Segundo Apellido">
                        </div>
                      </div>
                      <div class="row ">
                       
                       
                          
                        <div  class=" col-sm-4 col-md-4  col-12  ">
                          <label class="col form-label " for="ci" >C.I</label>
                          <br>
                          <input class="col form-control form-control-sm" type="text" id="ci" value="<?php echo $row->ci; ?>"  name="ci" placeholder="Cedula Identidad" required autofocus>
                        </div>
                       
                      <div  class=" col-sm-4 col-md-4  col-12  ">
                        <label class="col form-label " for="celular" >Celular</label>

                        <input class="col form-control form-control-sm" type="number" id="celular"  value="<?php echo $row->celular; ?>"name="celular" placeholder="Celular" required autofocus>
                      </div>
                      <div  class=" col-sm-4 col-md-4  col-12 ">
                        <div class="form-group">


                          <label class="form-label" >Telefono</label>
                          <input class="form-control form-control-sm" type="number"  value="<?php echo $row->telefono;?>" name="telefono" placeholder="Telefono">
                        </div>
                      </div>

                    </div>

                    <div class="row d-flex justify-content-around">
                      <button class="btn btn-sm btn-outline-success btn-save" type="submit">
                        <i class="fas fa-save"></i>Actualizar Datos</button>


                         <?php  echo form_open_multipart('cliente/index'); ?>
                        <button class="btn btn-sm btn-outline-warning" type="button"><i class="fas fa-times"></i>Cancelar</button>
                         <?php echo form_close(); ?>


                      </div>



                    </div>
                    <!-- /.post -->


                    <?php echo form_close(); ?>


                      <?php

                      } 
                    ?>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </div>


      </div>
    </section>

  </div>
</div>




