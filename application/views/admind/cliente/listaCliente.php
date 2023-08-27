

<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-sm-12 d-flex justify-content-center">
            <h1><b>Clientes</b></h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">





        <div class="row">
          <div class="col-12">
            <div class="card ">
              <div class="card-header  p-0 bgt-acent ">
                <ul class="nav nav-pills p-0 bgt-primary">
                  <li class="nav-item"><a class="nav-link active " href="#activity" data-toggle="tab">Lista</a></li>
                  <li class="nav-item"><a class=" nav-link " href="#agregarEmpleado" data-toggle="tab">Agregar</a></li>
                  <li class="nav-item"><a class="nav-link " href="#settings" data-toggle="tab">Eliminados</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body bgt-acent">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    
                    
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped ">
                        <thead>
                          <tr>
                            <th>Nro</th>
                            <th>Nombre Completo</th>
                            
                            <th>Ci</th>

                            <td> <i class="fa-solid fa-phone text-info"></i></td>
                            <th><i class="fa-solid fa-file-pen fa-md text-warning  d-flex justify-content-center"></i></th>
                            <th><i class="fa-solid fa-trash fa-md text-danger d-flex justify-content-center"></i></th>
                          </tr>
                        </thead>
                        <tbody>

                          <?php $i=0; ?>
                          <?php foreach ($cliente ->result() as $row) {
                            $i++;

                            ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td><?php echo $row->primerApellido.' '. $row->segundoApellido.' '.$row->nombre; ?></td>
                              <td><?php echo $row->ci; ?></td>
                              <td><?php echo $row->celular.'-'.$row->telefono; ?>
                                 <a href="#" class="small-box-footer"  data-toggle="modal" data-target="#modaModificar">
                    Modificar <i class="fas fa-arrow-circle-right"></i>
                  </a>
                              </td>




                              <td class="" title="Modificar"> <?php echo form_open_multipart('cliente/modificar'); ?>
                              <input type="hidden" value="<?php echo $row->id;?>" name="idCliente">
                              <button class="btn btn-outline-warning btn-ls "><i class="fa-solid fa-file-pen fa-md"></i></button>

                              <?php echo form_close(); ?></td>
                              <td class="" title="Eliminar"> <?php echo form_open_multipart('cliente/eliminar'); ?>
                              <input type="hidden" value="<?php echo $row->id;?>" name="idCliente">
                              <button class="btn btn-outline-danger btn-ls"><i class="fa-solid fa-trash fa-md"></i></button>
                              <?php echo form_close(); ?></td>
                            </tr>
                            <?php

                          } 
                          ?>
                          

                        </tbody>
                        <tfoot>
                         <tr>
                          <th>Nro</th>
                          <th>Nombre Completo</th>

                          <th>Ci</th>

                          <td> <i class="fa-solid fa-phone text-info"></i></td>
                          <th><i class="fa-solid fa-file-pen fa-md text-warning  d-flex justify-content-center"></i></th>
                          <th><i class="fa-solid fa-trash fa-md text-danger d-flex justify-content-center"></i></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>



                </div>

                <div class="tab-pane " id="agregarEmpleado">
                  <!-- Post -->
                  <?php  echo form_open_multipart('cliente/agregarCliente'); ?>
                  

                  <div class="row">

                    <div class="col col-sm-6 col-md-4   col-12">
                     <div class="myBox">

                      <input  class="myImputField" type="text" required  />
                      <label class="mylabel" for="">Nombre</label>
                      <label class="mylabel-icon" for=""><i class="fas fa-chart-pie"></i></label>

                    </div>
                        </div>
                        <div class="col col-sm-6 col-md-4  col-12">
                         <div class="myBox">

                          <input  class="myImputField form-control-md" type="text" required  />
                          <label class="mylabel" for="">Primer Apellido</label>
                          <label class="mylabel-icon" for=""><i class="fas fa-chart-pie"></i></label>

                        </div>
                      </div>
                      <div class="col col-sm-8 col-md-4  col-12">
                       <div class="myBox">

                        <input  class="myImputField form-control-sm" type="text" required  />
                        <label class="mylabel" for="">Segundo Apellido</label>
                        <label class="mylabel-icon" for=""><i class="fas fa-chart-pie"></i></label>

                      </div>
                    </div>

                  </div>


                      <div class="row ">


                       <div class="col col-sm-4 col-md-4  col-12">
                         <div class="myBox">

                          <input  class="myImputField" type="number" required  />
                          <label class="mylabel" for="">CI-NIT</label>
                          <label class="mylabel-icon" for=""><i class="fas fa-chart-pie"></i></label>

                        </div>
                      </div>
                      <div  class=" col-sm-4 col-md-4  col-12  ">
                        <div class="myBox">

                          <input  class="myImputField" type="number" required  />
                          <label class="mylabel" for="">Celular</label>
                          <label class="mylabel-icon" for=""><i class="fas fa-chart-pie"></i></label>

                        </div>
                      </div>
                      <div  class=" col-sm-4 col-md-4  col-12 ">
                        <div class="myBox">

                          <input  class="myImputField" type="number" required  />
                          <label class="mylabel" for="">Telefono</label>
                          <label class="mylabel-icon" for=""><i class="fa-solid fa-phone-flip fa-lg"></i></label>

                        </div>
                      </div>
                    </div>
                    <div class="row d-flex justify-content-around m-3">
                      <button class="btn btn-sm btn-outline-success btn-save" type="submit">
                        <i class="fas fa-save"></i>Guardar</button>



                        <button class="btn btn-sm btn-outline-warning" type="button"><i class="fas fa-times"></i>Cancelar</button>


                      </div>

                      <?php echo form_close(); ?>

                </div>



          <!-- /.tab-pane -->

          <div class="tab-pane" id="settings">
            <div class="card-body">

              <table id="example1" class="table table-bordered table-striped ">
                <thead>
                  <tr>
                    <th>Nro</th>
                    <th>Nombre Completo</th>

                    <th>Ci</th>

                    <td> <i class="fa-solid fa-phone text-info"></i></td>
                    <td>Abilitar</td>

                  </tr>
                </thead>
                <tbody>

                  <?php $i=0; ?>
                  <?php foreach ($desabilitados ->result() as $row) {
                    $i++;

                    ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $row->primerApellido.' '. $row->segundoApellido.' '.$row->nombre; ?></td>
                      <td><?php echo $row->ci; ?></td>
                      <td><?php echo $row->celular.'-'.$row->telefono; ?></td>




                      <td class="" title="abilitar"> <?php echo form_open_multipart('cliente/abilitar'); ?>
                      <input type="hidden" value="<?php echo $row->id;?>" name="idCliente">
                      <button class="btn btn-outline-success"><i class="fa-solid fa-reply "></i></i></button>
                      <?php echo form_close(); ?></td>
                    </tr>
                    <?php

                  } 
                  ?>


                </tbody>
                <tfoot>
                  <tr>
                    <th>Nro</th>
                    <th>Nombre Completo</th>

                    <th>Ci</th>

                    <td> <i class="fa-solid fa-phone text-info"></i></td>
                    <td>Abilitar</td>

                  </tr>
                </tfoot>
              </table>


            </div>
          </div>


        </div>
      </div>
    </div>
  </div>

