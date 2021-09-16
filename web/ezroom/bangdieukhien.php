<!Doctype HTML>
<html>

<head>
	<title></title>
	<META charset=UTF-8>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<!--Cách 1: sử dụng thẻ meta để làm tươi trang sau mỗi 3 giây -->
	<!-- <meta http-equiv="refresh" content="3;url=http://localhost/ezroom/bangdieukhien.php">-->
	<!--Cách 2: sử nhúng script vào phần head -->
	<script>
		var myVar = setInterval(myTimer, 1000);

		function myTimer() {
			location.reload();
		}

		function myStopFunction() {
			clearInterval(myVar);
		}
	</script>
	<title>EZroom Điều khiển</title>
</head>

<body>

	<div id="mySidenav" class="sidenav">
		<a href="home.php">
			<p class="logo" style="font-size: 35px; margin-left: 0px;">
				<span style="margin-right: 2px; font-size: 34px;"><i class="fab fa-etsy"></i></span>asyroom
			</p>
		</a>
		<a href="trangthai.php" class="icon-a"><i class="fas fa-tachometer-alt icons"></i> &nbsp;&nbsp;Trạng thái</a>
		<a href="bangdieukhien.php" class="icon-a"><i class="fas fa-gamepad"></i> &nbsp;&nbsp;Điều khiển</a>
		<a href="thongke.php" class="icon-a"><i class="fa fa-list icons"></i> &nbsp;&nbsp;Thống kê</a>
		<!-- <a href="#" class="icon-a"><i class="fa fa-shopping-bag icons"></i> &nbsp;&nbsp;Dịch vụ</a>
		<a href="#" class="icon-a"><i class="fa fa-user icons"></i> &nbsp;&nbsp;Tài khoản</a>
		<a href="#" class="icon-a"><i class="fa fa-list-alt icons"></i> &nbsp;&nbsp;Cài đặt</a> -->
	</div>
	<div id="main" style="padding-top: 30px">
		<div class="head" style="height: 129px;">
			<div class="col-div-6">
				<span style="font-size:40px;cursor:pointer; color: white; top: 12%;" class="nav" onclick="myStopFunction()">&#9776;</span>
				<span style="font-size:40px;cursor:pointer; color: white; top: 12%;" class="nav2">&#9776;</span>
			</div>
			<!-- avatar -->
			<div class="col-div-6" style="width: 90%; padding-right: 30px;">
				<div class="profile">
					<img src="images/user.png" class="pro-img" />
					<p style="font-size: 20px;">Nguyễn Phú Đạt<span>Adminstrator</span></p>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>

		<div class="clearfix"></div>
		<br />
		<!-- TTDK -->
		<?php
		require_once("config.php");
		$conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT `id`, `ttht`, `led1`, `led2`, `led3`, `led4` FROM `ttht` WHERE 1";
		if ($result = $conn->query($sql)) {
			while ($row = $result->fetch_assoc()) {
				$den1 = $row["led1"];
				$den2 = $row["led2"];
				$den3 = $row["led3"];
				$den4 = $row["led4"];
				// TTHT den 1
				if ($den1 == 0) {
					echo '
							<div class="col-div-13">
								<div class="room">
									<p>Đèn 1<br/><span>Bật</span></p>
									<i class="fas fa-lightbulb box-icon-on"></i>
								</div>
								<div class="room-button">
									<div class="container-button">
										<a href="on1.php"><button id="foot"><button class="button-os"><p>ON</p></button></button></a>
									</div>	
									<div class="container-button">
										<a href="off1.php"><button id="foot"><button class="button-off-os"><p>OFF</p></button></button></a>
									</div>
								</div>
								<div class="room-set">
									
								</div>
							</div>
						';
				} else {
					echo '
							<div class="col-div-13">
								<div class="room">
									<p>Đèn 1<br/><span>Tắt</span></p>
									<i class="fas fa-lightbulb box-icon-off"></i>
								</div>
								<div class="room-button">
									<div class="container-button">
										<a href="on1.php"><button id="foot"><button class="button-os"><p>ON</p></button></button></a>
									</div>
									<div class="container-button">
										<a href="off1.php"><button id="foot"><button class="button-off-os"><p>OFF</p></button></button></a>
									</div>
								</div>
								<div class="room-set">
									
								</div>
							</div>
						';
				}
				// TTHT den 2
				if ($den2 == 0) {
					echo '
							<div class="col-div-13">
								<div class="room">
									<p>Đèn 2<br/><span>Bật</span></p>
									<i class="fas fa-lightbulb box-icon-on"></i>
								</div>
								<div class="room-button">
									<div class="container-button">
										<a href="on2.php"><button id="foot"><button class="button-os"><p>ON</p></button></button></a>
									</div>
									<div class="container-button">
										<a href="off2.php"><button id="foot"><button class="button-off-os"><p>OFF</p></button></button></a>
									</div>
								</div>
								<div class="room-set">
									
								</div>
							</div>
						';
				} else {
					echo '
							<div class="col-div-13">
								<div class="room">
									<p>Đèn 2<br/><span>Tắt</span></p>
									<i class="fas fa-lightbulb box-icon-off"></i>
								</div>
								<div class="room-button">
									<div class="container-button">
										<a href="on2.php"><button id="foot"><button class="button-os"><p>ON</p></button></button></a>
									</div>
									<div class="container-button">
										<a href="off2.php"><button id="foot"><button class="button-off-os"><p>OFF</p></button></button></a>
									</div>
								</div>
								<div class="room-set">
									
								</div>
							</div>
						';
				}
				// TTHT den 3
				if ($den3 == 0) {
					echo '
							<div class="col-div-13">
								<div class="room">
									<p>Đèn 3<br/><span>Bật</span></p>
									<i class="fas fa-lightbulb box-icon-on"></i>
								</div>
								<div class="room-button">
									<div class="container-button">
										<a href="on3.php"><button id="foot"><button class="button-os"><p>ON</p></button></button></a>
										<p id="demo"></p>
									</div>
									<div class="container-button">
										<a href="off3.php"><button id="foot"><button class="button-off-os"><p>OFF</p></button></button></a>
									</div>
								</div>
								<div class="room-set">
									
								</div>
							</div>
						';
				} else {
					echo '
							<div class="col-div-13">
								<div class="room">
									<p>Đèn 3<br/><span>Tắt</span></p>
									<i class="fas fa-lightbulb box-icon-off"></i>
								</div>
								<div class="room-button">
									<div class="container-button">
										<a href="on3.php"><button id="foot"><button class="button-os"><p>ON</p></button></button></a>
									</div>
									<div class="container-button">
										<a href="off3.php"><button id="foot"><button class="button-off-os"><p>OFF</p></button></button></a>
									</div>
								</div>
								<div class="room-set">
									
								</div>
							</div>
						';
				}
				// TTHT den 4
				if ($den4 == 0) {
					echo '
							<div class="col-div-13">
								<div class="room">
									<p>Đèn 4<br/><span>Bật</span></p>
									<i class="fas fa-lightbulb box-icon-on"></i>
								</div>
								<div class="room-button">
									<div class="container-button">
										<a href="on4.php"><button id="foot"><button class="button-os"><p>ON</p></button></button></a>
									</div>
									<div class="container-button">
										<a href="off4.php"><button id="foot"><button class="button-off-os"><p>OFF</p></button></button></a>
									</div>
								</div>
								<div class="room-set">
									
								</div>
							</div>
						';
				} else {
					echo '
							<div class="col-div-13">
								<div class="room">
									<p>Đèn 4<br/><span>Tắt</span></p>
									<i class="fas fa-lightbulb box-icon-off"></i>
								</div>
								<div class="room-button">
									<div class="container-button">
										<a href="on4.php"><button id="foot"><button class="button-os"><p>ON</p></button></button></a>
									</div>
									<div class="container-button">
										<a href="off4.php"><button id="foot"><button class="button-off-os"><p>OFF</p></button></button></a>
									</div>
								</div>
								<div class="room-set">
									
								</div>
							</div>
						';
				}
				// Tính năng chưa mở khoá
				echo '
						<div class="col-div-13">
							<div class="room">
								<p style="color: #818181;font-size: 26px;">Đang khoá<br/><span>...</span></p>
								<i class="fas fa-lock box-icon-off"></i>
							</div>
							<div class="room-button">
							
							</div>
							<div class="room-set">
								
							</div>
						</div>
					';
			}
			$result->free();
		}
		?>
		<p id="demo"></p>
		<!-- het php -->
		<!-- ======================================== -->
		<div class="clearfix"></div>

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