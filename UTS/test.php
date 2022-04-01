<?php
    $json_data = json_decode(file_get_contents('datauser.txt'), true);

    print_r($ps1 = $json_data['123']['course']['PS']); echo "<br>";
    print_r($vc1 = $json_data['123']['course']['VC']); echo "<br>";
    print_r($net1 = $json_data['123']['course']['NET']); echo "<br>";
    print_r($hp1 = $json_data['123']['course']['HP']); echo "<br>";

?>