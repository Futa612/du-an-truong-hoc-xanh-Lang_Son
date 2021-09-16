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
	<!-- <script>
		var myVar = setInterval(myTimer, 1000);

		function myTimer() {
			location.reload();
		}

		function myStopFunction() {
			clearInterval(myVar);
		}
	</script> -->
	<script
		src="https://code.jquery.com/jquery-3.6.0.min.js"
		integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
		crossorigin="anonymous">	
	</script>
	<script>
		$(document).ready(function(){
			setInterval(() => {
				$('#container1').load('dieukhien/container1.php');
			});
		});
	</script>
	<script>
		$(document).ready(function(){
			setInterval(() => {
				$('#container2').load('dieukhien/container2.php');
			},1000);
		});
	</script>
	<script>
		$(document).ready(function(){
			setInterval(() => {
				$('#container3').load('dieukhien/container3.php');
			},1000);
		});
	</script>
	<script>
		$(document).ready(function(){
			setInterval(() => {
				$('#container4').load('dieukhien/container4.php');
			},1000);
		});
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
		<a href="bangdieukhien.php" class="icon-a"><i class="fas fa-gamepad icons"></i> &nbsp;&nbsp;Điều khiển</a>
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
		<!-- BAng dieu khien LED1 -->
		<div class="col-div-13">
			<div class="room" id="container1"></div>
			<div class="room-button">
				<div class="container-button">
					<a href="on1.php"><button id="foot"><button class="button-os"><p>ON</p></button></button></a>
				</div>	
				<div class="container-button">
					<a href="off1.php"><button id="foot"><button class="button-off-os"><p>OFF</p></button></button></a>
				</div>
			</div>
			<div class="room-set"></div>
		</div>
		<!-- BAng dieu khien LED2 -->
		<div class="col-div-13">
		<div class="room" id="container2"></div>
			<div class="room-button">
				<div class="container-button">
					<a href="on2.php"><button id="foot"><button class="button-os"><p>ON</p></button></button></a>
				</div>	
				<div class="container-button">
					<a href="off2.php"><button id="foot"><button class="button-off-os"><p>OFF</p></button></button></a>
				</div>
			</div>
			<div class="room-set"></div>
		</div>
		<!-- BAng dieu khien LED3 -->
		<div class="col-div-13">
		<div class="room" id="container3"></div>
			<div class="room-button">
				<div class="container-button">
					<a href="on3.php"><button id="foot"><button class="button-os"><p>ON</p></button></button></a>
				</div>	
				<div class="container-button">
					<a href="off3.php"><button id="foot"><button class="button-off-os"><p>OFF</p></button></button></a>
				</div>
			</div>
			<div class="room-set"></div>
		</div>
		<!-- BAng dieu khien LED4 -->
		<div class="col-div-13">
		<div class="room" id="container4"></div>
			<div class="room-button">
				<div class="container-button">
					<a href="on4.php"><button id="foot"><button class="button-os"><p>ON</p></button></button></a>
				</div>	
				<div class="container-button">
					<a href="off4.php"><button id="foot"><button class="button-off-os"><p>OFF</p></button></button></a>
				</div>
			</div>
			<div class="room-set"></div>
		</div>
		
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