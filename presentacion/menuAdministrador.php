<head>
<link href="estilos.css" rel="stylesheet" type="text/css"/>
</head>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand"
		href="index.php?pid=<?php echo base64_encode("presentacion/sesionAdministrador.php")?>"><i
		class="fas fa-home"></i></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse"
		data-target="#navbarSupportedContent"
		aria-controls="navbarSupportedContent" aria-expanded="false"
		aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="login" >
		<ul >
			<li><a href="#"> Consultar </a>

			<ul>
                                <li>
                                    <a class="ani" href="#">
                                        Administrador
                                    </a>
                                </li>
                                <li><a class="an" href="index.php?pid=<?php echo base64_encode("presentacion/paciente/consultarPaciente.php")?>">Paciente</a>
								</li>
                                <li><a class="an" href="#">Medico</a></li>
                                <li class="nav-item"><a class="nav-link" href="index.php">Salida</a>
			</li>
                            </ul>


				
		</ul>
		<span class="navbar-text">
      Administrador: <?php echo $administrador -> getNombre() . " " . $administrador -> getApellido() ?> 
    </span>
	</div>
</nav>