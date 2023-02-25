<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Usuario</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/main.css'>
    <script src='../js/bootstrap.bundle.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
</head>

<body>
<?php
        session_start();
        $aux =$_SESSION['l_ok'];
        $rol = $aux['rol'];
        
         if(isset($_SESSION['l_ok']) and $rol == 'user'){
            ?>
        <script src="../js/mainUser.js"></script>
        <div class="container d-flex justify-content-center">
            <img src="../assets/logo.png" alt="">
        </div>
        <?php    
            }
            else {
                if ($rol == 'admin') {
                    header ('Location: http://localhost/health_safe/html/AdminHome.php');
                } else {
                    header ('Location: http://localhost/health_safe/html/');
                }
            }    
        ?>        

</body>

</html>