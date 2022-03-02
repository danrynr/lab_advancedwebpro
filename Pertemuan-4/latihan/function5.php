<!DOCTYPE html>
<html>
    <head>
        <title>Writing php function which return value</title>
    </head>
    <body>
        <?php
            function printMe($param = NULL) {
                print $param;
            }

            printMe("Hello World!");
            printMe();
        ?>
    </body>
</html>