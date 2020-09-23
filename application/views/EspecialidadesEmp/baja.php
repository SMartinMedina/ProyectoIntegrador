<h1>Baja</h1>
<form id="bajaespecialidadbd" method ="post" action="<?php echo site_url('bajaespecialidadbd');?>"> 
<?php
	echo $especialidad->nombre;
?>
	<input type="hidden" name="id_especialidad" id="id_especialidad" value="<?php echo $especialidad->id; ?>">
    
	<button  class="btn btn-default" type="submit">Confirmar Baja</button>
</form>