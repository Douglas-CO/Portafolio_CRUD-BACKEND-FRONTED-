<?php

$id = $_GET['id'];
include("../backend/bd_musicas.php");
$query = eliminar($id);
header("location:../musicas.php")

?>