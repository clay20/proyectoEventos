
<div class="wrapper" style="background: #C69F74;">

  <div class="content-wrapper"   style=" background-image: url('<?php echo base_url();?>/img/fondo.jpg');">
    <!--  (cabecera header) -->
    <section class="content-header">


      <div class="row">
        <h1 class="t-primary" > Reservas</h1>
      
      </div>


    </section>
    <section style="background:rgba(255, 255, 255, .2); height: 80vh;" >
       <div class="container-fluid">

        <div class="card " style="background:rgba(0, 0, 0, .2);" >
          <div class="card-header p-0 bgt-acent" >
            <ul class="nav nav-pills">

              <li class="nav-item"><a class="nav-link " href="#tabUsuarios" id="tabUsuariosLink" data-toggle="tab">reservas</a></li>
              <li class="nav-item"><a class="nav-link  active" href="#agregarUsuario" id="agregarUsuarioLink" data-toggle="tab">Agregar </a></li>
              <li class="nav-item"><a class="nav-link" href="#desabilitados" data-toggle="tab">cancelado</a></li>
            </ul>
          </div> 
           <div class="tab-content ">
             <div class="tab-pane  " id="tabUsuarios">
               <div class="row d-flex justify-content-end">
                <div class="myBox">
                  <label class="mylabel-icon"><i class="fas fa-search"></i></label>
                  <input id="buscarUsuario" class="myImputField" type="search" name="buscarUsuario" >
                </div>
              </div>
            </div>
            <div class="tab-pane active " id="agregarUsuario">
               <div class="row d-flex justify-content-end">
                <div class="myBox">
                 <label>Seleccionar Fecha</label>
                 <button>Calendario</button>
                </div>
              </div>
              <div class="row ">
               <div class="col d-flex justify-content-center">
                  <label>Fecha reserva</label>
                <input type="date" value="2020-01-01" disabled name="">
               </div>
              </div>
              <br>
               <div class="row ">
               <div class="col-12 d-flex justify-content-start" style="background:rgba(0, 0, 0, .1);">
                  <label>Buscar cliente</label>

                <input type="text" value="" list="listCliente" placeholder="Buscar cliente" name="">

                <datalist id="listCliente">
                  <option>Cliente 1</option>
                  <option>Cliente 2</option>
                  <option>Cliente 3</option>

                </datalist>
                <button type="button">NuevoCliente</button>
                <label>minima</label>
                <input type="text" value="100"  placeholder="min"  name="" style="width:40px" disabled>
                <label>maxima </label>
                <input type="text" value="400"  placeholder=""  name="" style="width:40px" disabled>
                <label>Nro Invitado</label>
                <input type="text" name=""  style="width:40px">

               </div>
              </div>
               <label class="">NOmbre clientes </label>
              <div class="row">
              
              </div>
               <div class="row ">
               <div class="col-12 d-flex justify-content-center">
                  <label>servicios</label>
                <input type="text" value="" list="listaServicio" placeholder="Buscar Servicio" name="">
                <datalist id="listaServicio">
                  <option>servicio 1</option>
                  <option>servicio 2</option>
                  <option>servicio 3</option>

                </datalist>
              
               </div>
              </div>
             
              <h3 class="t-primary">detalle</h3>
              <div class="row">
                <div class="col-8">
                  
                   <table class="table">
                     <thead>
                      <tr>
                        <th>Servicio</th>
                        <th>total</th>

                      </tr>
                      <tr>
                        <td>Local </td>
                        <td>3000bs </td>

                      </tr>
                      <tr>
                         <th>Servicio</th>
                        <th>total</th>
                      </tr>

                     </thead>
                   </table>
                </div>
                <div class="col-4" style="background:rgba(0, 0, 0, .2);">
                  <div class="row"><label>Lista de servicios</label></div>
                  <ul>
                    <li>Servicio 1 <input type="checkbox" name=""></li>
                    <li>Servicio 1 <input type="checkbox" name=""></li>
                    <li>Servicio 1 <input type="checkbox" name=""></li>
                    <li>Servicio 1 <input type="checkbox" name=""></li>
                    <li>Servicio 1 <input type="checkbox" name=""></li>
                    <li>Servicio 1 <input type="checkbox" name=""></li>

                  </ul>
                </div>
              </div>
            </div>
            <div class="tab-pane " id="desabilitados">
               <div class="row d-flex justify-content-end">
                <div class="myBox">
                  <label>cancelaod</label>
                </div>
              </div>
            </div>
           </div>
        </div>
      </div>
      
    </section>

  </div>
</div>