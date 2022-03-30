<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>NIX Course | Sign Up</title>
        <link rel="stylesheet" href="./style/style.css">
    </head>
    <body>
        <div class="card shadow">
            <?php
                if(isset($_POST['register'])) {
                    $name = $_POST['name'];
                    $birthdate = $_POST['birthdate'];
                    $gender = $_POST['gender'];
                    $education = $_POST['education'];
                    $address = $_POST['address'];
                    $hobby = $_POST['hobby'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    if (empty($name) || empty($birthdate) || empty($gender) || empty($education) || empty($address) || empty($hobby) || empty($username) || empty($password)) {
                        $msg = "<span style='color:red'>Semua field harus diisi!</span>";
                    } else {
                        $pattern = "/[,]+/";
                        $lines = file_get_contents('./datauser.txt');
                        $lines = explode("\n", $lines);
                        foreach ($lines as $line) {
                            $data = preg_split($pattern, $line);
                            $username_array[] = $data[6] ?? NULL;
                        }

                        if (in_array($username, $username_array)) {
                            $msg = "<span style='color:red'>Username sudah terdaftar!</span>";
                        } else {
                            if ($username == $password) {
                                $read = fopen('./datauser.txt', "a+");
                                fwrite($read, "$name,$birthdate,$gender,$education,$address,$hobby,$username,$password" . "\n");
                                fseek($read, 0);
                                fclose($read);
        
                                $msg = "<span style='color:green'>Data berhasil disimpan!</span>";
                            } else {
                                $msg = "<span style='color:red'>Username dan Password harus sama!</span>";
                            }
                        }   
                    }
                }
            ?>
            <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
                <h2>Sign Up</h2>
                <p><?php if (isset($msg)) { echo $msg; }; ?></p>
                <label for="name">Nama: </label><br>
                <input type="text" name="name" id="name"><br>
                <label for="birthdate">Tanggal Lahir: </label><br>
                <input type="date" name="birthdate" id="birthdate"><br>
                <label for="gender">Jenis Kelamin</label><br>
                <select id="gender" name="gender"><br>
                    <option value="L">Pria</option>
                    <option value="P">Wanita</option>
                </select><br>
                <label for="education">Pendidikan Terakhir</label><br>
                <select id="education" name="education"><br>
                    <option value="SD">SD</option>
                    <option value="SLTP">SLTP</option>
                    <option value="SLTA">SLTA</option>
                    <option value="Sarjana">Sarjana</option>
                </select><br>
                <label for="address">Alamat</label><br>
                <input type="text" name="address" id="address"><br>
                <label for="hobby">Hobi</label><br>
                <input type="text" name="hobby" id="hobby"><br>
                <label for="username">Username</label><br>
                <input type="text" name="username" id="username"><br>
                <label for="password">Password</label><br>
                <input type="password" name="password" id="password"><br>
                <button name="register" value="Register">Register</button>
            </form>
        </div>
    </body>
</html>