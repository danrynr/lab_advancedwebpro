<?php
//split the phrases by any number of commas or space characters, which include " ", \r, \t, \n and \f
$keywords = preg_split("/[\s,]+/", "hypertext language, programming");
print_r($keywords);
?>