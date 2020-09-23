<h1>TEST DASHBOARD ESTADOS</h1>
<form id="altaestado" method ="post" action="altaestado"> 
	<button class="btn btn-default" type="submit">Alta Estado</button>
</form>
<?php
	foreach($estados as $e){
?>
		<p>><?php echo $e->nombre; ?>
        <a href="bajaestado/<?php echo $e->id; ?>">Borrar</a>
		<a href="editaestado/<?php echo $e->id; ?>">Edita</a></p>
<?php
	}
?>