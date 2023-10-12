
<div class="wrapper" style="background: #C69F74;">

  <div class="content-wrapper"   style=" background-image: url('<?php echo base_url();?>/img/fondo.jpg');">
    <!--  (cabecera header) -->
    <!-- Content Header (Page header) -->
    <section class="content-header p-1">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-12 t-primary">
            <h1>Servicios</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-12">
            <div class="card " style="background:rgba(0, 0, 0, .2);" >
              <div class="card-header p-0 ">

                <ul class="nav nav-pills p-0 " style="background:rgba(0, 0, 0, .4);">
                  <li class="nav-item"><a class="nav-link active" href="#listaServicios" id="listaServicioLink" data-toggle="tab">Servicios</a></li>
                  <li class="nav-item"><a class=" nav-link " href="#agregarServicios" id="agregarServiciolink" data-toggle="tab">Agregar</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body m-0 p-0">
                <div class="tab-content m-0 p-0">
                  <div class="tab-pane active" id="listaServicios">
                    <!-- Post -->
                     <div class=" d-flex justify-content-end m-0 p-0" >
                      <div class="myBox">
                        
                      <input class="myImputField form-control-sm" type="text" id="buscarCliente" name="" maxlength="18">
                      <label class="mylabel-icon"><i class="fas fa-search"></i></label>
                      </div>
                    </div>
                    <div style="height: 60vh; overflow-y: auto;">
                      <div class="card-body m-0 p-0" >
                        <table id="example11" class="table table-sm  " rules="rows">
                          <thead>
                            <tr>
                              <th>Nro</th>
                              <th>Servicios</th>
                              <th>unidad Medida</th>
                              <th>Precio</th>
                                <th>Cant.Maxima</th>
                              <th> Descriccion</th>
                               
                              <th colspan="2" style="width:20px">acciones</th>

                            </tr>
                          </thead>
                          <tbody  id="servicioT">
                          </tbody>

                        </table>
                      </div>
                    </div>


                    <form id="formModificarProveedor">
                     <div class="modal modal-primary" id="modificarServicio" aria-hidden="true"  data-backdrop="static"  >
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

                              <div class="row  d-flex" >
                                <div  class="col-12 ">
                                  <div class="myBox">
                                    <input class=" myImputField" type="text" id="nombreServicio" name="nombreServicio"  onkeypress="return soloLetrasEspacio(event)" minlength="2" maxlength="25"  required autofocus>
                                    <label class="mylabel" for="nombreServicio" >Nombre de servicio</label>
                                  </div>
                                </div>

                              </div>

                              <div class="row " >
                                <div  class="col-12 ">
                                  <div class="myBox">
                                    <select class=" myImputField" type="text" id="medida" name="medida" value="" onkeypress="return LetrasNumero(event)" minlength="2" maxlength="50" required autofocus>
                                       <option>dia</option>
                                      <option>persona</option>
                                    </select>

                                    <label class="mylabel" for="medida" >Unidad Medida</label>
                                   
                                  </div>
                                </div>
                                <div  class="col-12 ">
                                  <div class="myBox">
                                    <input class=" myImputField" type="text" id="precio" name="precio" value="" onkeypress="return soloNumeroPunto(event)" minlength="2" maxlength="50" required autofocus>

                                    <label class="mylabel" for="precio" >Precio</label>
                                  </div>
                                </div>
                                <div class="row  d-flex " >
                                  <div  class="col-12 ">
                                    <div class="myBox">
                                      <input class=" myImputField" type="text" id="descripcion" name="descripcion"  onkeypress="return soloLetrasEspacio(event)" minlength="1" maxlength="200" required autofocus>
                                      <label class="mylabel" for="descripcion" >Descriccion</label>
                                    </div>
                                  </div>




                                </div>


                              </div> 



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
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="agregarServicios">
                    <!-- The timeline -->
                    <form class="form-horizontal " id="agregarServicio">
                     <div class="row ">
                      <div class="col-12 col-sm-12 col-md-6 p-1">
                        <div  style="background: rgba(255, 171, 107, .3);height: 65vh;" >



                          <div class=" col-12  d-flex  justify-content-center align-items-center p-0" >
                            <div class="col-12">
                           
                            <div class="row  d-flex" >
                              <div  class="col-12 ">
                                <div class="myBox">
                                  <input class=" myImputField" type="text" id="nombreServicio" name="nombreServicio"  onkeypress="return soloLetrasEspacio(event)" minlength="2" maxlength="25"  required autofocus>
                                  <label class="mylabel" for="nombreServicio" >Nombre de servicio</label>
                                </div>
                              </div>

                            </div>
                            <div class="row " >
                              <div  class="col-12 ">
                                <div class="myBox">
                                  <input class=" myImputField" type="text" id="descripcion" name="descripcion"  onkeypress="return soloLetrasEspacio(event)" minlength="2" maxlength="225" required autofocus>
                                  <label class="mylabel" for="descripcion" >Descriccion</label>
                                </div>
                              </div>
                            </div>
                            <div class="row " >
                              <div  class="col-12 ">
                                <div class="myBox">
                                  <select class=" myImputField" type="text" id="medida" name="medida" value="" onkeypress="return LetrasNumero(event)" minlength="2" maxlength="50" required autofocus><option>dia</option>
                                      <option selected>persona</option></select>

                                  <label class="mylabel" for="medida" >Unidad Medida</label>
                                </div>
                              </div>
                              <div  class="col-12 ">
                                <div class="myBox">
                                  <input class=" myImputField" type="text" id="precio" name="precio" value="" onkeypress="return LetrasNumero(event)" minlength="1" maxlength="5" required autofocus>

                                  <label class="mylabel" for="precio" >Precio</label>
                                </div>
                              </div>
                               <div  class="col-12 ">
                                <div class="myBox">
                                  <input class=" myImputField" type="text" id="maximo" name="maximo" value="" onkeypress="return soloNumero(event)" minlength="1" maxlength="3" required autofocus>

                                  <label class="mylabel" for="maximo" >Cantidad Maxima Servicio</label>
                                </div>
                              </div>
                            </div> 
                            <div class= " row m-3 d-flex justify-content-around">

                             <button class="btn btnt-primary">Guardar</button>

                           </div>
                         </div>

                       </div>
                     </div>
                   </div>
                   <div class="col-12 col-sm-12 col-md-6 p-1">
                    <div  style="background: rgba(0, 0, 0, .3); height: 65vh;">

                      <div class="t-secondary"><h6 >Seleccionar Proveedor</h6></div>

                      <div style="height: 60vh; overflow-y: auto;">
                        <div class="card-body m-0 p-0">

                          <table id="example11" class="table  ">

                            <tbody id="proveedorT">

                            </tbody>

                          </table>
                        </div>
                      </div>

                      <!-- nombreServicio -->
                    </div>
                  </div>

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

</div>


</div>

