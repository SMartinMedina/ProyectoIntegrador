<h1>TEST DASHBOARD ROLES RRRRRR</h1>
<form id="altarol" method ="post" action="altarol"> 
	<button class="btn btn-default" type="submit">Alta Rol</button>
</form>
<?php
	foreach($roles as $r){
?>
		<p><?php echo $r->nombre; ?> 
		<a href="bajarol/<?php echo $r->id; ?>">Borrar</a>
		<a href="editarol/<?php echo $r->id; ?>">Edita</a></p>

<?php
	}
?>