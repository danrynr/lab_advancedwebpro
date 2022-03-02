<!DOCTYPE html>
<html>
    <body>
        <?php
        $x = 50;
        $y = 25;
        
        function myTest() {
            global $x, $y;
            $y = $x + $y;
        }

        myTest();
        echo $y;
        ?>
    </body>
</html>