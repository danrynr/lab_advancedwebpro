<!DOCTYPE html>
<html>
    <head>
        <title>Writing php function with parameters</title>
    </head>
    <body>
        <?php
            function addFunction($num1, $num2) {
                $num = $num1 + $num2;
                echo "Sum of the two numbers is : $num";
            }

            addFunction(10, 20);
        ?>
    </body>
</html>