<h1>Baja</h1>
<form id="bajarolbd" method ="post" action="<?php echo base_url();?>bajarolbd"> 
 <?php
	echo $rol->nombre;
?>
	<input type="hidden" name="id_rol" id="id_rol" value="<?php echo $rol->id; ?>">
	<button class="btn btn-default" type="submit">Confirmar Baja Rol</button>
</form>
