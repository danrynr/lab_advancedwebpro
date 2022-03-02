<?php
//Regular expression menggunakan preg_replace()
$subject = "Give me 10 eggs";
$pattern = '~\d+~';
$newstring = preg_replace($pattern, '6', $subject);
echo $newstring;
?>