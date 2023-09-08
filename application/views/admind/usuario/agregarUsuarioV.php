
<div class="wrapper" style="background: #C69F74;">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"   style=" background-image: url('<?php echo base_url();?>/img/fondo.jpg'); background-repeat: no-repeat">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">

        <div class="col ">
          <h1 class="t-primary" > Usuarios</h1>
        </div>


      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

          <div class="row flex-lg-row flex-column-reverse p-2"  >
            <div class="col "  >
              <!-- small card -->

              <div class="inner">


                <div class="row">
                  <div class="col-12">
                    <div class="card " style="background:rgba(0, 0, 0, .2);" >
                      <div class="card-header p-0 bgt-acent" >
                        <ul class="nav nav-pills">

                          <li class="nav-item"><a class="nav-link active" href="#tabUsuarios" data-toggle="tab"><i class="fa-solid fa-users"></i> Usuarios</a></li>
                          <li class="nav-item"><a class="nav-link " href="#agregarUsuario" data-toggle="tab"><i class="fas fa-user-plus"></i>Agregar </a></li>
                          <li class="nav-item"><a class="nav-link" href="#desabilitados" data-toggle="tab"><i class="fa-solid fa-user-xmark"></i> Desabilitados</a></li>
                        </ul>
                      </div><!-- /.card-header -->
                      <div class="card-body">
                        <div class="tab-content">

                          <!-- Inicio usuarios -->
                          <div class="tab-pane active " id="tabUsuarios" >

                            


                           
                            
                              <table class="table table-responsive-lg">
                                <thead class="t-secondary">
                                  

                                    <th >Nombre Completo</th>
                                    <th class="">C.I</th>
                                    <th class="d-none d-lg-table-cell">Sexo</th>
                                    <th class="d-none d-lg-table-cell">Fecha Nacimiento</th>
                                    <th class="d-none d-lg-table-cell">Email</th>
                              
                                    <th>Usuario</th>
                                    <th>Rol</th>

                                    <th ><i class="fa-solid fa-user-pen fa-lg  " style="width: 10px; color:yellow;"></i></th>
                                    <th ><i class="fa-solid fa-trash  fa-lg " style="width: 10px; color:red"></i></th>

                                  </tr>

                                </thead>
                                <tbody class="t-secondary-n" id="listaUsuario">


                             </tbody>
                              </table>
                            
                         
                         <!-- /.card-body -->


                         <!-- Inicion modefica modal -->
                          <form id="formModificar">
                         <div class="modal modal-primary" id="ModificarUsuario" aria-hidden="true"  data-backdrop="static"  >
                          <div class="modal-dialog modal-dialog-centered modal-lg" >
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

                                  <!-- <?php  echo form_open_multipart('usuario/modificarDatos'); ?> -->
                                 
                                  <div class="post myborder"  style="border-bottom: 2px solid;">

                                    <div class="row ">
                                      <div  class=" col-sm-6 col-md-4  col-12  ">
                                              <input type="hidden" id="idD" name="id">
                                        <div class="myBox">
                                          <input class=" myImputField" type="text" id="nombreUsuarioD" name="nombre"  onkeypress="return soloLetras(event)" minlength="2" maxlength="25" required autofocus>
                                          <label class="mylabel" for="nombreUsuario" >Nombre</label>
                                        </div>
                                      </div>

                                      <div  class=" col-sm-6 col-md-4  col-12  ">

                                        <div class="myBox">
                                          <input class=" myImputField" type="text" id="primerApellidoD" name="primerApellido"  onkeypress="return soloLetras(event)" minlength="2" maxlength="25" required value="mamani">
                                          <label class="mylabel" for="primerApellido" >Primer Apellido</label>
                                        </div>
                                      </div>
                                      <div  class=" col-sm-6 col-md-4  col-12  ">

                                        <div class="myBox">
                                          <input class=" myImputField" type="text" id="segundoApellidoD" name="segundoApellido"  onkeypress="return soloLetras(event)" minlength="0" maxlength="25">
                                          <label class="mylabel" for="segundoApellido" >Segundo Apellido</label>
                                        </div>
                                      </div>


                                    </div>
                                    <div class="row ">

                                     <div  class=" col-sm-3 col-md-4  col-12  ">

                                      <div class="myBox">
                                        <input class="myImputField" type="text" id="ciD" name="ci" onkeypress="return soloNumero(event)" minlength="7" maxlength="10"  required>
                                        <label class="mylabel" for="ci" >C.I.</label>
                                      </div>
                                    </div>

                                    <div  class=" col-sm-3 col-md-4  col-12 d-flex justify-content-center  ">

                                      
                                          <div class="myBox">
                                            <input class="myImputField" type="date" id="fechaNacimientoD" name="fechaNacimiento"   max="2023-08-01" value="2020-01-01"   required>
                                            <label class="mylabel" for="fechaNacimiento"  >Fecha Nacimiento</label>
                                          
                                      </div>
                                    </div>
                              

                                  </div>


                                  <div class="row t-secondary d-flex justify-content-center align-items-center">




                                    <label class="form-label p-2 " for="inlineRadio3">Genero</label>


                                    <div class=" p-2 form-check form-check-inline">
                                      <input class="form-radio" type="radio" name="genero" id="radioF" value="f" checked>
                                      <label class="form-check-label" for="radioF">Femenino</label>
                                    </div>
                                    <div class=" p-2 form-check form-check-inline">
                                      <input class="form-radio" type="radio" name="genero" id="radioM" value="m">
                                      <label class="form-check-label" for="radioM">Masculino</label>
                                    </div>

                                  </div>
                                 
                                <div class="row ">

                                 <div class=" col myborder" style=" border-bottom: 2px solid black;">  

                                  <small class="t-secondary">Requesitos para acceso</small>


                                </div>

                              </div>

                              <div class="row">
                                <div  class=" col-sm-6 col-md-6  col-12 ">

                                 <div class="myBox">
                                  <input class="myImputField" type="email" id="email" name="email"  minlength="7" maxlength="25"  required>
                                  <label class="mylabel" for="email" >Email</label>
                                  <label class="mylabel-icon" for=""><i class="fa-solid fa-envelope"></i></label>

                                </div>
                              </div>
                              <div  class=" col-sm-6 col-md-6  col-12 ">
                                <div class="myBox">
                                  <select class="myImputField" name="rol" id="rolId">

                                    <option selected disabled class="bgt-acent">Seleccione ... </option>
                                    <?php foreach ($rol ->result() as $row) { ?>

                                      <option  class="bgt-secondary" value="<?php echo $row->id; ?> " <?php if ($row->rol == 'invitado') echo 'selected'; ?>><?php echo $row->rol; ?></option>

                                    <?php  }  ?>

                                  </select>
                                  <label class="mylabel" for="email" >Rol Usuario</label>
                                </div>
                              </div>

                            </div>

                          </div>
                        





                            <!-- <?php echo form_close(); ?> -->


                            <div class="clearfix"></div>        

                          </div>
                           
                          <div class="modal-footer d-flex justify-content-around bgt-secondary" >
                             <button class="btn btn-sm btnt-primary" type="submit" data-dismiss="modal"><i class=" fas fa-times p-1 text-danger"></i>Cancelar</button>
                             <button class="btn btn-sm btnt-primary" type="submit">
                            <i class="fas fa-save m-1 text-success"></i>Guardar</button>
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <!-- fin de incio de Modal -->
 </form>
                  </div>
                  <!-- fin Usuarios -->

                  <!--Inicio agregar  -->
                  <div class="tab-pane" id="agregarUsuario">
                    <!-- Post -->
                    <!-- <?php  echo form_open_multipart('usuario/agregarUsuario'); ?> -->
                    <form id="formRegistro2">

                    <div class="post myborder"  style="border-bottom: 2px solid;">

                      <div class="row ">
                        <div  class=" col-sm-6 col-md-4  col-12  ">

                          <div class="myBox">
                            <input class=" myImputField" type="text" id="nombreUsuario" name="nombre"  onkeypress="return soloLetras(event)" minlength="2" maxlength="25" required autofocus>
                            <label class="mylabel" for="nombreUsuario" >Nombre</label>
                          </div>
                        </div>

                        <div  class=" col-sm-6 col-md-4  col-12  ">

                          <div class="myBox">
                            <input class=" myImputField" type="text" id="primerApellido" name="primerApellido"  onkeypress="return soloLetras(event)" minlength="2" maxlength="25" required>
                            <label class="mylabel" for="primerApellido" >Primer Apellido</label>
                          </div>
                        </div>
                        <div  class=" col-sm-6 col-md-4  col-12  ">

                          <div class="myBox">
                            <input class=" myImputField" type="text" id="segundoApellido" name="segundoApellido"  onkeypress="return soloLetras(event)" minlength="0" maxlength="25">
                            <label class="mylabel" for="segundoApellido" >Segundo Apellido</label>
                          </div>
                        </div>


                      </div>
                      <div class="row ">

                       <div  class=" col-sm-3 col-md-4  col-12  ">

                        <div class="myBox">
                          <input class="myImputField" type="text" id="ci" name="ci" onkeypress="return soloNumero(event)" minlength="7" maxlength="10"  required>
                          <label class="mylabel" for="ci" >C.I.</label>
                        </div>
                      </div>

                      <div  class=" col-sm-3 col-md-4  col-12 d-flex justify-content-center  ">

                        <div class="row">
                         
                            <div class="myBox">
                              <input class="myImputField" type="date" id="fechaNacimiento" name="fechaNacimiento"   max="2023-08-01" value="2020-01-01"   required>
                              <label class="mylabel" for="fechaNacimiento"  >Fecha Nacimiento</label>
                           
                          </div>
                        </div>
                      </div>
                     
                    </div>


                    <div class="row t-secondary d-flex justify-content-center align-items-center">




                      <label class="form-label p-2 " for="inlineRadio3">Genero</label>


                      <div class=" p-2 form-check form-check-inline">
                        <input class="form-radio" type="radio" name="genero" id="radioF" value="f" checked>
                        <label class="form-check-label" for="radioF">Femenino</label>
                      </div>
                      <div class=" p-2 form-check form-check-inline">
                        <input class="form-radio" type="radio" name="genero" id="radioM" value="m">
                        <label class="form-check-label" for="radioM">Masculino</label>
                      </div>

                    </div>
                   
                  <div class="row ">

                   <div class=" col myborder" style=" border-bottom: 2px solid black;">  

                    <small class="t-secondary">Requesitos para acceso</small>


                  </div>

                </div>

                <div class="row">
                  <div  class=" col-sm-6 col-md-6  col-12 ">

                   <div class="myBox">
                    <input class="myImputField" type="email" id="email" name="email"  minlength="7" maxlength="25"  required>
                    <label class="mylabel" for="email" >Email</label>
                    <label class="mylabel-icon" for=""><i class="fa-solid fa-envelope"></i></label>

                  </div>
                </div>
                <div  class=" col-sm-6 col-md-6  col-12 ">
                  <div class="myBox">
                    <select class="myImputField" name="rol">

                      <option selected disabled class="bgt-acent">Seleccione ... </option>
                      <?php foreach ($rol ->result() as $row) { ?>

                        <option  class="bgt-secondary" value="<?php echo $row->id; ?> " <?php if ($row->rol == 'invitado') echo 'selected'; ?>><?php echo $row->rol; ?></option>

                      <?php  }  ?>

                    </select>
                    <label class="mylabel" for="email" >Rol Usuario</label>
                  </div>
                </div>

              </div>

            </div>
            <div class="row d-flex justify-content-around">
              <button class="btn btn-sm btnt-primary" type="submit">
                <i class="fas fa-save m-1 text-success"></i>Guardar</button>

                  <div id="alert"></div>

              </div> 




              </form>
                
              <!-- <?php echo form_close(); ?> -->
            </div>
            <!-- find agregar -->

              <script type="text/javascript">

                   
              </script>

            <!-- Inicio desabilidatos -->

            <div class="tab-pane" id="desabilitados">
              <div class="card-body m-0 p-0">

                <div>
                  Usuarios Desabilitados
                </div>

                <table class="table">
                  <thead class="t-secondary">
                    <tr>

                      <th>Numero Completo</th>
                      <th>Telefono</th>
                      <th>Cargo</th>
                      <th>Email</th>
                      <th>Rol</th>
                      <th>Usuario</th>



                      <th style="width: 10px"> Abilitar</th>


                    </tr>

                  </thead>
                  <tbody class="t-secondary-n" id="Usuariodesabilitados">


               </tbody>
             </table>
           </div>

         </div>
         <!-- find desabilitados -->
       </div>
       <!-- /.tab-content -->
     </div><!-- /.card-body -->







   </div>
   <!-- /.card -->



 </div>
</div>





</div>


</div>

</div>

</div><!-- /.container-fluid -->
</section>


</div>
<!-- /.content -->

