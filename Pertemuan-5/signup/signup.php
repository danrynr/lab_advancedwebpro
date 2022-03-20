<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <?php
            if (isset($_POST['signup'])) {
                if (isset($_POST['nrp']) && isset($_POST['name']) && isset($_POST['address']) && isset($_POST['prodi']) && isset($_POST['birthdate']) && isset($_POST['gender']) && isset($_POST['username']) && isset($_POST['password'])) {
                    $nrp = $_POST['nrp'];
                    $name = $_POST['name'];
                    $address = $_POST['address'];
                    $prodi = $_POST['prodi'];
                    $birthdate = $_POST['birthdate'];
                    $gender = $_POST['gender'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    if (empty($nrp) || empty($name) || empty($address) || empty($prodi) || empty($birthdate) || empty($gender) || empty($username) || empty($password)) {
                        $msg = "<span style='color:red'>Semua field harus diisi!</span>";
                    } else {
                        $pattern = "/[;]+/";
                        $lines = file_get_contents('datauser.txt');
                        $lines = explode("\n", $lines);
                        foreach ($lines as $line) {
                            $data = preg_split($pattern, $line);
                            $username_array[] = $data[6];
                        }

                        if (in_array($username, $username_array)) {
                            $msg = "<span style='color:red'>Username sudah terdaftar!</span>";
                        } else {
                            if ($username == $password) {
                                $read = fopen('./datauser.txt', "a+");
                                fwrite($read, "$nrp;$name;$address;$prodi;$birthdate;$gender;$username;$password" . "\n");
                                fseek($read, 0);
                                fclose($read);
        
                                $msg = "<span style='color:green'>Data berhasil disimpan!</span>";
                            } else {
                                $msg = "<span style='color:red'>Username dan Password harus sama!</span>";
                            }
                        }   
                    }
                }
            }
        ?>
        <div class="bg-image"></div>
        <div class="card panel-c shadow">
            <div class="centerItem"><h3>Sign Up</h3></div>
            <form action="" method="post">
                <table>
                    <tr>
                        <td colspan="3"><p><?php if (isset($msg)) { echo $msg; }; ?></p></td>
                    </tr>
                    <tr>
                        <td><label for="nrp">NRP &nbsp;</label></td>
                        <td>:</td>
                        <td><input type="number" name="nrp"></td>
                    </tr>
                    <tr>
                        <td><label for="name">Nama Mahasiswa &nbsp;</label></td>
                        <td>:</td>
                        <td><input type="text" name="name" maxlength="30"></td>
                    </tr>
                    <tr>
                        <td><label for="address">Alamat &nbsp;</label></td>
                        <td>:</td>
                        <td><input type="text" name="address"></td>
                    </tr>
                    <tr>
                        <td><label for="prodi">Program Studi &nbsp;</label></td>
                        <td>:</td>
                        <td><input type="text" name="prodi"></td>
                    </tr>
                    <tr>
                        <td><label for="birthdate">Tanggal Lahir &nbsp;</label></td>
                        <td>:</td>
                        <td><input type="date" name="birthdate"></td>
                    </tr>
                    <tr>
                        <td><label for="gender">Jenis Kelamin &nbsp;</label></td>
                        <td>:</td>
                        <td><select id="gender" name="gender">
                                                        <option value="L">L</option>
                                                        <option value="P">P</option>
                                                    </select>
                        </td>
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
                        <td colspan="3"><input type="submit" name="signup" value="Sign Up"></td>
                    </tr>
                </table>
            </form>
            <p>Sudah punya akun? Silakan <a href="./login.php">login</a></p>
            <?php
                include './footer.php';
            ?>
        </div>
    </body>
</html>