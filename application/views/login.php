
<div class="container " style=" background-image: url('<?php echo base_url();?>/img/fondo.jpg'); background-repeat: no-repeat" >
       
    <div class="d-flex justify-content-center">
    <div class="container1">
            <div class="login-logo d-flex justify-content-center mt-10px">  <img  src="<?php echo base_url();  ?>img/logo2.png" width="100px" alt="aqui imagen">
            </div>       
        <div class="login-section">
            <div class="form-box login">
                <?php echo form_open_multipart('usuario/validarUsuario'); ?>
                 <?php 
                            $msg=0;
                        switch ($msg) {
                               case 1:
                                $mensaje="Error Ingreso";
                                break;
                                 case 2:
                                $mensaje="Acceso No valido";
                                break;
                                 case 3:
                                $mensaje="Gracias";
                                break;
                                 
                            default:
                                 $mensaje="Ingrese los datos";
                                break;
                        }
                   ?>
                    <p> <?php echo $mensaje; ?></p>

                    <h2><b>Iniciar sesion</b></h2>
                    <div class="input-box">
                        <span class="icon"><i class="fas fa-user"></i></span>
                        <input type="text" name="usuario" required autofocus>
                        <label >Usuario</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class="fas fa-key"></i></span>
                        <input type="password" name="password" required>
                        <label>Password</label>
                    </div>
                    <div class="forget-passs">
                        
                        <p><a  class="forgetPassword" href="#">Has olvidado la clave?</a></p>
                    </div>
                    <button class="btn">Iniciar sesion</button>
                    <div class="create-account">
                        <p>Crear una cuenta nueva? <a href="#" class="register-link">crear</a></p>
                    </div>
                <?php echo form_close(); ?>
            </div>
            <div class="form-box forget">
                <form action="">
                     <h2><b>Olvidadeste tu contrasenia</b></h2>

                    <div class="input-box">
                        <span class="icon"><i class="fas fa-envelope"></i></span>
                        <input type="email" required>
                        <label >Email</label>
                    </div>
                   
                    <button class="btn">Restablecer</button>
                   
                       

                     <div class="create-account">
                       
                         <p><a href="#" class="login-regresar">Regresar</a></p>
                    </div>
                </form>
            </div>
            <div class="form-box register">
                 <?php echo form_open_multipart('usuario/registrarUsuario'); ?>
              
                       <h2><b>Registrarse</b></h2>


                    <div class="input-box">
                        <span class="icon"><i class="fas fa-user"></i></span>
                        <input type="text" name="nombreUsuario" min="5" required autofocus>
                        <label >Usuario</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class="fas fa-envelope"></i></span>
                        <input type="email" name="email"  required>
                        <label >Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class="fas fa-key"></i></span>
                       
                        <input type="password" name="password" min="8" required>
                        <label>Password</label>
                    </div>

                    <div class="input-box">
                        <span class="icon"><i class="fas fa-key"></i></span>
                        <input type="password" name="passwordRepeat" min="8" required>
                        <label>Repetir Password</label>
                    </div>
                    <div class="remember-password">
                        <label for=""><input type="checkbox">estoy de acuerdo con esta afirmacion</label>
                    </div>
                    <button class="btn">Crear</button>
                    <div class="create-account">
                        <p>Ya tienes una cuenta? <a href="#" class="login-link">Iniciar Session</a></p>
                    </div>
                <?php   echo form_close(); ?>
            </div>
        </div>
     </div>
    </div>

</div>