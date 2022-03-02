<!DOCTYPE html>
<html>
    <head>
        <title>Dynamic function calls</title>
    </head>
    <body>
        <?php
            function sayHello() {
                echo "Hello<br>";
            }

            $function_holder = "sayHello";
            $function_holder();
        ?>
    </body>
</html>