<?php
$paciente = new Paciente($_SESSION['id']);
$paciente->consultar();

if($paciente -> getEstado() == 1)
{
	?>
	
	<div class="alert alert-Danger" role="alert" >Paciente Inhabilitado.</div>
	
	<?php 
}else{
	
include 'presentacion/paciente/menuPaciente.php';
?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-primary text-white">Bienvenido Paciente</div>
				<div class="card-body">
					<p>Usuario: <?php echo $paciente -> getNombre() . " " . $paciente -> getApellido() ?></p>
					<p>Correo: <?php echo $paciente -> getCorreo(); ?></p>
					<p>Hoy es: <?php echo date("d-M-Y"); ?></p>
					<img src="/IPSUD_Yo/fotos/<?php echo $paciente -> getFoto(); ?>" height="200px">
				</div>
			</div>
		</div>
	</div>
</div>
<?php
} 
?>