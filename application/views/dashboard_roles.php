<h1>TEST DASHBOARD ROLES</h1>
<form id="altaroldb" method ="post" action="altaroldb"> 
	<button class="btn btn-default" type="submit">Alta Rol</button>
</form>
<?php
	foreach($roles as $r){
?>
		<p><?php echo $r->nombre; ?></p>
<?php
	}
?>