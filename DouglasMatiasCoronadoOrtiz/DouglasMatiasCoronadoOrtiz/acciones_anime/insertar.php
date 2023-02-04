<?php

include("../backend/bd_anime.php");
$nombre = $_POST['nombre'];
$description = $_POST['description'];
$foto = $_FILES['foto'];

$foto = addslashes(file_get_contents($foto['tmp_name']));
$query = insertar($nombre,$description,$foto);

header("location:../anime.php")

?>