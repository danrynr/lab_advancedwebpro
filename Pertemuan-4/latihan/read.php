<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reading a file using php</title>
</head>
<body>
    <?php
        $filename = "./read.txt";
        $file = fopen($filename, "r");

        if ($file == false) {
            echo ("Error in opening file");
            exit;
        }

        $filesize = filesize($filename);
        $filetext = fread($file, $filesize);

        fclose($file);
        
        echo ("File size: $filesize bytes");
        echo ("<pre>$filetext</pre>");
    ?>
</body>
</html>