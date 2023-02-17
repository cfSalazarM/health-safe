<?php
    $user = $_POST['user'];
    $pass = $_POST['password'];
    $rol = $_POST['rol'];
    $conx = mysqli_connect("localhost", "root", "", "health_safe");
   

    $sql = "SELECT * FROM users WHERE users.nom_usuario = '$user' AND users.password = '$pass' and rol ='$rol'";
    $res = mysqli_query($conx, $sql);
    
    if ($res->num_rows > 0 ) { 
        if ($rol == "admin") {
            header('Location: http://localhost/health_safe/html/adminHome.php');
        }elseif ($rol == "user") {
            header('Location: http://localhost/health_safe/html/UserHome.php');
        }
        
    }
    else {
        header('Location: http://localhost/health_safe/html');
    }
    
    
?>