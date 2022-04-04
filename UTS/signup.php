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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <header> 
            <div class="container">
                <h1>NIX Course</h1>
            </div>
        </header class="shadow">
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
                        $msg = "<script>Swal.fire({
                            title: 'Jangan lupa!',
                            text: 'Semua field harus diisi!',
                            icon: 'error',
                            timer: 1500,
                            confirmButtonText: 'Oke'
                          });</script>";
                    } else {
                        
                        $array = Array(
                            $username => Array (
                            "name" => "$name",
                            "birthdate" => "$birthdate",
                            "gender" => "$gender",
                            "education" => "$education",
                            "address" => "$address",
                            "password" => "$password"
                            )
                        );

                        $json_data = json_decode(file_get_contents('datauser.txt'), true);
                        
                        if ($json_data[$username] != NULL) {
                            $msg = "<script>Swal.fire({
                                title: 'Username sudah ada!',
                                text: 'Silakan gunakan username lain!',
                                icon: 'error',
                                timer: 2000,
                                confirmButtonText: 'Oke'
                              });</script>";
                        } else {
                            if ($username == $password) {
                                $json_prev = json_decode(file_get_contents('datauser.txt'), true);

                                if($json_prev == NULL) {
                                    $json_data = json_encode($array);
                                    file_put_contents('datauser.txt', $json_data);
                                } else {
                                    $json_data = array_merge($json_prev, $array);
                                    $json_data = json_encode($json_data);
                                    file_put_contents('datauser.txt', $json_data);
                                }
                                $msg = "<script>const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: true,
                                    timer: 3000,
                                    timerProgressBar: true
                                  })
                                  
                                  Toast.fire({
                                    icon: 'success',
                                    title: 'Pendaftaran Berhasil!'
                                  });</script>";
                            } else {
                                $msg = "<script>Swal.fire({
                                    title: 'Jangan Lupa!',
                                    text: 'Username dan Password harus sama!',
                                    icon: 'error',
                                    timer: 2000,
                                    confirmButtonText: 'Oke'
                                  });</script>";
                            }
                        }
                    }
                }
            ?>

            <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
                <h2>Sign Up</h2>
                <p class="warning"><?php if (isset($msg)) { echo $msg; }; ?></p>
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
                <p>Sudah memiliki akun? Silakan <a class="btn" href="./login.php">Login</a></p>
            </form>
        </div>
    </body>
</html>