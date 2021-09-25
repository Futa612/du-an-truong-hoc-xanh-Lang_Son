<?php
require_once("config.php");

function execute($sql) { //ham thuc hien cac truy van khong tra ve ket qua nhu insert, delete, update
    //Khai bao ket noi
    $conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
    //Thuc hien truy van
    mysqli_query($conn, $sql);
    //Dong ket noi
    mysqli_close($conn);
}

function executeResult($sql) { //ham thuc hien cac truy van co KQ tra ve vd: select
    //Khai bao ket noi
    $conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
    //Thuc hien truy van
    $result = mysqli_query($conn, $sql);
    $data = [];
    if ($row = mysqli_fetch_array($result, 1)) {
        $data = $row;
    }
    //Dong ket noi
    mysqli_close($conn);
    return $data;
}
