<?php

if(isset($_POST['id'])){

	$paciente = new Paciente($_POST['id'], "", "", "", "", "", "");
	$paciente -> consultar();
	$paciente = new Paciente($_POST['id'], "", "", "", "", "", (($paciente -> getEstado())==0?1:0));
	$paciente -> actualizarEstado();

	echo "<td  id='estado" . $paciente -> getId() . "' value='". $paciente -> getEstado() ."' ><span class='fas " . ($paciente -> getEstado()==0?"fa-times-circle":"fa-check-circle") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($paciente -> getEstado()==0?"Inhabilitado":"Habilitado") . "' ></span>" . "</td>";
	
}


/*$paciente = new Paciente($_GET['idPaciente'], "", "", "", "", "", $_GET['estado']);
echo "<script>
console.log('EstadoArrived ' ," . $paciente -> getEstado() .");
</script>";
$paciente->actualizarEstado();

echo "<td  id='estado" . $paciente -> getId() . "' ><span class='fas " . ($paciente -> getEstado()==0?"fa-times-circle":"fa-check-circle") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($paciente -> getEstado()==0?"Inhabilitado":"Habilitado") . "' ></span>" . "</td>";
*/
?>

