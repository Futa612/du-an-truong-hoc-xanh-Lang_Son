<?php
    $ramdom_file = fopen("data.txt", "w");
    $str = "41";
    fwrite($ramdom_file, $str);
    fclose($ramdom_file);
    header("Location: bangdieukhien.php");
?>