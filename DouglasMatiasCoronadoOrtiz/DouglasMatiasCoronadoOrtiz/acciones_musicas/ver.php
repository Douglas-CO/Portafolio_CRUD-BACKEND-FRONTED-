<?php

$id = $_GET['id'];
include("../backend/bd_musicas.php");
$datos = ListarunDato($id);
$nombre = $datos['nombre'];
$description = $datos['description'];
$foto = $datos['foto'];
$link = $datos['link'];

include("../includes/header.php");
?>
<br>
<br>
<div class="row g-0">
    <div class="col-5">
        <div class="card position-fixed" style="width:15cm;height:13cm;background-color:#fffec2;">
        <br>
            <a href="../musicas.php" type="button" class="btn btn-outline-warning" style="width:4cm;height:0.75cm;">
                <i class="fa-sharp fa-solid fa-arrow-left"> VOLVER</i></a>
            <center>
                <img style="max-height:320px;max-width:540px ;border: 2px solid black;" class="mt-2" src="data:image/jpg;base64,<?=base64_encode($foto)?>">
            </center>
            <br>
            <center>
                <a href="editar.php?id=<?php echo $id ?>" type="button" class="btn btn-outline-info" style="width:98%;height:1cm;">
                    <i class="fa-solid fa-pen-to-square"> EDITAR</i></button>
                </a>
                <a href="eliminar.php?id=<?php echo $id ?>" type="button" class="btn btn-outline-danger" style="width:98%;height:1cm;">
                    <i class="fa-solid fa-delete-left"> ELIMINAR</i>
                </a>
            </center>    
        </div>
    </div>
    <div class="col-7">
        <div class="card" style="width:100%;height:100%;background-color:#ffffec;">
            <div class="w-40 m-auto p-1">
                <h3 class="text-center"><?=$nombre?></h3>
                <p><?=$description?></p>
                <center><p><a href="<?= $row['link']; ?>" class="btn btn-info btn-lg active" role="button" aria-pressed="true"><i class="fa-solid fa-link"></i> LINK</a></p></center>
            </div>
        </div>
    </div>
</div>
<?php
include("../includes/footer.php");
?>