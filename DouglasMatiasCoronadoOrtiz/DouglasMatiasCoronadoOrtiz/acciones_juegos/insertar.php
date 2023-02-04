<?php

include("../backend/bd_juegos.php");
$nombre = $_POST['nombre'];
$description = $_POST['description'];
$foto = $_FILES['foto'];
$genero = $_POST['genero'];

$foto = addslashes(file_get_contents($foto['tmp_name']));
$query = insertar($nombre,$description,$foto,$genero);

header("location:../juegos.php")

?>