

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
   <h1>subir foto</h1>

   <?php echo form_open_multipart('usuario/subir') ;?>
   
    <?php 
      foreach ($idUsuario ->result() as $row) {
      
       ?>
       
       <input type="text" name="idUsuario" value=" <?php echo $row->id;?> ">

       <?php 

       } ?>
      
      <input type="file" name="archivo" placeholder="Seleccion Foto">
      <button type="submit" class="btn btn-outline-success">Subir</button>

   <?php echo form_close(); ?>
              
  </div>
  <!-- /.content-wrapper -->
 