<?php
    $json_data = json_decode(file_get_contents('datauser.txt'), true);

    print_r($json_data);

?>