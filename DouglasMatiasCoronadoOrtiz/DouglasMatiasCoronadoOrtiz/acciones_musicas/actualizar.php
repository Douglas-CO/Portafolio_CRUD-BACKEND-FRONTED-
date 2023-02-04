<?php

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$description = $_POST['description'];
$foto = $_FILES['foto'];
$link = $_POST['link'];

include("../backend/bd_musicas.php");

if($foto['size']==0){
    $query = actualizarSinFoto($id, $nombre, $description, $link);
}else{
    $foto = addslashes(file_get_contents($foto['tmp_name']));
    $query = actualizar($id, $nombre, $description, $foto, $link);
}
header("location:editar.php?id=$id")

?>