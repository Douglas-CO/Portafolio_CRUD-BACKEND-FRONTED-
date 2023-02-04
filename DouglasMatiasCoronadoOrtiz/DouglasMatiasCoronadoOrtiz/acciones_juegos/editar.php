<?php

$id = $_GET['id'];
include("../backend/bd_juegos.php");
$datos = ListarunDato($id);
$nombre = $datos['nombre'];
$description = $datos['description'];
$foto = $datos['foto'];
$genero = $datos['genero'];

include("../includes/header.php");
?>
<br>
<br>
<div class="row g-0">
    <div class="col-5">
        <div class="card position-fixed" style="width:14.5cm;height:13cm;background-color:#e1cbee;">
        <br>
            <a href="../juegos.php" type="button" class="btn btn-outline-info" style="width:4cm;height:0.75cm;">
                <i class="fa-sharp fa-solid fa-arrow-left"> VOLVER</i>
            </a>
            <center>
                <img style="max-height:320px;max-width:540px ;border: 2px solid black;" class="mt-2" src="data:image/jpg;base64,<?=base64_encode($foto)?>">
            </center>
            <br>
            <center>
                <a href="ver.php?id=<?php echo $id ?>" type="button" class="btn btn-outline-info" style="width:98%;height:1cm;">
                <i class="fa-solid fa-eye"> VER</i></a>
                
                <a href="eliminar.php?id=<?php echo $id ?>" type="button" class="btn btn-outline-danger" style="width:98%;height:1cm;">
                <i class="fa-solid fa-delete-left"> ELIMINAR</i></a>
            </center>    
        </div>
    </div>
    <div class="col-7">
        <div class="card" style="width:100%;height:100%;background-color:#f4e8f3;">
            <div class="w-40 m-auto p-1">
                <form action="actualizar.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=$id?>">
                    <h3 class="text-center"><?=$nombre?></h3>
                    <div class="row g-1">
                        <div class="col-3">
                            <div class="mb-3 row">
                                <label>Nombre de la Cancion: </label>
                                <br>
                            </div>
                            <div class="mb-3 row">
                                <label>Genero del Juego: </label>
                                <br>
                            </div>
                            <div class="mb-3 row">
                                <label>Descripcion de la Musica:</label>
                                <br>
                            </div>
                            <div class="mb-3 row">
                                <label>Imagen de la Musica:</label>
                                <br>
                            </div>

                        </div>
                        <div class="col-9">
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nombre" value="<?=$nombre?>">
                            </div>
                            <br>
                            <div class="col-sm-10">
                                <div  for="genero" class="form-group text-dark">
                                    <div>
                                        <label for="Aventura" class="radio-inline"><input
                                            type="radio"
                                            name="genero"
                                            value="Aventura"
                                            id="Aventura"/>Aventura</label>
                                        <label for="Deporte" class="radio-inline"><input
                                            type="radio"
                                            name="genero"
                                            value="Deporte"
                                            id="Deporte"/>Deporte</label>
                                        <label for="Estrategia" class="radio-inline"><input
                                            type="radio"
                                            name="genero"
                                            value="Estrategia"
                                            id="Estrategia"/>Estrategia</label>    
                                        <label for="Terror" class="radio-inline"><input
                                            type="radio"
                                            name="genero"
                                            value="Terror"
                                            id="Terror"/>Terror</label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="description" value="<?=$description?>">
                            </div>
                            <br>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="foto">
                            </div>
                        </div>    
                    </div>
                    <br>
                    <center>
                        <button class="btn btn-primary mt-2" type="submit">
                            <i class="fa-solid fa-pen-to-square"> ACTUALIZAR</i></button>
                    </center>    
                </form>
                <br>
                <h3 class="text-center"><?=$nombre?></h3>
                <p><?=$description?></p>
            </div>
        </div>
    </div>
</div>


<?php
include("../includes/footer.php");
?>