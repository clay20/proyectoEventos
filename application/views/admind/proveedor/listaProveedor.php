

<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-sm-12">
            <h1>Proveedores</h1>
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
                  <li class="nav-item"><a class="nav-link active " href="#activity" data-toggle="tab">Proveedores</a></li>
                  <li class="nav-item"><a class=" nav-link" href="#timeline" data-toggle="tab"><button class="btn btn-outline-primary btn-sm">Agregar</button></a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Eliminados</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                   
                    
                          <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped ">
                              <thead>
                              <tr>
                                <th>Numero</th>
                                <th>Nombre</th>
                                <th>Primer Apellido</th>
                                <th>Segundo Apellido</th>
                                <th>Ci</th>
                                <th>Sexo</th>
                                <th>Rol Usuario</th>
                                  <th>Foto</th>
                                <th><i class="fa-solid fa-file-pen fa-md text-warning  d-flex justify-content-center"></i></th>
                                <th><i class="fa-solid fa-trash fa-md text-danger d-flex justify-content-center"></i></th>
                              </tr>
                              </thead>
                                <tbody>
                                <tr>
                              <td>fdfd</td>
                               <td>fdfd</td>
                               <td>fdfd</td>
                               <td>fdfd</td>
                               <td>fdfd</td>
                               <td>fdfd</td>
                               <td>fdfd</td>
                               <td>fdfd</td>
                               <td class="" title="Modificar"> <?php echo form_open_multipart('proveedor/modificar'); ?>
                                        <button class="btn btn-outline-warning btn-ls "><i class="fa-solid fa-file-pen fa-md"></i></button>
                                    <?php echo form_close(); ?></td>
                               <td class="" title="Eliminar"> <?php echo form_open_multipart('proveedor/eliminar'); ?>
                                        <button class="btn btn-outline-danger btn-ls"><i class="fa-solid fa-trash fa-md"></i></button>
                                    <?php echo form_close(); ?></td>
                               
                                </tr>

                                </tbody>
                              <tfoot>
                              <tr>
                                <th>Numero</th>
                                <th>Nombre</th>
                                <th>Primer Apellido</th>
                                <th>Segundo Apellido</th>
                                <th>Ci</th>
                                <th>Sexo</th>
                                <th>Rol Usuario</th>
                                <th>Foto</th>
                                <th>Modificar</th>
                                <th>Eliminar</th>
                              </tr>
                              </tfoot>
                            </table>
                          </div>
                          
                   

                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <form class="form-horizontal">
                       <div class="row  ">
                    
                     <div class="col-lg-6 col-12 "  >
                      <label class="form-label" >Usuario</label>
                      <input type="text" class="form-control" name="" placeholder="Usuario">
                    </div>
                    <div class="col-lg-6 col-12">
                      <label>Usuario</label>
                    <input type="text" class="form-control" name="" placeholder="Usuario">
                    </div> 
                    
                </div>
                      <div class="row  ">
                    
                     <div class="col-lg-4 col-12 ">
                      <label class="form-label" >Nombre</label>
                    <input type="text" class="form-control" name="" placeholder="Nombre">
                    </div><div class="col-lg-4 col-12">
                     <label class="form-label" >Primer Apellido</label>
                    <input type="text" class="form-control" name="" placeholder="Primer Apellido">
                    </div> 
                    <div class="col-lg-4 col-12">
                     <label class="form-label" >Segunndo Apellido</label>
                    <input type="text" class="form-control" name="" placeholder="Segundo Apellido">
                    </div> 
                    </div>
                     <div class="row  ">
                    
                     <div class="col-lg-4 col-12 ">
                      <label class="form-label" >Nombre</label>
                    <input type="text" class="form-control" name="" placeholder="Nombre">
                    </div><div class="col-lg-4 col-12">
                     <label class="form-label" >Primer Apellido</label>
                    <input type="text" class="form-control" name="" placeholder="Primer Apellido">
                    </div> 
                    <div class="col-lg-4 col-12">
                     <label class="form-label" >Segunndo Apellido</label>
                    <input type="text" class="form-control" name="" placeholder="Segundo Apellido">
                    </div> 
                    </div>
                   <div class="row">
                            <div class="col-lg-8 col-12">
                              
                            </div>
                            <div class=" col-lg-4 col-12">
                              <button class="btn btn-primary">Actualizar</button>
                            </div> 
                        </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped ">
                              <thead>
                              <tr>
                                <th>Numero</th>
                                <th>Nombre</th>
                                <th>Primer Apellido</th>
                                <th>Segundo Apellido</th>
                                <th>Ci</th>
                                <th>Sexo</th>
                                <th>Rol Usuario</th>
                                  <th>Foto</th>
                                <th >
                                  <i class="fa-solid fa-share-from-square  text-success  d-flex justify-content-center"></i>
                                </th>
                              </tr>
                              </thead>
                                <tbody>
                                <tr>
                              <td>fdfd</td>
                               <td>fdfd</td>
                               <td>fdfd</td>
                               <td>fdfd</td>
                               <td>fdfd</td>
                               <td>fdfd</td>
                               <td>fdfd</td>
                               <td>fdfd</td>
                               <td class=" justify-content-center d-flex justify-content-center "> <?php echo form_open_multipart('proveedor/recuperar'); ?>
                                        <button class="btn btn-outline-success btn-ls "><i class="fa-solid fa-share-from-square fa-bounce"></i></button>
                                    <?php echo form_close(); ?></td>
                              
                               
                                </tr>

                                </tbody>
                              <tfoot>
                              <tr>
                                <th>Numero</th>
                                <th>Nombre</th>
                                <th>Primer Apellido</th>
                                <th>Segundo Apellido</th>
                                <th>Ci</th>
                                <th>Sexo</th>
                                <th>Rol Usuario</th>
                                <th>Foto</th>
                                <th>Restaurar</th>
                                
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




