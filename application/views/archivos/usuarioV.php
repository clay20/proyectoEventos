
  <div class="container "	>
  	
 
  	<h1>Gestionar Usuario</h1>
    <?php echo form_open_multipart('usuario/agregar'); ?>
        <button class="btn btn-outline-primary">Agregar</button>
      <?php echo form_close(); ?>
    <div class="table-responsive-lg ">
  	<table class="table">
      
  		<thead>
        <th>Numero</th>

  			<th>Nombre</th>
  			<th>Primer Apellido</th>
  			<th>Segundo Apellido</th>
  			<th>Ci</th>
  			<th>Sexo</th>
  			<th>Rol Usuario</th>
        <th>Modificar</th>
        <th>Eliminar</th>


  		
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
  		
  	</table>
   </div>
  </div>
