<?php
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$paciente = new Paciente();
$pacientes = $paciente->consultarTodos();
include 'presentacion/menuAdministrador.php';
?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-primary text-white">Consultar Paciente</div>
				<div class="card-body">
					<div id="resultadosPacientes">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">Id</th>
								<th scope="col">Nombre</th>
								<th scope="col">Apellido</th>
								<th scope="col">Correo</th>
								<th scope="col">Estado</th>
								<th scope="col">Telefono</th>
								<th scope="col">Direccion</th>
								<th scope="col">Servicios</th>
							</tr>
						</thead>
							<tbody>
						<?php
    foreach ($pacientes as $p) {
        echo "<tr id=". $p -> getId() .">";
        echo "<td>" . $p->getId() . "</td>";
        echo "<td>" . $p->getNombre() . "</td>";
        echo "<td>" . $p->getApellido() . "</td>";
        echo "<td>" . $p->getCorreo() . "</td>";
        echo "<td id='estado" . $p->getId() . "' ><span id='estadoS" . $p->getId() . "' value='". $p -> getEstado() ."' class='fas " . ($p->getEstado()==0?"fa-times-circle":"fa-check-circle") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($p->getEstado()==0?"Inhabilitado":"Habilitado") . "' ></span>" . "</td>";
        echo "<td>" . $p->getTelefono() . "</td>";
        echo "<td>" . $p->getDireccion() . "</td>";
        echo "<td id='cambiarEstados'>" . "<a href='modalPaciente.php?idPaciente=" . $p->getId() . "' data-toggle='modal' data-target='#modalPaciente' ><span class='fas fa-eye' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Ver Detalles' ></span> </a>
                       <a class='fas fa-pencil-ruler' href='index.php?pid=" . base64_encode("presentacion/paciente/actualizarPaciente.php") . "&idPaciente=" . $p->getId() . "' data-toggle='tooltip' data-placement='left' title='Actualizar'> </a>
                       <a class='fas fa-camera' href='index.php?pid=" . base64_encode("presentacion/paciente/actualizarFotoPaciente.php") . "&idPaciente=" . $p->getId() . "' data-toggle='tooltip' data-placement='left' title='Actualizar Foto'> </a>
                       <a  id='cambiarEstado" . $p->getId() . "' class='fas fa-power-off' href='". $p-> getId() . "'> </a>
              </td>";
        echo "</tr>";
    
    }
    echo "<tr><td colspan='9'>" . count($pacientes) . " registros encontrados</td></tr>"?>
						</tbody>
					</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div>


<div class="modal fade" id="modalPaciente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content" id="modalContent"></div>
	</div>
</div>

<script>
	$('body').on('show.bs.modal', '.modal', function (e) {
		var link = $(e.relatedTarget);
		$(this).find(".modal-content").load(link.attr("href"));
	});
</script>


<script>
	$('body').on('show.bs.modal', '.modal', function (e) {
		var link = $(e.relatedTarget);
		$(this).find(".modal-content").load(link.attr("href"));
	});
</script>

<script type="text/javascript">
<?php foreach ($pacientes as $p) { ?>

$(document).on('click', '#cambiarEstado<?php echo $p -> getId(); ?>', function(){
	event.preventDefault();

	var elemento = $(this)[0].parentElement.parentElement;
	var id = $(elemento).attr('id');
	//var idd = "#estadoS"+id;
	var est = $("#estadoS"+id).attr('value');
	
	<?php  echo "var ruta = \"index.php?pid=" . base64_encode("presentacion/paciente/editarEstadoPacienteAjax.php") . " \";\n"; ?>
	
	$.post(ruta, {id}, function(response){
		var e = "#estado" + id;
		$(e).html(response);
		alert((est==0?"paciente " + "<?php echo ''.$p -> getNombre(); ?>" + " ha sido Habilitado":"Paciente " + id + " ha sido Inhabilitado"));
		
	})
	
})
<?php }?>

/*$("table").on("click", "#ids a" ,function(event){
	var elemento = $(this)[0].parentElement.parentElement;
	event.preventDefault();
	id = $(this).attr("value");
	actEstado(id);
})


function actEstado(idS){
	$.ajax({
		url: "<?php //echo "index.php?pid=" . base64_encode("presentacion/paciente/editarEstadoPacienteAjax.php") ?>",
		type: "POST",
		data: {id:idS},
		success: function(response){
			var e = "#estado"+idS;
			$(e).html(response);
		}
	})
} 
*/

</script>