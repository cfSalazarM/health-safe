<?php

$code = $_POST['code'];
$name = $_POST['name'];
$presentation = $_POST['presentation'];
$due_date = $_POST['due_date'];
$amount = $_POST['amount'];

// se obtiene fecha actual y fecha ingresada
$currentDate = strtotime(date('Y-m-d H:i:s',time()));
$date = strtotime($due_date);




session_start();
if (empty($code) or empty($name) or empty($presentation) or empty($due_date) or empty($amount)) {
    $_SESSION['msj'] = "Por favor, llena todos los campos!!";
    $_SESSION['typeMsj'] = "error";
    $_SESSION['hmsj'] = "Error";

    header('Location: http://localhost/health_safe/html/UserMedicamentos.php');
}elseif ($currentDate > $date) {  // validadción de fecha de medicamentos
    $_SESSION['msj'] = "Fecha  no valida";
    $_SESSION['typeMsj'] = "error";
    $_SESSION['hmsj'] = "Error";

    header('Location: http://localhost/health_safe/html/UserMedicamentos.php');
}else{
    $conx = mysqli_connect("localhost", "root", "", "health_safe"); 
    $sql = "insert into medicine values ('$code','$name','$presentation','$due_date','$amount')";
    $res = mysqli_query($conx, $sql);

    if (!$res) {
        $_SESSION['msj'] = "Medicamento no agregado!!";
        $_SESSION['typeMsj'] = "error";
        $_SESSION['hmsj'] = "Error";
    
        header('Location: http://localhost/health_safe/html/UserMedicamentos.php');
    }else {
        $_SESSION['msj'] = "Medicamento agregado correctamente";
        $_SESSION['typeMsj'] = "success";
        $_SESSION['hmsj'] = "Buen trabajo!";
        
        header('Location: http://localhost/health_safe/html/UserMedicamentos.php');
    
    }
}


?>