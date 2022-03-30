<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NIX Course | Login</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    <?php       
        if (isset($_POST['login'])) {
                $username = isset($_POST['username']) ? $_POST['username'] : '';
                $password = isset($_POST['password']) ? $_POST['password'] : '';
                
                if ($username == '' || $password == '') {
                    $msg = "<span style='color:red'>Username dan Password harus diisi!</span>";
                } else {
                    $pattern = "/[,]+/";

                    $lines = file_get_contents('datauser.txt');
                    $lines = explode("\n", $lines);
                    
                    $gender;

                    foreach ($lines as $line) {
                        $data = preg_split($pattern, $line);

                        $username_array[] = $data[6];
                        $password_array[] = $data[7];
                        $gender = $data[2];
                    }

                    echo $gender;

                    if (in_array($username, $username_array) && in_array($password, $password_array) && $username == $password) {
                        

                        session_start();
                        $_SESSION['username'] = $username;
                        $_SESSION['gender'] = $gender;
                        // header("location:index.php");
                        echo $gender;
                        exit;
                    } else {
                        $msg = "<span style='color:red'>Username atau Password salah!</span>";
                    }
                }
        }
    ?>

    <div class="card shadow">
        <h2>Login</h2>
        <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
            <p><?php if (isset($msg)) { echo $msg; }; ?></p>
            <label for="username">Username</label><br>
            <input type="text" name="username"><br>
            <label for="password">Password</label><br>
            <input type="password" name="password"><br>
            <button name="login" value="Login">Login</button>
        </form>
    </div>
</body>
</html>