</div>
</div>


</div>
</section>

 <div class="modal modal-primary" id="modaModificar" aria-hidden="true"  data-backdrop="static"  >
    <div class="modal-dialog modal-dialog-centered" >
      <div class="modal-content bgt-secondary" >
        <div class="modal-header bgt-acent" >
          <div class="container">
            <div class="row">
             
              <h5 class="modal-title">Modificar Datos <span id="titleModalDay">Nombre</span></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span  aria-hidden="true">×</span></button>
              </div>
            </div>
          </div>
          <div class="modal-body">
            
            <div class="row">

                    <div class="col col-sm-6 col-md-6   col-12">
                     <div class="myBox">

                      <input  class="myImputField" type="text" required  />
                      <label class="mylabel" for="">Nombre</label>
                      <label class="mylabel-icon" for=""><i class="fas fa-chart-pie"></i></label>

                    </div>
                        </div>
                        <div class="col col-sm-6 col-md-6  col-12">
                         <div class="myBox">

                          <input  class="myImputField form-control-md" type="text" required  />
                          <label class="mylabel" for="">Primer Apellido</label>
                          <label class="mylabel-icon" for=""><i class="fas fa-chart-pie"></i></label>

                        </div>
                      </div>
                      <div class="col col-sm-8 col-md-6  col-12">
                       <div class="myBox">

                        <input  class="myImputField form-control-sm" type="text" required  />
                        <label class="mylabel" for="">Segundo Apellido</label>
                        <label class="mylabel-icon" for=""><i class="fas fa-chart-pie"></i></label>

                      </div>
                    </div>

                  </div>


                      <div class="row ">


                       <div class="col col-sm-4 col-md-6  col-12">
                         <div class="myBox">

                          <input  class="myImputField" type="number" required  />
                          <label class="mylabel" for="">CI-NIT</label>
                          <label class="mylabel-icon" for=""><i class="fas fa-chart-pie"></i></label>

                        </div>
                      </div>
                      <div  class=" col-sm-4 col-md-6  col-12  ">
                        <div class="myBox">

                          <input  class="myImputField" type="number" required  />
                          <label class="mylabel" for="">Celular</label>
                          <label class="mylabel-icon" for=""><i class="fas fa-chart-pie"></i></label>

                        </div>
                      </div>
                      <div  class=" col-sm-4 col-md-8  col-12 ">
                        <div class="myBox">

                          <input  class="myImputField" type="number" required  />
                          <label class="mylabel" for="">Telefono</label>
                          <label class="mylabel-icon" for=""><i class="fa-solid fa-phone-flip fa-md"></i></label>

                        </div>
                      </div>
                    </div>
          </section>
          <div class="clearfix"></div>        

        </div>
        <div class="modal-footer d-flex justify-content-around bgt-secondary" >
          <button type="button" class="btn btn-sm btnt-primary" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-sm btnt-primary" id="" onclick="addCalendarEvt( &quot;2023-08-12&quot;)">Guardar</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>


</div>




