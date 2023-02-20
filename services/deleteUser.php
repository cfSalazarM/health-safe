<?php
    $user = $_POST['user'];
    
    $conx = mysqli_connect("localhost","root","","health_safe");
    $sql ="DELETE FROM users where user = '$user'";
    $res = mysqli_query($conx,$sql);
    if (!$res) {
        echo "No se ha Eliminado";
    } else{
        header("../html/AdminUsers.php");
    }
?>