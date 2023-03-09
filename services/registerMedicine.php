<?php

$code = $_POST['code'];
$name = $_POST['name'];
$presentation = $_POST['presentation'];
$due_date = $_POST['due_date'];
$amount = $_POST['amount'];


$conx = mysqli_connect("localhost", "root", "", "health_safe"); 
$sql = "insert into medicine values ('$code','$name','$presentation','$due_date','$amount')";
$res = mysqli_query($conx, $sql);

session_start();
if (!$res) {
    $_SESSION['msj'] = "Medicamento no agregado!!";
    $_SESSION['typeMsj'] = "error";
    $_SESSION['hmsj'] = "Error";

    header('Location: http://localhost/health_safe/html/UserMedicamentos.php');
}
else {
    $_SESSION['msj'] = "Medicamento agregado correctamente";
    $_SESSION['typeMsj'] = "success";
    $_SESSION['hmsj'] = "Buen trabajo!";

    header('Location: http://localhost/health_safe/html/UserMedicamentos.php');
}
?>