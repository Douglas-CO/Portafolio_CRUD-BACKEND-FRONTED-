<?php

$id = $_GET['id'];
include("../backend/bd_juegos.php");
$query = eliminar($id);
header("location:../juegos.php")

?>