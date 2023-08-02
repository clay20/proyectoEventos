
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Agregar Usuario</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">home</a></li>
              <li class="breadcrumb-item active">ver por</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       

      
        <div class="row flex-lg-row flex-column-reverse p-2"  >
          <div class="col-lg-8  col-12  "  >
            <!-- small card -->
            <div class="small-box bg-primary " >
              <div class="inner">
               

                <div class="row">
                  <div class="col-12">
            <div class="card ">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#agregarUsuario" data-toggle="tab"><i class="fas fa-user-plus"></i>Agregar </a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Gestion Usuario</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Usuario Desabilitados</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

               
                  <div class="active tab-pane" id="agregarUsuario">
                    <!-- Post -->
                       <?php  echo form_open_multipart('usuario/agregarUsuario'); ?>
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
                        <div  class=" col-sm-6 col-md-6  col-12  ">
                          <label class="col form-label " for="nombreUsuario" >C.I</label>
                          <br>
                          <input class="col form-control form-control-sm" type="text" id="nombreUsuario" name="ci" placeholder="Cedula Identidad" required autofocus>
                        </div>
                        <div  class=" col-sm-6 col-md-6  col-12 ">
                          <div class="form-group">
                            
                         
                          <label class="form-label" > Fecha Nacimiento</label>
                          <input class="form-control form-control-sm" type="date" name="fechaNacimiento" placeholder="dd/mm/yy" required>
                        </div>
                        </div>
                        
                    </div>
                    <div class="row ">
                       

                            <div class="col form-check form-check-inline d-flex justify-content-end">
                              
                              <label class="form-label" for="inlineRadio3">Genero</label>
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
                          <label class="col form-label " for="nombreUsuario" >Celular</label>
                          
                          <input class="col form-control form-control-sm" type="text" id="nombreUsuario" name="celular" placeholder="Celular" required autofocus>
                        </div>
                        <div  class=" col-sm-6 col-md-6  col-12 ">
                          <div class="form-group">
                            
                         
                          <label class="form-label" >Telefono</label>
                          <input class="form-control form-control-sm" type="text" name="telefono" placeholder="Telefono" required>
                        </div>
                        </div>
                        
                       </div>
                       <div class="row">
                        <div  class=" col-sm-6 col-md-6  col-12  ">
                          <label class="col form-label-sm " for="nombreUsuario" >email</label>
                          
                          <input class="col  form-control form-control-sm" type="email" id="nombreUsuario" name="email" placeholder="nombre@gmail.com" required autofocus>
                        </div>
                        <div  class=" col-sm-6 col-md-6  col-12 ">
                          <div class="form-group">
                            
                         
                          <label class="form-label" >Rol Usuario</label>
                          

                          <select class="form-control form-control-sm" name="rol">

                            <option selected disabled >Seleccione ... </option>
                            <?php foreach ($rol ->result() as $row) {
                              ?>

                                <option  value="<?php echo $row->id; ?>"><?php echo $row->rol; ?></option>
                               

                              <?php

                            } 
                            ?>
                            

                          </select>
                        </div>
                        </div>
                       
                       </div>
                       <div class="row d-flex justify-content-around">
                        <button class="btn btn-sm btn-outline-success btn-save" type="submit">
                        <i class="fas fa-save"></i>Guardar</button>



                        <button class="btn btn-sm btn-outline-warning" type="submit"><i class="fas fa-times"></i>Cancelar</button>
                        <button class="btn btn-sm btn-outline-info" type="submit"><i class="fas fa-times"></i>Limpiar</button>

                       </div>
                      

                     
                    </div>
                    <!-- /.post -->

                     <?php echo form_close(); ?>
                  </div>
                 


                   <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                       <div class="row  ">
                    
                     <div class="col-lg-6 col-12 "  >
                      <label class="form-label" >Usuario</label>
                      <input type="text" class="form-control" name="" placeholder="Usuario">
                    </div><div class="col-lg-6 col-12">
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


          <!-- ./col -->
          <div class="col-lg-4 col-md-12  col-sm-12    " >
            <!-- small card -->
            <div class="small-box  "  style="height:400px">
              
                
              
                   <div class="inner" >
                  <div class=" row d-flex justify-content-center">
                    <div class="image ">
                          <img src="<?php echo base_url();?>/adminlti/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                  </div>
                  <div class="row" style="height: 200px;">
                    <div class="small-box col bg-primary">
                      <h5><?php echo $this->session->userdata('nombreUsuario'); ?></h5>
                    </div>
                    <div class="small-box col bg-primary">
                      <h5><?php echo $this->session->userdata('nombreUsuario'); ?></h5>
                    </div>
                  </div>
                 
                   
                
            </div>
          </div>
          
        </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

