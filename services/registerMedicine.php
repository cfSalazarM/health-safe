<?php

$code = $_POST['code'];
$name = $_POST['name'];
$presentation = $_POST['presentation'];
$due_date = $_POST['due_date'];
$amount = $_POST['amount'];


$conx = mysqli_connect("localhost", "root", "", "health_safe"); 
$sql = "insert into medicine values ('$code','$name','$presentation','$due_date','$amount')";
$res = mysqli_query($conx, $sql);

if (!$res) {
    echo json_encode("No se hizo el registro");
}
else {
        echo json_encode('Correcto');
        header('Location: http://localhost/health_safe/html/UserMedicamentos.php');
}
?>