  <h1 class="text text-right">Modificar Usuario</h1>

  <?php echo form_open_multipart('usuario/modificardb'); ?>
  <div class="container text text-center"   >
    <div class="row " >
      <?php 
      foreach ($usuarioEncontrado ->result() as $row) {
       # code...
       
       ?>
       <input type="hidden" name="id" value="<?php echo $row->id; ?>">
       <div class="md md-6">
        <div class="fake_placeholder">
          <label >
            <span class="lbSuperio">Nombre</span>
            <input type="text"  name="nombre" value="<?php echo $row->nombre ?> " required autofocus  autocomplete="off" />
          </label>

        </div>
        <div class="fake_placeholder">
          <label>
            <span class="lbSuperio">Pirmer Apellido</span>
            <input type="text" name="apellido1"  value="<?php echo $row->primerApellido ?> "  required  autocomplete="off"/>
          </label>

        </div>
        <div class="fake_placeholder">
          <label>
            <span class="lbSuperio">Segundo Apellido</span>
            <input type="text" name="apellido2" value="<?php echo $row->segundoApellido ?> " autocomplete="off"/>
          </label>

        </div>
        <div class="fake_placeholder">
          <label>
            <span class="lbSuperio">Ci</span>
            
            <input type="text" name="ci" value="<?php echo $row->ci?> " required autocomplete="off"  />
          </label>

        </div>

        <div class="seleccion">
          <label>Rol: </label> 
          <select name="rol"  required  >
            <?php if ($row->rolUsuario=='Admin'){?>
             <option value="Admin" selected="true">Admin</option>
             <option value="Usuario" >Usuario</option>
           <?php } else if($row->rolUsuario=='Usuario'){?>
             
            <option value="Admin" >Admin</option>
            <option value="Usuario" selected="true">Usuario</option>
          <?php } else{ ?>
            <option value="Admin" >Admin</option>
            <option value="Usuario" >Usuario</option>
          <?php }  ?>
          
        </select>
        
      </div>

      <br>
      <div class="seleccion"> 
        <label>Sexo: </label>
        <select name="sexo" required  >
          
          <?php if( $row->sexo=='F') {?>
           <option value="F" selected >Femenino</option>
           <option value="M">Masculino</option>
         <?php }else if($row->sexo=='M'){?>
          <option value="F">Femenino</option>
          <option value="M" selected>Masculino</option>
        <?php }else{?>
          <option value="F">Femenino</option>
          <option value="M">Masculino</option>
        <?php } ?>
      </select>
      
      
    </div>
  </label>



  <div class="fake_placeholder">
   <button class="guardar">Guardar Cambios</button>
 </div>
</div>

</div>
</div>
<?php 

}
?>

<?php echo form_close(); ?>