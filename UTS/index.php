<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="300">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    <?php
        echo "You are here.";

        $timeout = 300;
        ini_set("session.gc_maxlifetime", $timeout);

        session_start();

        $session_name = session_name();

        if(isset($_COOKIE[$session_name])) {
            setcookie($session_name, $_COOKIE[$session_name], time() + $timeout, '/');
            
        }

        if(!isset($_COOKIE[$session_name])) {
            header("location:login.php");
        }

        //Harga per item
        $ps = 120000;   
        $vc = 110000;
        $net = 100000;
        $hp = 80000;
        
        $jumps = $_POST['ps-q'];
        $jumvc = $_POST['vc-q'];
        $jumnet = $_POST['net-q'];
        $jumhp = $_POST['hp-q'];

        $ps = $ps * $jumps;
        $vc = $vc * $jumvc;
        $net = $net * $jumnet;
        $hp = $hp * $jumhp;



        $kursus = $ps + $vc + $net + $hp;

        

        $pilkursus = ($jumps ? 1 : 0) + ($jumvc ? 1 : 0) + ($jumnet ? 1 : 0) + ($jumhp ? 1 : 0);
        
        if($kursus > 2000000) {
            $kursus = $kursus - ($kursus * 10) / 100;
        } else if($pilkursus == 3) {
            $kursus = $kursus - ($kursus * 5) / 100;
        } else if($pilkursus == 2) {
            $kursus = $kursus - ($kursus * 2) / 100;
        }
        

        echo $_SESSION['gender'];

        if(isset($_POST['sub'])) {
            echo $kursus;
        }
    ?>

    
        <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
            <div class="card shadow">
                <h2>Pilih Kursus</h2>
                <div class="course">
                    <p>PHP + SQL</p><input type=number name="ps-q">
                    <p>Virtualisasi + Cloud</p><input type=number name="vc-q">
                    <p>Networking</p><input type=number name="net-q">
                    <p>Hardware + Peripheral</p><input type=number name="hp-q">
                    <button name="sub">TST</button>
                </div>
            </div>

            <div class="card shadow">
                <div class="subtotal">
                    <?php echo "Rp $subtotal";?>

                    <p><?php echo $_SESSION['gender']; ?></p>
                </div>
            </div>
        </form>
</body>
</html>