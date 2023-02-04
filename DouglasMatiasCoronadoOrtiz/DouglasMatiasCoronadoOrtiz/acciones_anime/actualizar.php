<?php

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$description = $_POST['description'];
$foto = $_FILES['foto'];
include("../backend/bd_anime.php");

if($foto['size']==0){
    $query = actualizarSinFoto($id, $nombre, $description);
}else{
    $foto = addslashes(file_get_contents($foto['tmp_name']));
    $query = actualizar($id, $nombre, $description, $foto);
}
header("location:editar.php?id=$id")

?>