<?php
    $user = $_POST['userOld'];

    $conx = mysqli_connect("localhost", "root", "", "health_safe");
        
    $sql = "select nom_usuario, users.user, phone, password from users where users.user = '$user'";
    $res = mysqli_query($conx, $sql);
    $dataUser = [];

    if ($res->num_rows > 0 ) {
        
        $dataUser = $res->fetch_array();
    }
    echo json_encode($dataUser, JSON_UNESCAPED_UNICODE);
?>