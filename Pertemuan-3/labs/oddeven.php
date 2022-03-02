<!DOCTYPE html>
<html>
    <head>
        <title>OddEvenNumbers</title>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <form method="POST" action="<?php $_SERVER["PHP_SELF"]?>">
            <h3>Odd Even</h3>
            <label for="number">Number count: </label>
            <input type="number" name="number" value="number" placeholder="N number">
            <input type="radio" id="btn1" name="oddeven" value="odd" checked="checked">
            <label for="odd" name="type">odd</label>
            <input type="radio" id="btn2" name="oddeven" value="even">
            <label for="even" name="type">even</label>
            <input type="submit" name="submit" value="Submit">
        </form>

        <div class="output">
            <?php 
                if (isset($_POST['submit']) && isset($_POST['oddeven']) && isset($_POST['number'])) {
                    $number = $_POST['number'];
                    $oddeven = $_POST['oddeven'];

                    echo "<h3>Output:</h3>";

                    if ($oddeven == 'odd') {
                        for ($i = 0; $i < 49; $i++) {
                            if ($i % 2 != 0 && $i % 3 != 0 && $i % 7 != 0) {
                                $array[] = $i;
                            }
                        }
                        for ($j = 0; $j < $number; $j++) {
                            echo $array[$j] . ' ';
                        }
                    } else if ($oddeven == 'even') {
                        for ($i = 0; $i < 49; $i++) {
                            if ($i % 2 == 0 && $i % 6 != 0 && $i % 8 != 0) {
                                $array[] = $i;
                            }
                        }
                        for ($j = 0; $j < $number; $j++) {
                            echo $array[$j] . ' ';
                        }
                    }  
                }
            ?>
        </div>
    </body>
</html>