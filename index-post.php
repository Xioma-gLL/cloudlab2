<?php
include("conexion.php");
$con = conexion();

$documento = $_POST["doc"];
$nombre    = $_POST["nom"];
$apellido  = $_POST["ape"];
$direccion = $_POST["dir"];
$celular   = $_POST["cel"];

$sql = "INSERT INTO persona(documento, nombre, apellido, direccion, celular) 
        VALUES('$documento','$nombre','$apellido','$direccion','$celular')";

pg_query($con, $sql);

header("location:index.php");
?>