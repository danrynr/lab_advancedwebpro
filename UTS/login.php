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
                $json_data = json_decode(file_get_contents('datauser.txt'), true);
                
                if ($json_data[$username] == TRUE && $password == $json_data[$username]["password"]) {
                    session_start();
                    $_SESSION['username'] = $username;
                    $_SESSION['gender'] = $json_data[$username]["gender"];
                    header("location:index.php");
                    echo $gender;
                    exit;
                    $msg = "<span style='color:green'>Login berhasil!</span>";
                } else {
                    $msg = "<span style='color:red'>Username atau Password salah!</span>";
                }
            }
        }
    ?>

    <div class="card shadow">
        <h2>Login</h2>
        <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
            <p class="warning"><?php if (isset($msg)) { echo $msg; }; ?></p>
            <label for="username">Username</label><br>
            <input type="text" name="username"><br>
            <label for="password">Password</label><br>
            <input type="password" name="password"><br>
            <button name="login" value="Login">Login</button>
            <p>Sudah memiliki akun? Silakan <a class="btn" href="./signup.php">Daftar</a></p>
        </form>
    </div>
</body>
</html>