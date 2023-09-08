
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"   style=" background-image: url('<?php echo base_url();?>/img/fondo.jpg'); background-repeat: no-repeat">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 t-primary">
            <h1>Perfil</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row flex-lg-row flex-column-reverse p-0"  >
          <div class="col-lg-8  col-12  "  >
            <!-- small card -->
            <div class="small-box  d-flex align-items-end "  style="background:rgba(0, 0, 0, .4);" >
              <div class="inner" style=" width: 100%;height: 60vh;">

                <div class="card-body t-primary" style="height: 85%;">
                  <div class="tab-content">

                    <!-- Inicio usuarios -->
                    <div class="tab-pane active " id="datosPersonales" >
                      <div class="row " >
                        <h4 class="col-12 "> <b>Datos personales</b></h4>
                      </div>
                      <?php foreach ($datos->result() as $row) { ?>
                        <div class="row " >

                          <p class="col-6 d-flex justify-content-end">Nombre</p>
                          <p id="nombreP" class="col-6 d-flex justify-content-start"><?php echo $row->nombre; ?></p>

                        </div>
                        <div class="row " >

                          <p class="col-6 d-flex justify-content-end">Primer Apellido</p>
                          <p id="nombreP" class="col-6 d-flex justify-content-start"><?php echo $row->primerApellido; ?></p>

                        </div> <div class="row " >

                          <p class="col-6 d-flex justify-content-end">Segundo Apellido</p>
                          <p id="nombreP" class="col-6 d-flex justify-content-start"><?php echo $row->segundoApellido; ?></p>

                        </div> <div class="row " >

                          <p class="col-6 d-flex justify-content-end">Cedula Identidad</p>
                          <p id="nombreP" class="col-6 d-flex justify-content-start"><?php echo $row->ci; ?></p>

                        </div> <div class="row " >

                          <p class="col-6 d-flex justify-content-end">Sexo</p>
                          <p id="nombreP" class="col-6 d-flex justify-content-start"><?php echo $row->sexo; ?></p>

                        </div> <div class="row " >

                          <p class="col-6 d-flex justify-content-end">Fecha Nacimiento</p>
                          <p id="nombreP" class="col-6 d-flex justify-content-start"><?php echo $row->fechaNacimiento; ?></p>

                        </div> <div class="row " >

                          <p class="col-6 d-flex justify-content-end">Coorreo</p>
                          <p id="nombreP" class="col-6 d-flex justify-content-start"><?php echo $row->email; ?></p>

                        </div>

                      <?php  }  ?>




                      <div class="row d-flex justify-content-center">
                        <button  class="btn btn-warning"  data-toggle="modal" data-target="#staticBackdrop">
                          Editar 
                        </button> </div>
                      </div>

                    </div>
                  </div>


                  <div class="card-header p-0 ">


                  </div><!-- /.card-header -->
                  <!-- Button trigger modal -->

                </div>
              </div>
            </div>


            <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog  modal-dialog-centered" role="document" style="opacity:.9">
                <div class="modal-content bgt-acent opacity-50">
                  <div class="modal-header" style="background: #D28C58;">
                    <h5 class="modal-title" id="staticBackdropLabel">Datos Personales</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body" style="background:#FFC888">


                    <div>

                     <div class="row ">
                      <div  class=" col-sm-6 col-md-4  col-12  ">
                        <input type="hidden" id="idD" name="id">
                        <div class="myBox">
                          <input class=" myImputField" type="text" id="nombreUsuarioD" name="nombre"  onkeypress="return soloLetras(event)" minlength="2" maxlength="25" required autofocus>
                          <label class="mylabel" for="nombreUsuario" >Nombre</label>
                        </div>
                      </div>

                      <div  class=" col-sm-6 col-md-4  col-12  ">

                        <div class="myBox">
                          <input class=" myImputField" type="text" id="primerApellidoD" name="primerApellido"  onkeypress="return soloLetras(event)" minlength="2" maxlength="25" required >
                          <label class="mylabel" for="primerApellido" >Primer Apellido</label>
                        </div>
                      </div>
                      <div  class=" col-sm-6 col-md-4  col-12  ">

                        <div class="myBox">
                          <input class=" myImputField" type="text" id="segundoApellidoD" name="segundoApellido"  onkeypress="return soloLetras(event)" minlength="0" maxlength="25">
                          <label class="mylabel" for="segundoApellido" >Segundo Apellido</label>
                        </div>
                      </div>


                    </div>



                    <div class="row ">

                     <div  class=" col-sm-3 col-md-4  col-12  ">

                      <div class="myBox">
                        <input class="myImputField" type="text" id="ciD" name="ci" onkeypress="return soloNumero(event)" minlength="7" maxlength="10"  required>
                        <label class="mylabel" for="ci" >C.I.</label>
                      </div>
                    </div>

                    <div  class=" col-sm-3 col-md-4  col-12 d-flex justify-content-center  ">


                      <div class="myBox">
                        <input class="myImputField" type="date" id="fechaNacimientoD" name="fechaNacimiento"   max="2023-08-01" value="2020-01-01"   required>
                        <label class="mylabel" for="fechaNacimiento"  >Fecha Nacimiento</label>

                      </div>
                    </div>


                  </div>
                  <div class="row t-secondary d-flex justify-content-center align-items-center">




                    <label class="form-label p-2 " for="inlineRadio3">Genero</label>


                    <div class=" p-2 form-check form-check-inline">
                      <input class="form-radio" type="radio" name="genero" id="radioF" value="f" checked>
                      <label class="form-check-label" for="radioF">Femenino</label>
                    </div>
                    <div class=" p-2 form-check form-check-inline">
                      <input class="form-radio" type="radio" name="genero" id="radioM" value="m">
                      <label class="form-check-label" for="radioM">Masculino</label>
                    </div>

                  </div>

                </div>

              </div>
              <div class="modal-footer d-flex justify-content-around">
                <button type="button" class="btn btn-sm  btnt-primary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-sm  btnt-primary">Gurdar</button>
              </div>
            </div>
          </div>
        </div>
        <!-- perfil lateral -->
        <div class="col-lg-4 col-md-12  col-sm-12  " >
          <!-- small card -->
          <div class="small-box bgt-secondary "  style="height:60vh">
           <div class="inner" >
            <div class=" row d-flex justify-content-center">

              <div class="image ">
                <img src="<?php echo base_url();?>/adminlti/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">

              </div>
            </div>
            <?php foreach ($datos->result() as $row) { ?>
              <div class="row " >
                <p class=" col-12 d-flex justify-content-center"><?php echo $row->nombre.' '. $row->primerApellido.' '. $row->segundoApellido;  ?></p>
              </div>
              <div class="row d-flex justify-content-center" >
                <p  class="col-6">Nombre Usuario: </p>
                <p class=" col-16 d-flex justify-content-center"><?php echo $row->nombreUsuario ?></p>
              </div><div class="row d-flex justify-content-center" >
                <p class="col-6">Tipo Usuario: </p>
                <p class=" col-16 d-flex justify-content-center"><?php echo $row->rol; ?></p>
              </div>
            <?php  }  ?>
            <div class="row d-flex justify-content-center">
              <button  class="btn btn-warning"  data-toggle="modal" data-target="#forCambirPassword">
              Cambiar contraseña </button> 
            </div>
          </div>
        </div>
      </div>

    </div>


    <div class="modal fade" id="forCambirPassword" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog  modal-dialog-centered" role="document" style="opacity:.9">
        <div class="modal-content bgt-acent opacity-50">
          <div class="modal-header" style="background: #D28C58;">
            <h5 class="modal-title" id="staticBackdropLabel">Cambiar contraseña</h5>
            <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
           <!-- <?php echo form_open_multipart('usuario/cambioPwd'); ?> -->
           <form id="formCambiarPwd" method="POST" action="<?php echo base_url(); ?>index.php/usuario/cambioPwd">
          <div class="modal-body" style="background:#FFC888">
         

            <div>

              <div class="row">
               <div class="col-12">
                 <div class="myBox">

                  <input name="pwd" class="myImputField" type="password" required  />
                  <label class="mylabel">Contraseña Actual</label>
                </div>
              </div>

            </div>
          </div>
          <div>

            <div class="row">
             <div class="col-12">
               <div class="myBox">

                <input  name="pwd-nueva" id="pwd-nueva" class="myImputField" type="password" required  />
                <label class="mylabel">Nueva Contraseña</label>
              </div>
            </div>

          </div>
        </div> 

         <div>

          <div class="row">
           <div class="col-12">
             <div class="myBox">

              <input  name="pwd-repetir" id="pwd-repetir" class="myImputField" type="password" required  />
              <label class="mylabel">Repetir Contraseña</label>
            </div>
          </div>


        </div>
        <div class="row d-flex justify-content-center">
          <label class="" id="msg">msg</label> </div>
      </div>

    </div>
    <div class="modal-footer d-flex justify-content-around">
      <button type="button" class="btn btn-sm  btnt-primary" data-dismiss="modal">Cancelar</button>
      <button type="submit" class="btn btn-sm  btnt-primary">Gurdar</button>
    </div>
     <!-- <?php echo form_close(); ?> -->
   </form>
   <script type="text/javascript">
 document.addEventListener("DOMContentLoaded",function(){


    var nueva= document.getElementById("pwd-nueva");
    var repetir= document.getElementById("pwd-repetir");

    var msg = document.getElementById("msg");
   
    repetir.addEventListener("input",function(){
      msg.textContent='';
     
        var car = nueva.value.length;
        // msg.textContent=car;
        if(car==repetir.value.length)
        {
             msg.textContent='Las Contraseña coinciden';
             msg.style.color="green";
        }
        else
        {
            msg.textContent=' repetir contrase deve ser igual ala nueva';
             msg.style.color="red";

        }


    });
   
     $("#formCambiarPwd").submit(function(ev){
        ev.preventDefault();
         
        $.ajax({
            url: "../usuario/cambioPwd",
            type: "POST",
            data: $(this).serialize(),
            success: function(data){
                
                var msg = document.getElementById('msg');
                var json = JSON.parse(data);
                console.log(json.msg);
                msg.textContent = json.msg;
                if(json.uri==1){
                  alert("El sistema se procedera a cerrar")
                  window.location.replace(json.url);  
                }
               
              
            },
           
        });
    });
     
});
</script>
  </div>
</div>
</div>
<!-- fin perfil lateral -->
</div>
<!-- /.row -->


</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
</div>
