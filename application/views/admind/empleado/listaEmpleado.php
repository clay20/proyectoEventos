

<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-sm-12 d-flex justify-content-center">
            <h1><b>Empleados</b></h1>
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
              <div class="card-header p-2 ">
                <ul class="nav nav-pills p-2 bg-dark">
                  <li class="nav-item"><a class="nav-link active " href="#activity" data-toggle="tab">Lista</a></li>
                  <li class="nav-item"><a class=" nav-link" href="#agregarEmpleado" data-toggle="tab"><button class="btn btn-outline-primary btn-sm">Agregar</button></a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Eliminados</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    
                    
                    <div class="card-body">
                      <table id="example12" class="table table-bordered table-striped ">
                        <thead>
                          <tr>
                            <th>Nro</th>
                            <th>Nombre Completo</th>
                            
                            <th>Ci</th>
                            <th>F.Nacimiento</th>
                            <th>Sexo</th>
                           
                            <th>Cargo</th>
                             <th>Salario</th>
                             <td> <i class="fa-solid fa-phone text-info"></i></td>
                            <th><i class="fa-solid fa-file-pen fa-md text-warning  d-flex justify-content-center"></i></th>
                            <th><i class="fa-solid fa-trash fa-md text-danger d-flex justify-content-center"></i></th>
                          </tr>
                        </thead>
                        <tbody>
                          
                            <?php $i=0; ?>
                            <?php foreach ($empleado ->result() as $row) {
                              $i++;
                          
                            ?>
                            <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row->primerApellido.' '. $row->segundoApellido.' '.$row->nombre; ?></td>
                            <td><?php echo $row->ci; ?></td>
                            <td><?php echo $row->fechaNacimiento; ?></td>
                            <td><?php echo $row->sexo=='f'? 'Femenino':'Masculino'; ?></td>
                            <td><?php echo $row->nombreCargo; ?></td>
                            <td><?php echo $row->salario; ?></td>
                             <td><?php echo $row->celular.'-'.$row->telefono; ?></td>



                            
                            <td class="" title="Modificar"> <?php echo form_open_multipart('empleado/modificar'); ?>
                            <input type="hidden" value="<?php echo $row->id; ?>" name="idEmpleado">
                            <button class="btn btn-outline-warning btn-ls "><i class="fa-solid fa-file-pen fa-md"></i></button>
                            <?php echo form_close(); ?></td>
                            <td class="" title="Eliminar"> <?php echo form_open_multipart('empleado/eliminar'); ?>
                            <input type="hidden" value="<?php echo $row->id;?>" name="idEmpleado">
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
                            <th>F.Nacimiento</th>
                            <th>Sexo</th>
                           
                            <th>Cargo</th>
                             <th>Salario</th>
                             <td> <i class="fa-solid fa-phone text-info"></i></td>
                            <th><i class="fa-solid fa-file-pen fa-md text-warning  d-flex justify-content-center"></i></th>
                            <th><i class="fa-solid fa-trash fa-md text-danger d-flex justify-content-center"></i></th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                    
                    

                  </div>
                  
                  <div class="tab-pane" id="agregarEmpleado">
                    <!-- Post -->
                    <?php  echo form_open_multipart('empleado/agregarEmpleado'); ?>
                    <div class="post">
                      <div class="row ">
                        <div  class=" col-sm-6 col-md-4  col-12  ">
                          <label class="col form-label " for="nombreUsuario" >Nombre</label>
                          <br>
                          <input class="col form-control form-control-sm" type="text" id="nombreUsuario" name="nombre" placeholder="Nombre" required autofocus>
                        </div>
                        <div  class=" col-sm-6 col-md-4  col-12 ">
                          <div class="form-group">


                            <label class="form-label" >Primer Apellido</label>
                            <input class="form-control form-control-sm" type="text" name="primerApellido" placeholder="Primer Apellido" required>
                          </div>
                        </div>
                        <div  class=" col-sm-6 col-md-4  col-12 ">
                          <label class="form-label" >Segundo Apellido</label>
                          <input class="form-control form-control-sm" type="text" name="segundoApellido" placeholder="Segundo Apellido">
                        </div>
                      </div>
                      <div class="row ">
                        <div class="form-group col-sm-3 col-md-3  col-12 ">


                        <label class="form-label" >Cargo</label>


                        <select class="form-control form-control-sm" name="cargo">

                          <option selected disabled >Seleccionar ... </option>
                          <?php foreach ($cargo ->result() as $row) {
                            ?>

                            <option  value="<?php echo $row->id; ?>"><?php echo $row->nombreCargo; ?></option>


                            <?php

                          } 
                          ?>


                        </select>
                      </div>
                        <div  class=" col-sm-3 col-md-3  col-12  ">
                          <label class="col form-label " for="ci" >Salario</label>
                          <br>
                          <input class="col form-control form-control-sm" type="number" id="ci" name="salario" placeholder="Cedula Identidad" required autofocus>
                        </div>
                        <div  class=" col-sm-3 col-md-3  col-12  ">
                          <label class="col form-label " for="ci" >C.I</label>
                          <br>
                          <input class="col form-control form-control-sm" type="text" id="ci" name="ci" placeholder="Cedula Identidad" required autofocus>
                        </div>
                        <div  class=" col-sm-3 col-md-3  col-12 ">
                          <div class="form-group">


                            <label class="form-label" > Fecha Nacimiento</label>
                            <input class="form-control form-control-sm" type="date" name="fechaNacimiento" placeholder="dd/mm/yy" required>
                          </div>
                        </div>

                      </div>
                      <div class="row ">


                        <div class="col form-check form-check-inline d-flex justify-content-end">

                          <label class="form-label">Genero</label>
                        </div>
                        <div class="col d-flex justify-content-around">
                         <div class="form-check form-check-inline">
                          <input class="form-radio" type="radio" name="genero" id="radioF" value="f" checked>
                          <label class="form-check-label" for="radioF">Femenino</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-radio" type="radio" name="genero" id="radioM" value="m">
                          <label class="form-check-label" for="radioM">Masculino</label>
                        </div>
                      </div>

                    </div>
                    <div class="row ">
                      <div  class=" col-sm-6 col-md-6  col-12  ">
                        <label class="col form-label " for="celular" >Celular</label>

                        <input class="col form-control form-control-sm" type="number" id="celular" name="celular" placeholder="Celular" required autofocus>
                      </div>
                      <div  class=" col-sm-6 col-md-6  col-12 ">
                        <div class="form-group">


                          <label class="form-label" >Telefono</label>
                          <input class="form-control form-control-sm" type="number" name="telefono" placeholder="Telefono">
                        </div>
                      </div>

                    </div>
                    
                  <div class="row d-flex justify-content-around">
                    <button class="btn btn-sm btn-outline-success btn-save" type="submit">
                      <i class="fas fa-save"></i>Guardar</button>



                      <button class="btn btn-sm btn-outline-warning" type="button"><i class="fas fa-times"></i>Cancelar</button>
      

                    </div>



                  </div>
                  <!-- /.post -->

                  <?php echo form_close(); ?>
                </div>


        <!-- /.tab-pane -->

        <div class="tab-pane" id="settings">
          <div class="card-body">
            <table id="example12" class="table table-bordered table-striped ">
                        <thead>
                          <tr>
                            <th>Nro</th>
                            <th>Nombre Completo</th>
                            
                            <th>Ci</th>
                            <th>F.Nacimiento</th>
                            <th>Sexo</th>
                           
                            <th>Cargo</th>
                             <th>Salario</th>
                             <th> <i class="fa-solid fa-phone text-info"></i></th>
                           
                            <th>Activar</i></th>
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
                            <td><?php echo $row->fechaNacimiento; ?></td>
                            <td><?php echo $row->sexo=='f'? 'Femenino':'Masculino'; ?></td>
                            <td><?php echo $row->nombreCargo; ?></td>
                            <td><?php echo $row->salario; ?></td>
                             <td><?php echo $row->celular.'-'.$row->telefono; ?></td>



                            
                            
                            <td class="" title="abilitar"> <?php echo form_open_multipart('empleado/abilitar'); ?>
                            <input type="hidden" value="<?php echo $row->id;?>" name="idEmpleado">
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
                            <th>F.Nacimiento</th>
                            <th>Sexo</th>
                           
                            <th>Cargo</th>
                             <th>Salario</th>
                             <th> <i class="fa-solid fa-phone text-info"></i></th>
                             <th>Actvar</th>
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
</section>

</div>




