<?php

$paciente = new Paciente($_GET['idPaciente']);
$paciente -> consultarFoto();

echo 'Foto: ' . $paciente -> getFoto() . "<br />";

unlink("fotos/".$paciente -> getFoto());

//Datos de la imagen

$nombre = $_FILES['foto']['name'];
$tamaño = $_FILES['foto']['size'];
$tipo = $_FILES['foto']['type'];

echo 'Original: ' . $nombre . "<br />";

echo 'Original: ' . $tipo . "<br />";

$tipoI = explode('/', $tipo);

echo 'separado: ' . $tipoI[1] . "<br />";

// Ruta de la carpeta destino en el servidor

$destino = $_SERVER['DOCUMENT_ROOT'] . '/ipsud/fotos/';

// mover la imagen del directorio temporal al directorio destino

echo $destino. $_GET['idPaciente'].'.'.$tipoI[1] . "<br />";

move_uploaded_file($_FILES['foto']['tmp_name'], $destino. $_GET['idPaciente'].'.'.$tipoI[1]);


$paciente = new Paciente($_GET["idPaciente"], "", "", "", "", "", "", "", "", $_GET['idPaciente'].'.'.$tipoI[1]);
$paciente -> actualizarFoto();



?>