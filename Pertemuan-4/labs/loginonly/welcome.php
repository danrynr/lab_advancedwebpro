<!DOCTYPE html>
<html>
    <head>
        <title>Welcome Page</title>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <?php
        session_start();
        
        if (!isset($_SESSION['userdata']['username'])) {
            header("location:login.php");
            exit;
        }
        $date = date("d F Y").', '.date("h:i");
        ?>
        <div class="card">
            <h3><?php echo "Welcome ".$_SESSION['userdata']['username']."!"; ?></h3>
            <h3> <?php echo $_SESSION['userdata']['username']." berhasil login pada ".$date ; ?></h3>
            <div class="centerItem">
                <input type="submit" name="submit" value="Logout" onclick="location.href='logout.php'">
            </div>
        </div>
    </body>
</html>