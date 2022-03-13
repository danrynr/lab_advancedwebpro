<?php
    require "./bilangan.php";

    function penjumlahan($num1, $num2) {
        return $num1 + $num2;
    }
    function pengurangan($num1, $num2) {
        return $num1 - $num2;
    }
    function perkalian($num1, $num2) {
        return $num1 * $num2;
    }
    function pembagian($num1, $num2) {
        return $num1 / $num2;
    }

    global $result;

    switch($operation) {
        case '+':
            $result = penjumlahan($num1, $num2);
            break;
        case '-':
            $result = pengurangan($num1, $num2);
            break;
        case 'x':
            $result = perkalian($num1, $num2);
            break;
        case '/':
            $result = pembagian($num1, $num2);
            break;
        default:
            $result = 0;
            break;
    }
?>