

<div class="wrapper" style="background-image: url('<?php echo base_url();?>/img/fondo.jpg');">

  <div class="content-wrapper"   style=" background:rgba(0, 0, 0, .3);">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-sm-12 d-flex justify-content-start text-light">
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
            <div class="card " style="background: rgba(0, 0, 0, .0);">
              <div class="card-header  p-0 bgt-acent ">
                <ul class="nav nav-pills p-0">
                  <li class="nav-item"><a class="nav-link active " href="#listaCliente"  id="listaclientelink" data-toggle="tab">Lista</a></li>
                  <li class="nav-item"><a class=" nav-link " href="#agregarCliente" id="agregarclientelink"  data-toggle="tab">Agregar</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body m-0 p-0 px-1 "style="background: rgba(251, 214, 169, .2);">
                <div class="tab-content m-0 p-0">
                  <div class="active tab-pane" id="listaCliente">
                    <!-- Post -->
                    
                      <div class=" d-flex justify-content-end m-0 p-0" >
                      <div class="myBox">
                        
                      <input class="myImputField form-control-sm" type="search" id="buscarCliente" name="">
                      <label class="mylabel-icon"><i class="fas fa-search"></i></label>
                      </div>
                    </div>
                    <div class="card-body m-0 p-0" style="height: 60vh;">
                      <table id="" class="table table-sm"  style="color: #001f3f;">
                        <thead>
                          <tr class="">
                            <th>Nro</th>
                            <th>Nombre Completo</th>
                            
                            <th>Ci</th>

                            <th> Telefono</th>

                            <th width="30px">Acciones</th>
                          </tr>
                        </thead>
                        <tbody id="tbCliente" style="color: #001f3f;">




                        </tbody>

                      </table>
                    </div>



                  </div>

                  <div class="tab-pane " id="agregarCliente">
                    <!-- Post -->                  
                    <form id="nuevoCliente">

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
              <div class="row d-flex justify-content-around m-3">
                <button class="btn btn-sm btnt-primary btn-save" type="submit">
                  <i class="fas fa-save"></i>Guardar</button>

                  <button class="btn btn-sm btnt-primary" type="button" onclick="limmpiarCampos()"><i class="fas fa-times"></i>limpiar</button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>


</div>
</section>

<div class="modal modal-primary" id="ModificarCliente" aria-hidden="true"  data-backdrop="static"  >
  <div class="modal-dialog modal-dialog-centered" >
    <div class="modal-content bgt-secondary" >
      <div class="modal-header bgt-primary" >
        <div class="container">
          <div class="row">

            <h5 class="modal-title">Modificar Datos <span id="titleModalDay">Nombre</span></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span  aria-hidden="true">×</span></button>
            </div>
          </div>
        </div>
        <div class="modal-body">
            <form id="forModificarCliente">

                    <!-- Post -->        

                    <div class="row">

                      <div class=" col-md-12 ">
                       <div class="myBox">
<input type="hidden" name="id" id="idM">
                        <input  class="myImputField" type="text" name="nombre" id="txtNombreM" onkeypress="return soloLetrasEspacio(event)" minlength="1" maxlength="25" required autofocus />
                        <label class="mylabel" for="">Nombre</label>


                      </div>
                    </div>
                    <div class=" col-sm-12 col-md-6">
                     <div class="myBox">

                      <input  class="myImputField form-control-md" type="text" name="primerApellido" id="txtApellido1M" onkeypress="return soloLetrasEspacio(event)" minlength="1" maxlength="25" required  />
                      <label class="mylabel" for="">Primer Apellido</label>


                    </div>
                  </div>
                  <div class=" col-sm-12 col-md-6 ">
                   <div class="myBox">

                    <input  class="myImputField form-control-sm" type="text" name="segundoApellido" id="txtApellido2M" onkeypress="return soloLetrasEspacio(event)" minlength="1" maxlength="25"  />
                    <label class="mylabel" for="">Segundo Apellido</label>
                  </div>
                </div>
              </div>
              <div class="row">
               <div class=" col-md-12 col-sm-12">
                 <div class="myBox">

                  <input  class="myImputField" type="text" name="ci" id="txtCiM" onkeypress="return LetrasNumero(event)" minlength ="1" maxlength ="9"  required  />
                  <label class="mylabel" for="">C.I.</label>
                  <label class="mylabel-icon" for=""><i class="fa-solid fa-id-card"></i></label>

                </div>
              </div>
              <div  class=" col-sm-12 col-md-6  ">
                <div class="myBox">

                  <input  class="myImputField" type="text" name="celular" id="txtCelularM" onkeypress="return soloNumero(event)" minlength ="1" maxlength ="9"  required  />
                  <label class="mylabel" for="">Celular</label>
                  <label class="mylabel-icon" for=""><i class="fa-solid fa-mobile-retro"></i></label>

                </div>
              </div>
              <div  class=" col-sm-12 col-md-6">
                <div class="myBox">

                  <input  class="myImputField" type="text" name="telefono" id="txtTelefonoM"  onkeypress="return soloNumero(event)"minlength ="1" maxlength ="9"/>
                  <label class="mylabel" for="">Telefono</label>
                  <label class="mylabel-icon" for=""><i class="fa-solid fa-phone"></i></label>

                </div>
              </div>
            </div>
          <div class="row d-flex justify-content-around m-3">
            <button class="btn btn-sm btnt-primary btn-save" type="submit">
              <i class="fas fa-save"></i>Guardar</button>

              <button class="btn btn-sm btnt-primary" type="button" onclick="limmpiarCamposModal()"><i class="fas fa-times"></i>limpiar</button>
            </div>
             
          </form>



        </div>        

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


</div>




