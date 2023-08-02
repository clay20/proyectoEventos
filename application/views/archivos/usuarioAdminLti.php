

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
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
              
             

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Gestionar Usuario</h3>
<br>
                        <?php echo form_open_multipart('usuario/agregar'); ?>
                            <button class="btn btn-outline-primary">Agregar</button>
                        <?php echo form_close(); ?>
                         <?php echo form_open_multipart('usuario/logout'); ?>
                            <button class="btn btn-outline-danger">Salir</button>
                        <?php echo form_close(); ?>
                       <label>
                         <?php 
                          echo $this->session->userdata('nombreUsuario');
                          echo $this->session->userdata('rolUsuario');

                         ?>
                         hol
                       </label> 

                       <a class="nav-link active" aria-current="page" href="<?php echo base_url();  ?>index.php/usuario/functionPdf" target="_blank" >Reportes de Usuarios</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
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
                    <th>Modificar</th>
                    <th>Eliminar</th>
                  </tr>
                  </thead>
                    <tbody>
                     <?php 
                    $i=1;
                    foreach ($infoUsuario->result() as $row) {
                    ?>
                        <tr>
                        <td><?php echo $i; ?></td>
                            <td><?php echo $row->nombre; ?></td>
                            <td><?php echo $row->primerApellido; ?></td>
                            <td><?php echo $row->segundoApellido; ?></td>
                        <td><?php echo $row->ci; ?></td>
                        <td><?php echo $row->sexo; ?></td>
                        <td><?php echo $row->rolUsuario; ?></td>
                        <td><?php 
                             $foto= $row->foto;
                               if ($foto=="") 
                               {
                                 ?>

                                 <img width="100" height="100" src="<?php echo base_url();?>/uploads/usuario/perfil.jpg">
                                 <?php
                               }
                               else
                               {

                                ?>

                                 <img width="100" height="100" src="<?php echo base_url();?>/uploads/usuario/<?php echo $row->$foto; ?>">
                                 <?php
                               }
                               ?>

                            <?php echo form_open_multipart('usuario/subiFoto'); ?>

                            <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                            <button type="submit" class="btn btn-outline-warning"> subir</button>
                            <?php echo form_close(); ?>

                        </td>

                        <td>
                        <?php echo form_open_multipart('usuario/buscardb'); ?>

                        <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                        <button type="submit" class="btn btn-outline-success"> Modificar</button>
                        <?php echo form_close(); ?>

                        </td>
                        <td>
                        <?php echo form_open_multipart('usuario/eliminar'); ?>

                        <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                        <button type="submit" class=" btn btn-outline-danger"> Eliminar</button>
                        <?php echo form_close(); ?>
                        </td>

                        <?php 
                        
                        $i++;} 
                        ?>
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
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 