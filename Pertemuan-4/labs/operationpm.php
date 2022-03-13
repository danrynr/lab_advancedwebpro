<!DOCTYPE html>
<html>
    <head>
        <title>Penjumlahan dan Pengurangan</title>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
    
    <form method="POST">
        <h3>Penjumlahan & Pengurangan</h3>
        <table>
            <tr><label for="Bilangan 1">Angka 1 : &nbsp;</label></tr>
            <tr><input type="number" name="num1" placeholder="x1"></tr>
            <tr><label for="Bilangan 2">Angka 2 : &nbsp;</label></tr>
            <tr><input type="number" name="num2" placeholder="x2"></tr>
            <input type="radio" id="btn1" name="plusmin" value="plus" checked="checked">
            <label for="operation" name="type">Penjumlahan</label>
            <input type="radio" id="btn2" name="plusmin" value="min">
            <label for="operation" name="type">Pengurangan</label>
            <tr><input type="submit" value="submit"></tr>
        </table>
    </form>
    <div class="output">
    <?php
        if (isset($_POST['plusmin']) && isset($_POST['num1']) && isset($_POST['num2'])) {
            $nums1 = $_POST['num1'];
            $nums2 = $_POST['num2'];
            $plusmin = $_POST['plusmin'];
            $read = fopen('./fileoutput/hasil.txt', "a+");

            echo "<h3>Hasil</h3>";

            function penjumlahan($num1, $num2) {
                return $num1 + $num2;
            }
            function pengurangan($num1, $num2) {
                return $num1 - $num2;
            }

            if ($plusmin == 'plus') {
                $result = penjumlahan($nums1, $nums2);
                echo $nums1 . " + " . $nums2 . " = " . $result;
                fwrite($read, $nums1 . " + " . $nums2 . " = " . $result . "\n");

            } else if ($plusmin == 'min') {
                $result = pengurangan($nums1, $nums2);
                echo $nums1 . " - " . $nums2 . " = " . $result;
                fwrite($read, $nums1 . " - " . $nums2 . " = " . $result . "\n");
            }

            fclose($read);
        }

    ?>  
    </div>
    </body>
</html>