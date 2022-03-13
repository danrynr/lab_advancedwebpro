<!DOCTYPE html>
<html>
    <head>
        <title>Penjumlahan dan Pengurangan</title>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <div class="output">
            <h3>SPLIT</h3>
            <?php
                $text = "Institut Teknologi dan Bisnis Kalbis";

                $words = explode(" ", $text);
                
                echo $text. "<br>";

                foreach ($words as $word) {
                    echo $word . "<br>";
                }
            ?>
        </div>
    </body>
</html>