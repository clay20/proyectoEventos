 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand bsgt-primary " style="background: #00162B ;color: #FFAB6B;"  >
  <!-- Left navbar links -->
  <a class="" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars t-acent "> </i></a>

  <div class="ml-2">
    <b>Sistema de Administración y Reserva</b>
  </div>
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
   <!-- User  -->
   <li class="nav-item dropdown">
     <a class="nav-link t-acent" data-toggle="dropdown" href="#">

       <div class="image t-acent d-flex justify-content-center align-items-center " > 
        <div style="padding-right: 5px"><?php echo $this->session->userdata('rolUsuario').' '; ?>
      </div>
      <img src="<?php echo base_url();?>/adminlti/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" style="height:30px ;">
       <div> <i class="fas fa-ellipsis-v m-2"></i>
      </div>
       </div>
      </a>

  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right bgt-primary">
   <div class="" style="height: 100px;">
     <div class="small-box  bgt-primary  "  >
       <div class="inner" >
        <div class=" row d-flex justify-content-center ">
          <div class="image ">
            <img src="<?php echo base_url();?>/adminlti/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
        </div>
        <div class="row " style="height: 100px;" >
          <div class="col-12  d-flex justify-content-center ">
            <div class="col-6 d-flex justify-content-end"><p>Usuario</p></div>
            <div class="col-6"> <h5><?php echo $this->session->userdata('nombreUsuario'); ?></h5></div>
          </div>
          <div class="col-12 d-flex justify-content-around  ">
            <div class="col-6 d-flex justify-content-end"><p>Rol</p></div>
            <div class="col-6"> <h5><?php echo $this->session->userdata('rolUsuario'); ?></h5></div>
          </div>
        </div>
      </div> 
      <div class="row d-flex justify-content-around p-2" >
       <a href="<?php echo base_url();?>index.php/usuario/datosUsuario"> <p class="nav-link-none t-acent"><i class="fas fa-edit t-acent"></i> Perfil</p>
       </a>
       <a href="<?php echo base_url();?>index.php/usuario/logout"> <p class="nav-link-none t-acent"><i class="fa-solid fa-right-from-bracket fa-beat-fade t-acent"></i>  Salir</p>
       </a>
     </div>
   </div>

 </div>

</div>

</li>
<!-- <li class="nav-item">
  <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
    <i class="fas fa-th-large t-acent anime"></i>

  </a>
</li> -->
</ul>
</nav>
<!-- /.navbar -->

