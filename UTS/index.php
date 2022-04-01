<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content="12"> -->
    <title>Dashboard</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    <?php
        $timeout = 3600;
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

        $json_data = json_decode(file_get_contents('datauser.txt'), true); 
        $json_prev = json_decode(file_get_contents('datauser.txt'), true);

        // $ps1 = $json_data[$_SESSION[$username]]['course']['PS'];
        // $vc1 = $json_data[$_SESSION[$username]]['course']['VC'];
        // $net1 = $json_data[$_SESSION[$username]]['course']['NET'];
        // $hp1 = $json_data[$_SESSION[$username]]['course']['HP'];

        if(isset($_POST['save'])) {
            $jumps = $_POST['ps-q'];
            $jumvc = $_POST['vc-q'];
            $jumnet = $_POST['net-q'];
            $jumhp = $_POST['hp-q'];

            //JUMLAH ITEM
            $ps1 = $ps * $jumps;
            $vc1 = $vc * $jumvc;
            $net1 = $net * $jumnet;
            $hp1 = $hp * $jumhp;

            
            $json_data[$_SESSION[$username]]['course']['PS'] = $ps1;
            $json_data[$_SESSION[$username]]['course']['VC'] = $vc1;
            $json_data[$_SESSION[$username]]['course']['NET'] = $net1;
            $json_data[$_SESSION[$username]]['course']['HP'] = $hp1;

            //Save the data to the file
            $json_data = json_encode($json_data);
            file_put_contents('datauser.txt', $json_data);


            //TOTAL KURSUS
            $kursus = $ps1 + $vc1 + $net1 + $hp1;

            $diskon1 = 0;
            $diskon2 = 0;

            $pilkursus = ($jumps ? 1 : 0) + ($jumvc ? 1 : 0) + ($jumnet ? 1 : 0) + ($jumhp ? 1 : 0);
            
            $gender = $_SESSION['gender'];

            if($kursus > 2000000) {
                $diskon1 = ($kursus * 10) / 100;
            } else if($pilkursus == 3) {
                $diskon1 = ($kursus * 5) / 100;
            } else if($pilkursus == 2) {
                $diskon1 = ($kursus * 2) / 100;
            }
            
            if($gender == "L") {
                $diskon2 = ($kursus * 3) / 100;
            } else {
                $diskon2 = ($kursus * 2) / 100;
            }

            //SUBTOTAL
            $subtotal = $kursus - ($diskon1 + $diskon2);

            //NUMBER FORMAT
            $ps_text = number_format($ps1, 2, ',', '.');
            $vc_text = number_format($vc1, 2, ',', '.');
            $net_text = number_format($net1, 2, ',', '.');
            $hp_text = number_format($hp1, 2, ',', '.');

            $diskon1_text = number_format($diskon1, 2, ',', '.');
            $diskon2_text = number_format($diskon2, 2, ',', '.');
            $subtotal_text = number_format($subtotal, 2, ',', '.');
        }
    ?>

    <header>
        <div class="container">
            <div class="logo">

            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href>Sign Up</a></li>
                </ul>
        </div>
    </header>
    
    <div class="shop">
        <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
            <div class="card shadow">
                <h2>Pilih Kursus</h2>
                <div class="course">
                    <p>PHP + MySQL</p><input type=number name="ps-q">
                    <p>Virtualisasi + Cloud</p><input type=number name="vc-q">
                    <p>Networking</p><input type=number name="net-q">
                    <p>Hardware + Peripheral</p><input type=number name="hp-q">
                    <button class="cart" name="save">Simpan Keranjang</button>
                </div>
            </div>
        </form>

        <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
            <div class="card shadow" id="right">
                <h2>Pembelian</h2>
                <div class="container-b">
                    <section class="course-section">
                    <a class="course-name">PHP + MySQL</a><span class="nominal"><?php echo " Rp $ps_text"?></span>
                    </section>
                    <section class="course-section">
                    <a class="course-name">Virtualisasi + Cloud</a><span class="nominal"><?php echo " Rp $vc_text"?></span>
                    </section>
                    <section class="course-section">
                    <a class="course-name">Networking</a><span class="nominal"><?php echo " Rp $net_text"?></span>
                    </section>
                    <section class="course-section">
                    <a class="course-name">Hardware + Peripheral</a> <span class="nominal"><?php echo "Rp $hp_text"?></span>
                    </section>
                    <section class="discount-section">
                    <a class="discount-info discount-one">Diskon</a><span class="nominal"><?php echo "- Rp $diskon1_text"?></span>
                    </section>
                    <section class="discount-section">
                    <a class="discount-info discount-two">Diskon Tambahan</a><span class="nominal"><?php echo "- Rp $diskon2_text"?></span>
                    </section>
                    <section class="subtotal-section">
                    <a class="subtotal-info">Total Pembayaran</a><span class="nominal"><?php echo "Rp $subtotal_text"?></span>
                    </section>
                </div>

                <button class="order" name="order">Bayar</button>
            </div>
        </form>
    </div>
    
</body>
</html>