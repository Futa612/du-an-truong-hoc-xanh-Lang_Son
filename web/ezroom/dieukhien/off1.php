<?php
    $ramdom_file = fopen("data.txt", "w");
    $str = "10";
    fwrite($ramdom_file, $str);
    fclose($ramdom_file);
//     header("Location: ezroom/bangdieukhien.php");
?>