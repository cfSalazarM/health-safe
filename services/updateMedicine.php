<?php
// carga las variables con los datos de cada elemento html
    $name = $_POST['name'];
    $presentation = $_POST['presentation'];
    $due_date = $_POST['due_date'];
    $amount = (int)$_POST['amount'];
    $amountOld = (int)$_POST['amountOld'];
    $codeOld = $_POST['codeOld'];

    // se obtiene fecha actual y fecha ingresada
    $currentDate = strtotime(date('Y-m-d H:i:s',time()));
    $date = strtotime($due_date);
    
    // suma las cantidades del medicamento
    $amount = $amount + $amountOld;
    session_start();
    if (empty($name) or empty($presentation) or empty($due_date) or empty($amount) or empty($codeOld)) {
        $_SESSION['msj'] = "Por favor, llena todos los campos!!";
        $_SESSION['typeMsj'] = "error";
        $_SESSION['hmsj'] = "Error";

        header('Location: http://localhost/health_safe/html/UserMedicamentos.php');
    }
    // validadción de fecha de medicamentos
    if ($currentDate > $date) {
        $_SESSION['msj'] = "Fecha  no valida";
        $_SESSION['typeMsj'] = "error";
        $_SESSION['hmsj'] = "Error";
    }  
    else{
        $conx = mysqli_connect("localhost", "root", "", "health_safe");
        
        $sql = "update medicine set name = '$name', presentation = '$presentation', due_date = '$due_date', amount = '$amount' where code like '$codeOld'";
        $res = mysqli_query($conx, $sql);

        if (!$res) {
            
            $_SESSION['msj'] = "Medicamento no Actualizado";
            $_SESSION['typeMsj'] = "error";
            $_SESSION['hmsj'] = "Error!";
        }
        else {
            $_SESSION['msj'] = "Medicamento Actualizado";
            $_SESSION['typeMsj'] = "success";
            $_SESSION['hmsj'] = "Buen trabajo!";
        }
        header('Location: http://localhost/health_safe/html/UserMedicamentos.php');
       $conexion->close();
   }
?>
    