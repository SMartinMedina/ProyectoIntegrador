<h1>Baja</h1>
<form id="bajaestadobd" method ="post" action="<?php echo site_url('bajaestadobd');?>"> 
<?php
	echo $estado->nombre;
?>
	<input type="hidden" name="id_estado" id="id_estado" value="<?php echo $estado->id; ?>">
    
	<button  class="btn btn-default" type="submit">Confirmar Baja</button>
</form>
