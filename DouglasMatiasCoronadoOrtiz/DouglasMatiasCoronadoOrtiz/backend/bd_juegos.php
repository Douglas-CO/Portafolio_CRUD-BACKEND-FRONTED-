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
    $sql="SELECT * FROM juegos";
    $query = mysqli_query(conexion(), $sql);
    return $query;
}
function insertar($nombre,$description,$foto,$genero){
    $sql="INSERT INTO juegos(nombre,description,foto,genero) Values('$nombre','$description','$foto','$genero')";
    $query = mysqli_query(conexion(), $sql);
    return $query;
}
function eliminar($id){
    $sql="DELETE from juegos WHERE id=$id";
    $query = mysqli_query(conexion(), $sql);
    return $query;
}
function ListarunDato($id){
    $sql="SELECT * FROM juegos WHERE id=$id";
    $query = mysqli_query(conexion(), $sql);
    return mysqli_fetch_assoc($query);
}
function actualizar($id,$nombre,$description,$foto,$genero){
    $sql="UPDATE juegos set nombre='$nombre',description='$description',foto='$foto',genero='$genero' WHERE id=$id";
    $query = mysqli_query(conexion(), $sql);
    return $query;
}
function actualizarSinFoto($id,$nombre,$description,$genero){
    $sql="UPDATE juegos set nombre='$nombre',description='$description',genero='$genero' WHERE id=$id";
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
    $sql="SELECT * FROM juegos ORDER BY id $sort_option";
    $query = mysqli_query(conexion(),$sql);
    return $query;
}






?>