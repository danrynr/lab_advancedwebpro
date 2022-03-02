<!DOCTYPE html>
<html>
    <head>
        <title>Random Image</title>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
    <?php
        if (isset($_POST['submit']) && isset($_POST['nrp'])) {
            $nrp = $_POST['nrp'];
            $random = random_int(1, 3);
            if ($nrp == "2110141037") {
                $image = "";
                switch ($random) {
                    case 1:
                        $image .= "https://images.unsplash.com/photo-1525609004556-c46c7d6cf023?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8Y2Fyc3xlbnwwfHwwfHw%3D&w=1000&q=80";
                        break;
                    case 2:
                        $image .= "https://images.unsplash.com/photo-1552519507-da3b142c6e3d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OHx8Y2Fyc3xlbnwwfHwwfHw%3D&w=1000&q=80";
                        break;
                    case 3:
                        $image .= "https://www.beritaplanet.com/wp-content/uploads/2021/08/7.-Kecanggihan-Mobil-Tesla-dengan-Menerapkan-Kecerdasan-Buatan.jpg";
                        break;
                }
            }

            if ($nrp == "2110141038") {
                $image = "";
                switch ($random) {
                    case 1:
                        $image .= "https://asset-a.grid.id/crop/0x0:0x0/x/photo/2022/01/12/motor-baru-honda-2022-giorno-1j-20220112020705.jpg";
                        break;
                    case 2:
                        $image .= "https://cdn.motor1.com/images/mgl/5Dmwq/s3/honda-nm4-vultus-2014_3.jpg";
                        break;
                    case 3:
                        $image .= "https://cdn.antaranews.com/cache/800x533/2021/01/08/2021-BMW-R18-Classic-asphalt-and-rubber.jpg";
                        break;
                }
            }

            if ($nrp == "2110141039") {
                $image = "";
                switch ($random) {
                    case 1:
                        $image .= "https://cdn-files.kimovil.com/default/0006/88/thumb_587137_default_big.jpg";
                        break;
                    case 2:
                        $image .= "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSeVeXiJoQmQT1xDl52BRIHUTWxUxaLycpxlu7KO7jW8kKqbG3C_nRyO8qkrOWYH86wANw&usqp=CAU";
                        break;
                    case 3:
                        $image .= "https://cdn1.katadata.co.id/media/images/thumb/2021/10/28/iPhone_13_Pro-2021_10_28-14_49_09_14b4d070187b2b687fe2affe100d8934_400x267_thumb.png";
                        break;
                }
            }
        }
        ?>
        <form method="POST"<?php $_SERVER["PHP_SELF"]?>>
            <h3>Random Image</h3>
            <label for="nrp">NRP: </label>
            <select type="number" name="nrp" placeholder="NRP">
                <option style="display: none;"></option>
                <option value="2110141037">2110141037</option>
                <option value="2110141038">2110141038</option>
                <option value="2110141039">2110141039</option>
            </select>
            <input type="submit" name="submit" value="Submit">
        </form>
        <img src="<?php echo $image ?>">
    </body>
</html>