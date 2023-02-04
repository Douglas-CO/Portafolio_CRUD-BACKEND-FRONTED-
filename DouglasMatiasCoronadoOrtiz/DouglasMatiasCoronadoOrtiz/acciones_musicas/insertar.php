<?php

include("../backend/bd_musicas.php");
$nombre = $_POST['nombre'];
$description = $_POST['description'];
$foto = $_FILES['foto'];
$link = $_POST['link'];

$foto = addslashes(file_get_contents($foto['tmp_name']));
$query = insertar($nombre,$description,$foto,$link);

header("location:../musicas.php")

?>