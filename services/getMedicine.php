<?php
    $code = $_POST['codeOld'];

    $conx = mysqli_connect("localhost", "root", "", "health_safe");
        
    $sql = "select code, name, presentation, due_date, amount from medicine where code = '$code'";
    $res = mysqli_query($conx, $sql);
    $dataMedicine = [];

    if ($res->num_rows > 0 ) {
        
        $dataMedicine = $res->fetch_array();
    }
    echo json_encode($dataMedicine, JSON_UNESCAPED_UNICODE);
?>