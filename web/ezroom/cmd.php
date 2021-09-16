<?php
    $ramdom_file = fopen("data.txt", "w");
    $str = "tytytytytytytyty";
    fwrite($ramdom_file, $str);
    fclose($ramdom_file);
    header("Location: button.php");
?>