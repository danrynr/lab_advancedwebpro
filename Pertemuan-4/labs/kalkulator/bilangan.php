<?php
    global $operation, $num1, $num2;
    if (isset($_POST['operation']) && isset($_POST['num1']) && isset($_POST['num2'])) {
        $operation = $_POST['operation'];    
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
    }
?>