<?php 
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$paciente=new Paciente($_GET["idPaciente"]);
$paciente -> consultar();
$bandera = true;
$mensaje = "";

if(isset($_POST["actualizar"])){

	$nombre = $_FILES['foto']['name'];
    $tama�o = $_FILES['foto']['size'];
    $tipo = $_FILES['foto']['type'];
    
    if($tama�o <= 1000000)
    {
    	if(strpos($tipo, "jpg") || strpos($tipo, "jpeg") || strpos($tipo, "png"))
    	{
    		$paciente = new Paciente($_GET["idPaciente"]);
    		$paciente -> consultarFoto();
    		
    		
    		if(is_file("fotos/".$paciente -> getFoto()) && $paciente -> getFoto()!="default.png")
    		{
    			unlink("fotos/".$paciente -> getFoto());	
    		}	
    		 
    		$tipoI = explode('/', $tipo); //separar cadena cuado encuentre un /. Metodo para obtener tipo de imagen

			$destino = $_SERVER['DOCUMENT_ROOT'] . '/ipsud_Yo/fotos/';
			move_uploaded_file($_FILES['foto']['tmp_name'], $destino . date("jnYhis") . $_GET['idPaciente'] . '.' . $tipoI[1]);
			 // Se envia al servidor con el nombre modificada en el idPaciente y el tipo de imagen

    		$paciente = new Paciente($_GET["idPaciente"], "", "", "", "", "", "", "", "", date("jnYhis") . $_GET['idPaciente'].'.'.$tipoI[1]);
    		$paciente -> actualizarFoto();
            $mensaje = 'Foto del paciente actualizada exitosamente.';
    	}else{
            $mensaje = 'Formato Invalido.';
    		?>
			<!-- <div class="alert alert-danger" role="alert">Formato Invalido.</div> -->
    		<?php
    		$bandera = false;
    	}
    }else{
        $mensaje = 'Tama&ntildeo de imagen Invalido.';
		//<div class="alert alert-danger" role="alert">Tama&ntildeo de imagen Invalido.</div> -->
    }
}
    include 'presentacion/menuAdministrador.php';
?>
	<div class="container">
		<div class="row">
			<div class="col-3"></div>
			<div class="col-6">
				<div class="card">
					<div class="card-header bg-primary text-white">Actualizar Foto Paciente</div>
					<div class="card-body">
						<?php 
						if(isset($_POST["actualizar"]) && strpos($mensaje, "exitosamente")){ 
						
						echo "<div class='alert alert-success role='alert'> " .
							  $mensaje . "
						</div>";						
						 } else if(isset($_POST["actualizar"])) { 
                            
                        echo "<div class='alert alert-danger' role='alert'> " .
                              $mensaje  . "
                        </div>";
                            } ?>
						<form action=<?php echo "index.php?pid=" . base64_encode("presentacion/paciente/actualizarFotoPaciente.php")."&idPaciente=".$_GET["idPaciente"] ?> method="post" enctype="multipart/form-data">
							<div class="form-group">
								<input type="file" name="foto" class="form-control" placeholder="Foto" required="required" >
							</div>
							<button type="submit" name="actualizar" class="btn btn-primary">Actualizar</button>
						</form>
					</div>
				</div>
			</div>

		</div>

	</div>	