<?php 
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$paciente=new Paciente($_GET["idPaciente"]);
$paciente -> consultar();
$bandera = true;
$mensaje = "";

    include 'presentacion/menuAdministrador.php';
?>
	<div class="container">
		<div class="row">
			<div class="col-3"></div>
			<div class="col-6">
				<div class="card">
					<div class="card-header bg-primary text-white">Actualizar Foto Paciente</div>
					<div class="card-body">
						<div id="mensaje"></div>
						<form id="actualizarFoto" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<input type="file" name="foto" class="form-control" placeholder="Foto" required="required" >
							</div>
							<input type="button" onclick="actualizarFoto();" name="actualizar" class="btn btn-primary" value="Actulizar">
						</form>
					</div>
				</div>
			</div>

		</div>

	</div>		


<script>
function actualizarFoto(){
	var parametros = new FormData($("#actualizarFoto")[0]);

	<?php  echo "var ruta = \"index.php?pid=" . base64_encode("presentacion/paciente/actualizarFotoPacienteAjax.php") . "\";\n"; ?>

	$.ajax({
		data: parametros,
		url: ruta,
		type: "POST",
		contentType: false,
		processData: false,
		beforesend: function(){

		},
		success: function(response){
			$("#mensaje").html(response);
		}
	});

}

</script>