<!DOCTYPE html>
<html>
    <head>
        <title>Simple Calculator</title>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
    <div class="main">
    <form method="POST" action="<?php $_SERVER["PHP_SELF"]?>">
        <h3>Kalkulator Sederhana</h3>
        <table>
            <tr id="label">
                <td><label for="Bilangan 1">Angka 1 : </label></td>
                <td><input type="number" name="num1" placeholder="0"></td>
            </tr>
            <tr id="label">
                <td><label for="Bilangan 2">Angka 2 : </label></td>
                <td><input type="number" name="num2" placeholder="0"></td>
            </tr>
        </table>
        <table class="op">
            <tr>
                <td><input type="submit" id="btn2" name="operation" value="x"></td>
                <td><input type="submit" id="btn2" name="operation" value="/"></td>
            </tr>
            <tr>
                <td><input type="submit" id="btn1" name="operation" value="+"></td>
                <td><input type="submit" id="btn2" name="operation" value="-"></td>
            </tr>
        </table>
    </form>
    
    <?php
        echo "<h3 class='title'>RESULT</h3>";
        include "./bilangan.php";
        require "./operation.php";
        echo "<div class='result'>";
        echo "<h3>$result</h3>";
        echo "</div>";
        include "./footer.php";
    ?>  
    </div>
    </body>
</html>