<!DOCTYPE html>
<html>
    <head>
        <title>Pendaftaran Mahasiswa Berprestasi</title>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        
        <form method="POST" action="<?php $_SERVER["PHP_SELF"]?>">
            <h3>Pendaftaran Mahasiswa Berprestasi</h3>
            <table>
                <tr>
                    <td><label for="nrp">NRP</label></td>
                    <td>:</td>
                    <td><input type="number" name="nrp" placeholder="2110141038"></td>
                </tr>
                <tr>
                    <td><label for="name">Nama Mahasiswa</label></td>
                    <td>:</td>
                    <td><input type="text" name="name" placeholder="Tom"></td>
                </tr>
                <tr>
                    <td><label for="class">Kelas</label></td>
                    <td>:</td>
                    <td><input type="text" name="class" placeholder="3D4 IT B"></td>
                </tr>
                <tr>
                    <td><label for="major">Prodi</label></td>
                    <td>:</td>
                    <td><input type="text" name="major" placeholder="Informatics"></td>
                </tr>
                <tr>
                    <td><label for="achievement">Prestasi</label></td>
                    <td>:</td>
                    <td><input type="text" name="achievement" placeholder="Hackathon 2021"></td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td><input type="submit" value="Submit"></td>
                </tr>
            </table>
        </form>

        <div class="output">

            <?php
                if (!isset($_POST['nrp']) || !isset($_POST['name']) || !isset($_POST['class']) || !isset($_POST['major'])) {
                   die;
                }

                $data = array_values($_POST);
                $table = "
                    <table class='table'>
                    <tr>
                        <td>NRP</td>
                        <td>:</td>
                        <td>".$data[0]."</td>
                    </tr>
                    <tr>
                        <td>Nama Mahasiswa</td>
                        <td>:</td>
                        <td>".$data[1]."</td>
                    </tr>
                    <tr>
                        <td>Kelas</td>
                        <td>:</td>
                        <td>".$data[2]."</td>
                    </tr>
                    <tr>
                        <td>Prodi</td>
                        <td>:</td>
                        <td>".$data[3]."</td>
                    </tr>
                    <tr>
                        <td>Prestasi</td>
                        <td>:</td>
                        <td>".$data[4]."</td>
                    </tr>
                ";
                echo "<h3>Pendaftaran Mahasiswa Berprestasi</h3>";
                echo $table;
            ?>
        </div>
    </body>
</html>