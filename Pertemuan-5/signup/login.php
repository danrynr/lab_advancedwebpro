<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <?php
            session_start();
            
            if (isset($_POST['login'])) {
                if (isset($_POST['username']) && isset($_POST['password'])) {
                    $username = isset($_POST['username']) ? $_POST['username'] : '';
                    $password = isset($_POST['password']) ? $_POST['password'] : '';
                    
                    $pattern = "/[;]+/";

                    $lines = file_get_contents('datauser.txt');
                    $lines = explode("\n", $lines);
                    
                    foreach ($lines as $line) {
                        $data = preg_split($pattern, $line);

                        $username_array[] = $data[6];
                        $password_array[] = $data[7];
                    }

                    if ($username == '' || $password == '') {
                        $msg = "<span style='color:red'>Username dan Password harus diisi!</span>";
                    } else {
                        if (in_array($username, $username_array) && in_array($password, $password_array) && $username == $password) {
                            $_SESSION['username'] = $username;
                            header("location:welcome.php");
                            exit;
                        } else {
                            $msg = "<span style='color:red'>Username atau Password salah!</span>";
                        }
                    }
                }
            }
        ?>
        <div class="card panel-c shadow">
            <div class="centerItem"><h3>Login</h3></div>
            <form action="" method="post">
                <table>
                    <tr>
                        <td colspan="3"><p><?php if (isset($msg)) { echo $msg; }; ?></p></td>
                    </tr>
                    <tr>
                        <td><label for="uname">Username &nbsp;</label></td>
                        <td>:</td>
                        <td><input type="text" name="username"></td>
                    </tr>
                    <tr>
                        <td><label for="pass">Password &nbsp;</td>
                        <td>:</td>
                        <td><input type="password" name="password"></td>
                    </tr>
                    <tr>
                        <td colspan="3"><input type="submit" name="login" value="Login"></td>
                    </tr>
                </table>
            </form>
            <p>Belum memiliki akun? <a href="./signup.php">sign up</a></p>
            <?php
                include './footer.php';
            ?>
        </div>
    </body>
</html>