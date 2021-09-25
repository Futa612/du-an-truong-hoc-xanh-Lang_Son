<!Doctype HTML>
<html>

<head>
    <title></title>
    <META charset=UTF-8>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>EZroom Thống kê</title>
</head>

<body>

    <div id="mySidenav" class="sidenav">
        <a href="home.php">
            <p class="logo" style="font-size: 35px; margin-left: 0px;">
                <span style="margin-right: 2px; font-size: 34px;"><i class="fab fa-etsy"></i></span>asyroom
            </p>
        </a>
        <a href="home.php" class="icon-a"><i class="fas fa-tachometer-alt icons"></i> &nbsp;&nbsp;Trạng thái</a>
        <a href="bangdieukhien.php" class="icon-a"><i class="fas fa-gamepad icons"></i> &nbsp;&nbsp;Điều khiển</a>
        <a href="thongke.php" class="icon-a"><i class="fa fa-list icons"></i> &nbsp;&nbsp;Thống kê</a>
    </div>
    <div id="main" style="padding-top: 30px">
        <div class="head" style="height: 129px;">
            <div class="col-div-6">
                <span style="font-size:40px;cursor:pointer; color: white; top: 12%;" class="nav">&#9776;</span>
                <span style="font-size:40px;cursor:pointer; color: white; top: 12%;" class="nav2">&#9776;</span>
            </div>
            <!-- avatar -->
            <div class="col-div-6" style="width: 90%; padding-right: 30px;">
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- TTHT -->
        <div class="clearfix"></div>
        <div class="col-div-8">
            <div class="box-8">
                <div class="content-box">
                    <p>Lịch sử điều khiển <a href="thongke.php"><span>Làm mới</span></a></p>
                    <div class="table-wrapper-scroll-y my-custom-scrollbar">
                        <table class="table table-bordered table-striped mb-0">
                            <thead>
                                <tr>
                                    <th style="text-align: center">STT</th>
                                    <th style="text-align: center">Đèn 1</th>
                                    <th style="text-align: center">Đèn 2</th>
                                    <th style="text-align: center">Ngày</th>
                                    <th style="text-align: center">Giờ</th>
                                </tr>
                            </thead>
                            <!-- code php -->
                            <?php
                            require_once("config.php");
                            $conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
                            $sql = "SELECT `led1`, `led2`, `led3`, `led4`, `date`, `time` FROM `history` ORDER BY id DESC";
                            if ($result = $conn->query($sql)) {
                                $order = 1;
                                while ($row = $result->fetch_assoc()) {
                                    $row_id = $order++;
                                    $den1 = $row["led1"];
                                    $den2 = $row["led2"];
                                    $den3 = $row["led3"];
                                    $den4 = $row["led4"];
                                    $ngay = $row["date"];
                                    $gio = $row["time"];

                                    if ($den1 == 0) {
                                        $ttden1 = 'bật';
                                    } else $ttden1 = 'tắt';
                                    if ($den2 == 0) {
                                        $ttden2 = 'bật';
                                    } else $ttden2 = 'tắt';
                                    if ($den3 == 0) {
                                        $ttden3 = 'bật';
                                    } else $ttden3 = 'tắt';
                                    if ($den4 == 0) {
                                        $ttden4 = 'bật';
                                    } else $ttden4 = 'tắt';
                                    echo '<tbody><tr> 
                                <td>' . $row_id . '</td> 
                                <td>' . $ttden1 . '</td> 
                                <td>' . $ttden2 . '</td> 
                                <td>' . $ngay . '</td>
                                <td>' . $gio . '</td> 
                                </tr></tbody>';
                                }
                                $result->free();
                            }

                            $conn->close();
                            ?>
                        </table>
                    </div>
                </div>
            </div>

            <!-- script nav-->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script>
                $(".nav").click(function() {
                    $("#mySidenav").css('width', '75px');
                    $("#main").css('margin-left', '75px');
                    $(".logo").css('visibility', 'hidden');
                    $(".logo span").css('visibility', 'visible');
                    $(".logo span").css('margin-left', '-0px');
                    $(".icon-a").css('visibility', 'hidden');
                    $(".icons").css('visibility', 'visible');
                    $(".icons").css('margin-left', '-0px');
                    $(".nav").css('display', 'none');
                    $(".nav2").css('display', 'block');
                });

                $(".nav2").click(function() {
                    $("#mySidenav").css('width', '240px');
                    $("#main").css('margin-left', '240px');
                    $(".logo").css('visibility', 'visible');
                    $(".icon-a").css('visibility', 'visible');
                    $(".icons").css('visibility', 'visible');
                    $(".nav").css('display', 'block');
                    $(".nav2").css('display', 'none');
                });
            </script>

</body>


</html>