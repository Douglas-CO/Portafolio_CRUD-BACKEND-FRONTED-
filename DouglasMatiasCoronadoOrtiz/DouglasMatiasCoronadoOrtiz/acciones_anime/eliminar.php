<?php

$id = $_GET['id'];
include("../backend/bd_anime.php");
$query = eliminar($id);
header("location:../anime.php")

?>