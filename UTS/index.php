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

        //Variable untuk data per user
        $jumps = 0; $jumvc = 0; $jumnet = 0; $jumhp = 0;
        $ps1 = 0; $vc1 = 0; $net1 = 0; $hp1 = 0;
        $diskon1 = 0;
        $diskon2 = 0;
        $subtotal = 0;


        if($_SESSION['username']) {
            $json_output = json_decode(file_get_contents('usercart.txt'), true);

            $data_jumps = $json_output[$username]['jumps'];
            $data_jumvc = $json_output[$username]['jumvc'];
            $data_jumnet = $json_output[$username]['jumnet'];
            $data_jumhp = $json_output[$username]['jumhp'];

            $data_hargaps = $json_output[$username]['hargaps'];
            $data_hargavc = $json_output[$username]['hargavc'];
            $data_harganet = $json_output[$username]['harganet'];
            $data_hargahp = $json_output[$username]['hargahp'];
            $data_diskon1 = $json_output[$username]['diskon1'];
            $data_diskon2 = $json_output[$username]['diskon2'];
            $data_subtotal = $json_output[$username]['subtotal'];

            //NUMBER FORMAT
            $ps_text = number_format($data_hargaps, 2, ',', '.');
            $vc_text = number_format($data_hargavc, 2, ',', '.');
            $net_text = number_format($data_harganet, 2, ',', '.');
            $hp_text = number_format($data_hargahp, 2, ',', '.');

            $diskon1_text = number_format($data_diskon1, 2, ',', '.');
            $diskon2_text = number_format($data_diskon2, 2, ',', '.');
            $subtotal_text = number_format($data_subtotal, 2, ',', '.');
        }

        if(isset($_POST['save'])) {
            //Jumlah item yang dibeli
            $jumps = $_POST['ps-q'];
            $jumvc = $_POST['vc-q'];
            $jumnet = $_POST['net-q'];
            $jumhp = $_POST['hp-q'];

            //Kalkulasi jumlah item yang dibeli + diskon
            $ps1 = $ps * $jumps;
            $vc1 = $vc * $jumvc;
            $net1 = $net * $jumnet;
            $hp1 = $hp * $jumhp;

            $kursus = $ps1 + $vc1 + $net1 + $hp1;
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
        }

        $username = $_SESSION['username'];

        $array_cart = Array (
            $username => Array (
                "jumps" => "$jumps",
                "hargaps" => "$ps1",
                "jumvc" => "$jumvc",
                "hargavc" => "$vc1",
                "jumnet" => "$jumnet",
                "harganet" => "$net1",
                "jumhp" => "$jumhp",
                "hargahp" => "$hp1",
                "diskon1" => "$diskon1",
                "diskon2" => "$diskon2",
                "subtotal" => "$subtotal"
            )
        );
        
        $json_cart = json_decode(file_get_contents('usercart.txt'), true);
        $json_cart_prev = json_decode(file_get_contents('usercart.txt'), true);

        if ($json_cart == NULL) {
            $json_cart = json_encode($array_cart);
            file_put_contents('usercart.txt', $json_cart);
        } else {
            if ($json_cart[$username] != NULL) {
                $json_cart[$username] = Array();
                $json_cart = array_merge($json_cart_prev, $array_cart);
                $json_cart = json_encode($json_cart);
                file_put_contents('usercart.txt', $json_cart);
            } else {
                $json_cart = array_merge($json_cart_prev, $array_cart);
                $json_cart = json_encode($json_cart);
                file_put_contents('usercart.txt', $json_cart);
            }
        }

        $json_output = json_decode(file_get_contents('usercart.txt'), true);

        $data_jumps = $json_output[$username]['jumps'];
        $data_jumvc = $json_output[$username]['jumvc'];
        $data_jumnet = $json_output[$username]['jumnet'];
        $data_jumhp = $json_output[$username]['jumhp'];

        $data_hargaps = $json_output[$username]['hargaps'];
        $data_hargavc = $json_output[$username]['hargavc'];
        $data_harganet = $json_output[$username]['harganet'];
        $data_hargahp = $json_output[$username]['hargahp'];
        $data_diskon1 = $json_output[$username]['diskon1'];
        $data_diskon2 = $json_output[$username]['diskon2'];
        $data_subtotal = $json_output[$username]['subtotal'];

        //NUMBER FORMAT
        $ps_text = number_format($data_hargaps, 2, ',', '.');
        $vc_text = number_format($data_hargavc, 2, ',', '.');
        $net_text = number_format($data_harganet, 2, ',', '.');
        $hp_text = number_format($data_hargahp, 2, ',', '.');

        $diskon1_text = number_format($data_diskon1, 2, ',', '.');
        $diskon2_text = number_format($data_diskon2, 2, ',', '.');
        $subtotal_text = number_format($data_subtotal, 2, ',', '.');
        
    ?>

    <header>
        <div class="container">
            <div class="logo">

            </div>
            <nav>
                <ul>
                    <li><a href="logout.php">Logout</a></li>
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
                    <a class="course-name">PHP + MySQL</a><span class="pertemuan"><?php echo " ($data_jumps) Pertemuan";?></span><span class="nominal"><?php echo " Rp $ps_text";?></span>
                    </section>
                    <section class="course-section">
                    <a class="course-name">Virtualisasi + Cloud</a><span class="pertemuan"><?php echo " ($data_jumvc) Pertemuan";?></span><span class="nominal"><?php echo " Rp $vc_text";?></span>
                    </section>
                    <section class="course-section">
                    <a class="course-name">Networking</a><span class="pertemuan"><?php echo " ($data_jumnet) Pertemuan";?></span><span class="nominal"><?php echo " Rp $net_text";?></span>
                    </section>
                    <section class="course-section">
                    <a class="course-name">Hardware + Peripheral</a><span class="pertemuan"><?php echo " ($data_jumhp) Pertemuan";?></span><span class="nominal"><?php echo "Rp $hp_text";?></span>
                    </section>
                    <section class="discount-section">
                    <a class="discount-info discount-one">Diskon</a><span class="nominal"><?php echo "- Rp $diskon1_text";?></span>
                    </section>
                    <section class="discount-section">
                    <a class="discount-info discount-two">Diskon Tambahan</a><span class="nominal"><?php echo "- Rp $diskon2_text";?></span>
                    </section>
                    <section class="subtotal-section">
                    <a class="subtotal-info">Total Pembayaran</a><span class="nominal"><?php echo "Rp $subtotal_text";?></span>
                    </section>
                </div>

                <button class="order" name="order">Bayar</button>
            </div>
        </form>
    </div>
    
</body>
</html>