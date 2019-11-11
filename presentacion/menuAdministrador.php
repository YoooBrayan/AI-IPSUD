<head>
	<link href="presentacion/estilos.css" rel="stylesheet" type="text/css" />
</head>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="d-flex">
		<a class="navbar-brand" href="index.php?pid=<?php echo base64_encode("presentacion/sesionAdministrador.php") ?>"><i class="fas fa-home"></i></a>
		<div class="login" style="z-index: 2;" id="con">
			<ul>
				<li><a href="#"> Consultar </a>

					<ul>
						<li>
							<a href="#">
								Administrador
							</a>
						</li>
						<li><a href="index.php?pid=<?php echo base64_encode("presentacion/paciente/consultarPaciente.php") ?>">Paciente</a>
						</li>
						<li><a href="#">Medico</a></li>
					</ul>
			</ul>
		</div>
		<div style="padding: 5px;"><a style="color: #8F8E8E;" href="index.php">Salir</a></div>
	</div>

	<span class="navbar-text" style="margin-left: 850px;">
		Administrador: <?php echo $administrador->getNombre() . " " . $administrador->getApellido() ?>
	</span>
</nav>