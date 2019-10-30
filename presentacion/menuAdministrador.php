<head>
	<link href="presentacion/estilos.css" rel="stylesheet" type="text/css" />
</head>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="d-flex">
		<a class="navbar-brand" href="index.php?pid=<?php echo base64_encode("presentacion/sesionAdministrador.php") ?>"><i class="fas fa-home"></i></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="login" style="z-index: 2;" id="con">
			<ul>
				<li><a href="#"> Consultar </a>

					<ul>
						<li>
							<a class="ani" href="#">
								Administrador
							</a>
						</li>
						<li><a class="an" href="index.php?pid=<?php echo base64_encode("presentacion/paciente/consultarPaciente.php") ?>">Paciente</a>
						</li>
						<li><a class="an" href="#">Medico</a></li>
					</ul>
			</ul>
		</div>
		<div style="padding: 5px;"><a style="color: #8F8E8E;" href="index.php">Salir</a></div>
	</div>

	<span class="navbar-text" style="margin-left: 850px;">
		Administrador: <?php echo $administrador->getNombre() . " " . $administrador->getApellido() ?>
	</span>
</nav>