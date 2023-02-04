<?php

function conexion(){
    $conexion = mysqli_connect(
        'localhost',
        'root',
        'Sr-Douglas-31',
        'listas'
    );
    return $conexion;
}

function listar(){
    $sql="SELECT * FROM musicas";
    $query = mysqli_query(conexion(), $sql);
    return $query;
}
function insertar($nombre,$description,$foto,$link){
    $sql="INSERT INTO musicas(nombre,description,foto,link) Values('$nombre','$description','$foto','$link')";
    $query = mysqli_query(conexion(), $sql);
    return $query;
}
function eliminar($id){
    $sql="DELETE from musicas WHERE id=$id";
    $query = mysqli_query(conexion(), $sql);
    return $query;
}
function ListarunDato($id){
    $sql="SELECT * FROM musicas WHERE id=$id";
    $query = mysqli_query(conexion(), $sql);
    return mysqli_fetch_assoc($query);
}
function actualizar($id,$nombre,$description,$foto,$link){
    $sql="UPDATE musicas set nombre='$nombre',description='$description',foto='$foto',link='$link' WHERE id=$id";
    $query = mysqli_query(conexion(), $sql);
    return $query;
}
function actualizarSinFoto($id,$nombre,$description,$link){
    $sql="UPDATE musicas set nombre='$nombre',description='$description', link='$link' WHERE id=$id";
    $query = mysqli_query(conexion(), $sql);
    return $query;
}
function numeric($id){
    $sort_option = "";
    if(isset($_GET['sort_numeric'])){
        if($_GET['sort_numeric'] == "low-high"){
            $sort_option = "ASC";
        }elseif($_GET['sort_numeric'] == "high-low"){
            $sort_option = "DESC";
        }
    }
    $sql="SELECT * FROM musicas ORDER BY id $sort_option";
    $query = mysqli_query(conexion(),$sql);
    return $query;
}

?>