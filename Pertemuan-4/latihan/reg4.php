<?php
$line = "Vi is the greatest word processor ever created!";
//perform a case-insensitive search for the word "Vi"
if (preg_match("/\bVi\b/i", $line, $match)) :
    print "Match found!";
    endif;
?>