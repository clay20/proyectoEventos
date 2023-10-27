 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-info elevation-5 sideba-mini bgt-primary "  style=" background-image: url('<?php echo base_url();?>/img/asideA.png');" >

    <!-- Sidebar -->
    <div class="sidebar ">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 pt-3 " >

        <div class="container ">
          <div class="row ">
            <div class="col-12 d-flex justify-content-center ">
             <a href="<?php echo base_url();?>index.php/usuario/homeAdmind">   <img src="<?php echo base_url();?>/adminlti/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class=" img-circle elevation-3 " style="opacity: .8 ;height: auto ; width: 60px;"></a>


           </div >
           <div class="col-12 d-flex justify-content-center">
            <span class=" brand-text " style="color:#FFAB6B; font-size:25px;"><b>Eventos Andrea</b></span></div>
          </div>
          
        </div>
        
      </div>

    
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
           <li class="nav-item " >
            <a href="<?php echo base_url();?>index.php/usuario/homeAdmind" class="nav-link active">
              <i class="fa-solid nav-icon fa-house  t-acent"></i>
              <p class="t-primary" ><b>Inicio</b></p>
            </a>

          </li>

         

          <li class="nav-item">
            <a href="<?php echo base_url();?>index.php/usuario/calendario" class="nav-link">
              <i class="fa-solid nav-icon far fa-calendar-alt t-acent"></i>
              <p class="t-primary"><b>Calendario</b></p>
            </a>

          </li>
          <li class="nav-item" >
            <a href="<?php echo base_url();?>index.php/reservas/index" class="nav-link">
              <i class="nav-icon fas fa-calendar-plus t-acent"></i>
              <p class="t-primary">
                Eventos
              
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url();?>index.php/usuario/agregarView" class="nav-link">
              <i class="nav-icon fas fa-users t-acent"></i>
              <p class="t-primary">
                Usuarios
              
              </p>
            </a>
          </li>

          
          <li class="nav-item">
            <a href="<?php echo base_url();?>index.php/cliente/index" class="nav-link">
              <i class="nav-icon fas fa-user-tie t-acent"></i>
              <p class="t-primary">
                Clientes
             
                
              </p>
            </a>
           
          </li>

         <!--  <li class="nav-item">
            <a href="<?php echo base_url();?>index.php/proveedor/index" class="nav-link">
              <i class="nav-icon fas fa-truck t-acent"></i>
              <p class="t-primary">
                Proveedores
               
              </p>
            </a>
             </li>
            <li class="nav-item">
              <a href="<?php echo base_url();?>index.php/empleado/index" class="nav-link">
                <i class="nav-icon fas fa-people-carry t-acent"></i>
                <p class="t-primary">
                  Empleados
                

                </p>
              </a>
              
           
          </li> -->
          <li class="nav-item">
            <a href="<?php echo base_url();?>index.php/servicios/index" class="nav-link">
              <i class="nav-icon fas fa-clipboard-list t-acent"></i>
              <p class="t-primary">
                Servicios
                
              </p>
            </a>
          
            
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-alt t-acent"></i>
              <p class="t-primary">
                Reportes
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview" style="margin-left:10px">
              <li class="nav-item" >
                <a href="<?php echo base_url();?>index.php/reportes/index" class="nav-link">
                  <i class='bx bx-calendar-edit' style="color:red"></i>

                  <p>Servicios </p>

                </a>
              </li>
            </ul>

            
          </li>
          <li class="nav-item">

           <a href="<?php echo base_url();?>index.php/usuario/logout" class="nav-link">
            <i class="nav-icon fas fa-power-off t-acent"></i>
            <p>
              Salir
              <i class="fas  right "><button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button></i>
            </p>
          </a>           

        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var links = document.querySelectorAll('.nav-item');

    links.forEach(function(link) {
        link.addEventListener('click', function() {
            // Eliminar la clase active de todos los elementos de menú
            links.forEach(function(link) {
                link.classList.remove('active');
            });

            // Agregar la clase active al elemento de menú actual
            link.classList.add('active');
        });
    });
});
</script>