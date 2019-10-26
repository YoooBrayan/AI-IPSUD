<?php 

$paciente = new Paciente($_GET['idPaciente']);
$paciente -> consultarFoto();

echo "<img src='fotos/" . $paciente -> getFoto() . "'/>"

?>
