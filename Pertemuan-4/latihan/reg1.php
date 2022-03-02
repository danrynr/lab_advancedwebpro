<?php
//reg1.php: Regular Expression menggunakan preg_match()
$subject =  "Give me 10 eggs";
$pattern = '~\b(\d+)\s*(\w+)$~';

$success = preg_match($pattern, $subject, $match); 

if ($success) {
    echo "Match: ".$match[0]."<br>";
    echo "Group 1: ".$match[1]."<br>";
    echo "Group 2: ".$match[2]."<br>";
}
?>