<!DOCTYPE html>
<html>
    <head>
        <title>Tambah data mahasiswa</title>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
    
    <form method="POST">
        <table>
            <tr><label for="NRP">NRP : &nbsp;</label></tr>
            <tr><input type="number" name="nrp" placeholder="0000000000"></tr>
            <tr><input type="submit" value="submit"></tr>
        </table>
    </form>
    <div class="output">
        <?php
            $read = fopen('./fileoutput/mahasiswa.txt', "a+");
            if (isset($_POST['nrp'])) {
                fwrite($read, $_POST['nrp'] . "\n");
                fseek($read, 0);
            }

            $data = fread($read, filesize('mahasiswa.txt'));
            $result = explode("\n", $data);

            foreach ($result as $output) {
                echo "NRP : " . $output . "<br>";
            }

            fclose($read);
        ?>
    </div>
    </body>
</html>