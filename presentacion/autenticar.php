<?php
// require 'logica/Persona.php';
// require 'logica/Administrador.php';
require_once 'logica/Paciente.php';
$correo = $_POST["correo"];
$clave = $_POST["clave"];
$administrador = new Administrador("", "", "", $correo, $clave);
$paciente = new Paciente("","","", $correo, $clave);
if($administrador -> autenticar()){
    $_SESSION['id'] = $administrador -> getId();    
    header("Location: index.php?pid=" . base64_encode("presentacion/sesionAdministrador.php"));
}else if($paciente -> autenticar()){
	$_SESSION['id'] = $paciente -> getId();
	header("Location: index.php?pid=" . base64_encode("presentacion/paciente/sesionPaciente.php"));
}else{
	header("Location: index.php?pid=" . base64_encode("presentacion/inicio.php") . "&di=true");
}
?>