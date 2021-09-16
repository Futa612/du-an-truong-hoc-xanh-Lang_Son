<html>
    <body>
        <?php
        require_once("config.php");
        $connect = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
        if(!$connect){
            echo "Error: " . mysqli_connect_error();
            exit();
        }
        echo "Connection Success!<br><br>";

        $led1 = $_GET["led1"];
        $led2 = $_GET["led2"];
        $led3 = $_GET["led3"];
        $led4 = $_GET["led4"];

        $sql1 = "UPDATE `ttht` SET `led1`= $led1,`led2`= $led2,`led3`= $led3, `led4`= $led4 WHERE 1";
        $sql2 = "INSERT INTO `history`(`led1`, `led2`, `led3`, `led4`) VALUES ($led1, $led2, $led3, $led4)";

        $result1 = mysqli_query($connect, $sql1);
        $result2 = mysqli_query($connect, $sql2);
        if ($result != NULL) {
            echo "Da nhan du lieu tu ESP8266<br>";
        }
        mysqli_close($connect);
        ?>
        
    </body>
</html>