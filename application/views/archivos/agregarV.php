<h1>Agregar Usuario</h1>

<?php echo form_open_multipart('usuario/agregardb'); ?>
<div class="container  ">
<div class="row text-center justify-content-center align-items-cente"   >
  <div class="col-md-6 text-center ">
    <img class="rounded-circle bg-secondary" width="280px"  src="<?php echo base_url();  ?>img/usuario.png" >
  </div>
<div class=" col-md-6">

  <div class="fake_placeholder">
    <label>
      <span>Nombre</span>
      <input type="text" name="nombre" required  autofocus  autocomplete="off" />
    </label>

  </div>
  <div class="fake_placeholder">
    <label>
      <span>Pirmer Apellido</span>
      <input type="text" name="apellido1"  required  autocomplete="off"/>
    </label>

  </div>
  <div class="fake_placeholder">
    <label >
      <span>Segundo Apellido</span>
      <input type="text" name="apellido2" autocomplete="off"/>
    </label>

  </div>
  <div class="fake_placeholder">
    <label>
      <span>Ci</span>
      
      <input type="text" name="ci" required autocomplete="off"  />
    </label>

  </div>

  <div class="seleccion">
    <label>Rol: </label> 
      <select name="rol"  required >
          <option value="Admin">Admin</option>
          <option value="Usuario">Usuario</option>
        </select>
    
  </div>

  <br>
    <div class="seleccion"> 
    <label>Sexo: </label>
        <select name="sexo" required >
        
          <option value="F">Femenino</option>
          <option value="M">Masculino</option>
        </select>
    
    
  </div>
  
  <div class="fake_placeholder">
     <button class="guardar">Guardar</button>
  </div>
</div>

</div>
</div>
<?php echo form_close(); ?>