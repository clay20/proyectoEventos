 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-info elevation-5 sideba-mini bgt-primary "  style=" background-image: url('<?php echo base_url();?>/img/aside.jpeg');" >

    <!-- Sidebar -->
    <div class="sidebar ">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 pt-3 " >

        <div class="container ">
          <div class="row ">
            <div class="col-12 d-flex justify-content-center ">
             <a href="<?php echo base_url();?>index.php/usuarioInvitado/homeInvitado">   <img src="<?php echo base_url();?>/adminlti/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class=" img-circle elevation-3 " style="opacity: .8 ;height: auto ; width: 60px;"></a>


           </div >
           <div class="col-12 d-flex justify-content-center">
            <span class=" brand-text t-primary" style="color:white; font-size:25px;"><b>Eventos Andrea</b></span></div>
          </div>
          
        </div>
        
      </div>

     
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
           <li class="nav-item" style="opacity:100">
            <a href="<?php echo base_url();?>index.php/usuarioInvitado/homeInvitado" class="nav-link">
              <i class="fa-solid fa-house fa-beat t-acent"></i>
              <p class="t-primary" ></i><b>Inicio</b></p>
            </a>

          </li>
          <li class="nav-item">
            <a href="<?php echo base_url();?>index.php/usuarioInvitado/calendario" class="nav-link">
              <i class="nav-icon far fa-calendar-alt t-acent"></i>
              <p class="t-primary">Calendario</p>
            </a>

          </li>
          <li class="nav-item" >
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar-plus t-acent"></i>
              <p class="t-primary">
                Eventos
                <i class="right fas fa-angle-left  "></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="margin-left:10px">
              <li class="nav-item" >
                <a href="<?php echo base_url();?>/adminlti/index.html" class="nav-link">
                  <i class='bx bx-calendar-edit' style="color:red"></i>

                  <p>Gestionar Eventos</p>

                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>/adminlti/index2.html" class="nav-link">
                  <i class='bx bxs-edit'></i>
                  <p>Gestion Alquiler</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>/adminlti/index3.html" class="nav-link">

                  <i class='bx bxs-calendar-exclamation'></i>
                  <p>Reserva</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item" >
            <a href="#" class="nav-link">
              <i class="nav-icon fa-solid fa-file-invoice-dollar t-acent"></i>
              <p class="t-primary">
                Cotizaciones
                <i class="right fas fa-angle-left  "></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="margin-left:10px">
              <li class="nav-item" >
                <a href="<?php echo base_url();?>/adminlti/index.html" class="nav-link">

                  <p>Cotizaciones</p>

                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>/adminlti/index2.html" class="nav-link">
                  <i class='bx bxs-edit'></i>
                  <p>Paquetes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>/adminlti/index3.html" class="nav-link">

                  <i class='bx bxs-calendar-exclamation'></i>
                  <p>Servicios</p>
                </a>
              </li>
            </ul>
          </li>

         
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-tie t-acent"></i>
              <p class="t-primary">
                Clientes
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview" style="margin-left:10px">

              <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/cliente/index" class="nav-link">
                  <i class='bx bxs-edit'></i>

                  <p>Nuevo Cliente</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>/adminlti/index3.html" class="nav-link">

                  <i class='bx bxs-calendar-exclamation'></i>
                  <p>Historial Registro</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-truck t-acent"></i>
              <p class="t-primary">
                Proveedores
                <i class="fas fa-angle-left right "></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview" style="margin-left:10px">
              <li class="nav-item" >
                <a href="<?php echo base_url();?>index.php/proveedor/index" class="nav-link">
                  <i class='bx bx-calendar-edit' style="color:red"></i>
                  <p>Proveedores</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>/adminlti/index2.html" class="nav-link">
                  <i class='bx bxs-edit'></i>
                  <p>Nuevo</p>
                </a>
              </li>
              
            </ul>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-people-carry t-acent"></i>
                <p class="t-primary">
                  Empleados
                  <i class="fas fa-angle-left right "></i>

                </p>
              </a>
              <ul class="nav nav-treeview" style="margin-left:10px">
                <li class="nav-item" >
                  <a href="<?php echo base_url();?>index.php/empleado/index" class="nav-link">
                    <i class='bx bx-calendar-edit' style="color:red"></i>

                    <p>Empleado</p>

                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url();?>/adminlti/index2.html" class="nav-link">
                    <i class='bx bxs-edit'></i>
                    <p>Nuevos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url();?>/adminlti/index3.html" class="nav-link">

                    <i class='bx bxs-calendar-exclamation'></i>
                    <p>nnnnnnnn</p>
                  </a>
                </li>
              </ul>


            </li>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clipboard-list t-acent"></i>
              <p class="t-primary">
                Servicios
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview" style="margin-left:10px">
              <li class="nav-item" >
                <a href="<?php echo base_url();?>/adminlti/index.html" class="nav-link">
                  <i class='bx bx-calendar-edit' style="color:red"></i>

                  <p>Agregar Servicio</p>

                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>/adminlti/index2.html" class="nav-link">
                  <i class='bx bxs-edit'></i>
                  <p>Servicio</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>/adminlti/index3.html" class="nav-link">

                  <i class='bx bxs-calendar-exclamation'></i>
                  <p>Servicios de baja</p>
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