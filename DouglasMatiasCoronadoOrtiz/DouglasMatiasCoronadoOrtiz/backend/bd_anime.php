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
    $sql="SELECT * FROM anime";
    $query = mysqli_query(conexion(), $sql);
    return $query;
}
function insertar($nombre,$description,$foto){
    $sql="INSERT INTO anime(nombre,description,foto) Values('$nombre','$description','$foto')";
    $query = mysqli_query(conexion(), $sql);
    return $query;
}
function eliminar($id){
    $sql="DELETE from anime WHERE id=$id";
    $query = mysqli_query(conexion(), $sql);
    return $query;
}
function ListarunDato($id){
    $sql="SELECT * FROM anime WHERE id=$id";
    $query = mysqli_query(conexion(), $sql);
    return mysqli_fetch_assoc($query);
}
function actualizar($id,$nombre,$description,$foto){
    $sql="UPDATE anime set nombre='$nombre',description='$description',foto='$foto' WHERE id=$id";
    $query = mysqli_query(conexion(), $sql);
    return $query;
}
function actualizarSinFoto($id,$nombre,$description){
    $sql="UPDATE anime set nombre='$nombre',description='$description' WHERE id=$id";
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
    $sql="SELECT * FROM anime ORDER BY id $sort_option";
    $query = mysqli_query(conexion(),$sql);
    return $query;
}

?>