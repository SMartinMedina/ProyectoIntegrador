<h1>Edita</h1>
<form id="editaestadobd" method ="post" action="<?php echo site_url('editaestadobd');?>"> 
	<input type="text" name="nombre" id="nombre" value="<?php echo $estado->nombre; ?>">
	<input type="hidden" name="id_estado" id="id_estado" value="<?php echo $estado->id; ?>">
	<button class="btn btn-default" type="submit">Confirmar Cambio</button>
</form>