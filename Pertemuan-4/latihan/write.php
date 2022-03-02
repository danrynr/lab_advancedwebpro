<?php
    $filename = "./write.txt";
    $file = fopen($filename, "w");

    if ($file == false) {
        echo ("Error in opening file");
        exit;
    }
    
    fwrite($file, "This is a simple test\n");
    fclose($file);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Writing a file using php</title>
</head>
<body>
    <?php
        if (file_exists($filename)) {
            $filesize = filesize($filename);
            $msg = "File created with name $filename";
            $msg .= " containing $filesize bytes";
            echo ($msg);
        }
    ?>
</body>
</html>