<?php

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$description = $_POST['description'];
$foto = $_FILES['foto'];
$genero = $_POST['genero'];
include("../backend/bd_juegos.php");

if($foto['size']==0){
    $query = actualizarSinFoto($id, $nombre, $description, $genero);
}else{
    $foto = addslashes(file_get_contents($foto['tmp_name']));
    $query = actualizar($id, $nombre, $description, $foto, $genero);
}
header("location:editar.php?id=$id")

?>