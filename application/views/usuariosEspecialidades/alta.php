<h1>TEST DASHBOARD ROLES RRRRRRRR</h1>
<form id="altarolbd" method ="post" action="altarolbd"> 
	<label>Empleado: </label> 	<br />
	<select name="idEmpleado" id="idEmpleado">
<?php
	foreach ($empleados as $emp) {
?>
		<option value="<?php echo $emp->id; ?>">
			<?php echo $emp->nombre_usuario." ".$emp->apellido_usuario; ?>
		</option>
<?php
	}
?>		
	</select>
	<br />
	<br />
	<div id="EspecialidadesDisponibles"></div>
	<div id="EspecialidadesEmpleado"></div>


	<button class="btn btn-default" type="submit">Alta Especialidades de Usuario</button>
</form>

<script type="text/javascript" src="https://code.jquery.com/jquery-git.min.js"></script>
<script type="text/javascript">
	$('#idEmpleado').change(function(){
		var idEmpleado = $(this).val();
		$('#EspecialidadesDisponibles').empty();
		$('#EspecialidadesEmpleado').empty();
	    $.ajax({
		    url:'<?=base_url()?>index.php/UsuariosEspecialidades/getEspecialidadesEmpleado',
		    method: 'post',
		    data: {id_empleado: idEmpleado},
		    dataType: 'json',
		    success: function(response){
				var espDispEmp = response['espDispEmp'];
				var espEmp = response['espEmp'];
				console.log(espDispEmp);
				var checkboxEsp =  "";
				var liEsp =  "";
				if(espDispEmp.length > 0){ checkboxEsp =  "Especialidades Disponibles: <br/>";}
				espDispEmp.forEach(function (esp) {
					checkboxEsp +=  "<label>";
					checkboxEsp +=  "<input type = 'checkbox' id = 'especialidades[]' value = '"+esp.id+"' name = 'especialidades[]' >"+esp.nombre;
					checkboxEsp +=  "</label><br />";
					
				});
				if(espEmp.length > 0){ liEsp =  "Especialidades que ya tiene el empleado:";}
				espEmp.forEach(function (esp) {

					liEsp +=  "<li> "+esp.nombre+"</li>"
					
				});
				liEsp +=  "</ul><br />";
				$('#EspecialidadesDisponibles').append(checkboxEsp);
				$('#EspecialidadesEmpleado').append(liEsp);
	       
	       /*$('#suname,#sname,#semail').text('');
	       if(len > 0){
	         // Read values
	         var uname = response[0].username;
	         var name = response[0].name;
	         var email = response[0].email;
	 
	         $('#suname').text(uname);
	         $('#sname').text(name);
	         $('#semail').text(email);

	       }
	       	 */
	 
	     }
	   });
	  });
	 //});
 </script>

</script>
