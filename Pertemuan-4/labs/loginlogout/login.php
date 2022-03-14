<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <?php 
            session_start();
            
            if (isset($_POST['submit'])) {
                $users = array('2110141012' => '12', '2110141013' => '13', '2110141014' => '14');

                $username = isset($_POST['username']) ? $_POST['username'] : '';
                $password = isset($_POST['password']) ? $_POST['password'] : '';

                if (isset($users[$username]) && $users[$username] == $password) {
                    $_SESSION['userdata']['username'] = $username;
                    header("location:welcome.php");
                    exit;
                } else {
                    $eMsg = "<span style='color:red'>Username atau Password Salah!</span>";
                }
            } 
        ?>
        <form action="" method="post">
            <table class="card">
                <tr>
                    <td colspan="3"><p><?php if (isset($eMsg)) { echo $eMsg; }; ?></p></td>
                </tr>
                <tr>
                    <td><label for="uname">Username &nbsp;</label></td>
                    <td>:</td>
                    <td><div class="centerItem"><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td><label for="pass">Password &nbsp;</td>
                    <td>:</td>
                    <td><div class="centerItem"><input type="password" name="password"></div></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div class="centerItem">
                            <input type="submit" name="submit" value="Login">
                        </div>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>