<!DOCTYPE html>
<html>
    <head>
        <title>Student List</title>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <?php
        $student = array();

        $student[2110141040] = array (
            "nama" => "Jeni Abdulrokhim",
            "tanggal_lahir" => "11-01-1997"
        );
        $student[2110141042] = array (
            "nama" => "Afif Rusdiawan Akbar",
            "tanggal_lahir" => "10-05-1995"
        );
        $student[2110141043] = array (
            "nama" => "Izzatul Millah",
            "tanggal_lahir" => "27-04-1996"
        );
        $student[2110141044] = array(
            "nama" => "Zharfan Abshar Anantha",
            "tanggal_lahir" => "31-05-1996"
        );
        $student[2110141045] = array(
            "nama" => "Muhamad Taufiqurachman",
            "tanggal_lahir" => "03-05-1995"
        );
        $student[2110141047] = array(
            "nama" => "Labba Awwabi",
            "tanggal_lahir" => "17-08-1996"
        );
        echo "<div class='list'>";
        echo "<h3>Student List</h3>";
        foreach ($student as $key => $value) {
            echo "<div class='card'>";
            echo "<div class='student'>";
            echo "<p><b>NRP: </b>$key</p>";
            echo "<p><b>Nama : </b>$value[nama]</p>";
            echo "<p><b>Tanggal Lahir : </b>$value[tanggal_lahir]</p>";
            echo "</div>";
            echo "</div>";
        }
        echo "</div>";

        echo "<div class='list'>";
        echo "<h3>Student List With odd NRP</h3>";
        foreach ($student as $key => $value) {
            if ($key % 2 != 0) {
                echo "<div class='card'>";
                echo "<div class='student'>";
                echo "<p><b>NRP: </b>$key</p>";
                echo "<p><b>Nama : </b>$value[nama]</p>";
                echo "<p><b>Tanggal Lahir : </b>$value[tanggal_lahir]</p>";
                echo "</div>";
                echo "</div>";
            }
        }
        echo "</div>";
        ?>   
    </body>
</html>