<?php
include 'dbcon.php';

$idp = $_GET['id'];

$quearydelete = "DELETE FROM productos WHERE id='$idp'";

$env = mysqli_query($con, $quearydelete);


if($env){
    header('Location: index.php?modulo=productos');
}
?>
