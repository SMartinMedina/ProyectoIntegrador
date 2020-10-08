<h1>TEST DASHBOARD Usuario RRRRRR</h1>
<form id="altarol" method ="post" action="altarol"> 
	<button class="btn btn-default" type="submit">Alta Usuario</button>
</form>
<?php
	foreach($usuarios as $u){
?>
		<p>
<?php 
			echo $u->id_rol; 
			echo $u->nombre_rol; 
			echo $u->nombre_usuario; 
			echo $u->apellido_usuario; 			
			echo $u->usuario; 
			echo "*********";//$u->password; 
			echo $u->email; 



?> 
		<a href="bajausuario/<?php echo $u->id; ?>">Borrar</a>
		<a href="editausuario/<?php echo $u->id; ?>">Edita</a></p>

<?php
	}
?>