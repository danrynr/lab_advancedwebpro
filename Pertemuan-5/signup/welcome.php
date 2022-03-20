<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <?php
        session_start();
        if (!isset($_SESSION['username'])) {
            header("location:login.php");
            exit;
        }
        $date = date("d F Y").', '.date("h:i");
        ?>
        <div class="card">
            <h3><?php echo "Welcome "."<span style='color:blue'>".$_SESSION['username']."</span>!"; ?></h3>
            <h3><?php echo "<span style='color:blue'>".$_SESSION['username']."</span>"." berhasil login pada ".$date; ?></h3>
            <div class="centerItem">
                <input type="submit" name="submit" value="Logout" onclick="location.href='logout.php'">
            </div>
        </div>
        <?php
            $pattern_data = "/[;]+/";

            $lines = file_get_contents('datauser.txt');
            $lines = file('datauser.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            echo "<div class='list'>";
            echo "<h3>Data User yang lahir di bulan Maret</h3>";
            echo "<table>";
            echo "<tr>";
            echo "<th>NRP</th>";
            echo "<th>Nama Mahasiswa</th>";
            echo "<th>Alamat</th>";
            echo "<th>Program Studi</th>";
            echo "<th>Tanggal Lahir</th>";
            echo "<th>Jenis Kelamin</th>";
            echo "<tr>";
            foreach ($lines as $line) {
                $data = preg_split($pattern_data, $line);

                $pattern = "/^[0-9]{4}-(0[3])-(0[1-9]|[1-2][0-9]|3[0-1])$/";
                $month = preg_match($pattern, $data[4], $match);
                $month = $match[0];
                
                if ($match[0] == $data[4]) {
                    echo "<tr>";
                    echo "<td>".$data[0]."</td>";
                    echo "<td>".$data[1]."</td>";
                    echo "<td>".$data[2]."</td>";
                    echo "<td>".$data[3]."</td>";
                    echo "<td>".$data[4]."</td>";
                    echo "<td>".$data[5]."</td>";
                    echo "</tr>";
                }
            }
            echo "</table>";
        ?>
    </body>
</html>