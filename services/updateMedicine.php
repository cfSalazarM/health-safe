<?php
    $name = $_POST['name'];
    $presentation = $_POST['presentation'];
    $due_date = $_POST['due_date'];
    $amount = (int)$_POST['amount'];
    $amountOld = (int)$_POST['amountOld'];
    $codeOld = $_POST['codeOld'];

    $amount = $amount + $amountOld;

    $conx = mysqli_connect("localhost", "root", "", "health_safe");
        
    $sql = "update medicine set name = '$name', presentation = '$presentation', due_date = '$due_date', amount = '$amount' where code like '$codeOld'";
    $res = mysqli_query($conx, $sql);

    if (!$res) {
        
        echo json_encode("No se actualizo");
    }
    else {
        echo json_encode('Correcto');
    }
    header('Location: http://localhost/health_safe/html/UserMedicamentos.php')
?>