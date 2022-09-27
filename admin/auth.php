<?php

    session_start();

    $email = ($_POST["email"]);
    $clave = ($_POST["pass"]);
    $clave = md5($clave);
    
    include "dbcon.php";

    $query = "SELECT * from usuarios where email = '".$email."' and pass = '".$clave."' ";


    $res = mysqli_query($con,$query);

    $row = mysqli_fetch_assoc($res);

    if($row){
        $_SESSION["id"]=$row['id'];
        $_SESSION["email"]=$row['email'];
        $_SESSION["nombre"]=$row['nombre'];
        header("location: index.php");
    }
    else{

    }
?> 