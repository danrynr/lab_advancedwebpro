<!DOCTYPE html>
<html>
    <head>
        <title>Tambah data mahasiswa</title>
    </head>
    <body>
    <?php
    $filename = "./mahasiswa.txt";
    $file = fopen($filename, "r");

        if ($file == false) {
            echo ("Error in opening file");
            exit;
        }

        $filesize = filesize($filename);
        $filetext = fread($file, $filesize);
        
        fclose($file);

    if (isset($_POST['nrp'])) {
        $wfile = fopen($filename, "a");
        if ($wfile == false) {
            echo ("Error in opening file");
            exit;
        }
        $input = $_POST['nrp'];
        fwrite($wfile, "\n". $input);
        fclose($file);
    }
    ?>
    
    <form method="POST">
        <table>
            <tr><label for="NRP">NRP : &nbsp;</label></tr>
            <tr><input type="number" name="nrp" placeholder="0000000000"></tr>
            <tr><input type="submit" value="submit"></tr>
        </table>
    </form>
    <div class="output">
        <?php 
        $keywords = preg_split("/[\s,]+/", $filetext);
        foreach ($keywords as $keyword) {
            echo print_r($keyword) . "<br>";
        }
        ?>
    </div>
    </body>
</html>