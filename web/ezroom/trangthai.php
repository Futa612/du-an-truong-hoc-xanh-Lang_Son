<!Doctype HTML>
<html>
<head>
	<title></title>
	<META charset=UTF-8>
	<link rel="stylesheet" href="css/style.css" type="text/css"/>
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<body>	
	
	<div id="mySidenav" class="sidenav">
		<a href="home.php">
			<p class="logo" style="font-size: 35px; margin-left: 0px;">
				<span style="margin-right: 2px; font-size: 34px;"><i class="fab fa-etsy"></i></span>asyroom
			</p>
		</a>
		<a href="trangthai.php" class="icon-a"><i class="fas fa-tachometer-alt icons"></i> &nbsp;&nbsp;Trạng thái</a>
		<a href="bangdieukhien.php"class="icon-a"><i class="fas fa-gamepad"></i> &nbsp;&nbsp;Điều khiển</a>
		<a href="thongke.php"class="icon-a"><i class="fa fa-list icons"></i> &nbsp;&nbsp;Thống kê</a>
		<!-- <a href="#"class="icon-a"><i class="fa fa-shopping-bag icons"></i> &nbsp;&nbsp;Dịch vụ</a>
		<a href="#"class="icon-a"><i class="fa fa-user icons"></i> &nbsp;&nbsp;Tài khoản</a>
		<a href="#"class="icon-a"><i class="fa fa-list-alt icons"></i> &nbsp;&nbsp;Cài đặt</a> -->
	</div>
	<div id="main" style="padding-top: 30px">
		<div class="head" style="height: 129px;">
			<div class="col-div-6">
				<span style="font-size:40px;cursor:pointer; color: white; top: 12%;" class="nav"  >&#9776;</span>
				<span style="font-size:40px;cursor:pointer; color: white; top: 12%;" class="nav2"  >&#9776;</span>
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
		<br/>
		<!-- TTHT -->
		<?php
			require_once("config.php");
			$conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			$sql = "SELECT `id`, `ttht`, `led1`, `led2`, `led3`, 'led4' FROM `ttht` WHERE 1";
			if ($result = $conn->query($sql)) {
				while ($row = $result->fetch_assoc()) {
					$den1 = $row["led1"];
					$den2 = $row["led2"];
					$den3 = $row["led3"];
					$den4 = $row["led4"];
					// TTHT den 1
					if($den1 == 0) {
						echo'
							<div class="col-div-3">
								<div class="box">
									<p>Đèn 1<br/><span>Bật</span></p>
									<i class="fas fa-lightbulb box-icon-on"></i>
								</div>
							</div>
						';
					}
					else {
						echo'
							<div class="col-div-3">
								<div class="box">
									<p>Đèn 1<br/><span>Tắt</span></p>
									<i class="fas fa-lightbulb box-icon-off"></i>
								</div>
							</div>
						';
					}
					// TTHT den 2
					if($den2 == 0) {
						echo'
							<div class="col-div-3">
								<div class="box">
									<p>Đèn 2<br/><span>Bật</span></p>
									<i class="fas fa-lightbulb box-icon-on"></i>
								</div>
							</div>
						';
					}
					else {
						echo'
							<div class="col-div-3">
								<div class="box">
									<p>Đèn 2<br/><span>Tắt</span></p>
									<i class="fas fa-lightbulb box-icon-off"></i>
								</div>
							</div>
						';
					}
					// TTHT den 1
					if($den3 == 0) {
						echo'
							<div class="col-div-3">
								<div class="box">
									<p>Đèn 3<br/><span>Bật</span></p>
									<i class="fas fa-lightbulb box-icon-on"></i>
								</div>
							</div>
						';
					}
					else {
						echo'
							<div class="col-div-3">
								<div class="box">
									<p>Đèn 3<br/><span>Tắt</span></p>
									<i class="fas fa-lightbulb box-icon-off"></i>
								</div>
							</div>
						';
					}
					// TTHT den 4
					if($den4 == 0) {
						echo'
							<div class="col-div-3">
								<div class="box">
									<p>Đèn 4<br/><span>Bật</span></p>
									<i class="fas fa-lightbulb box-icon-on"></i>
								</div>
							</div>
						';
					}
					else {
						echo'
							<div class="col-div-3">
								<div class="box">
									<p>Đèn 4<br/><span>Tắt</span></p>
									<i class="fas fa-lightbulb box-icon-off"></i>
								</div>
							</div>
						';
					}
				}
				$result->free();
			}
		?>
		<!-- het php -->
		<!-- ======================================== -->
		<div class="clearfix"></div>
		<br/><br/>
		<div class="clearfix"></div>
		<!-- pure do am -->
		<div class="col-div-4">
			<div class="box-4">
				<div class="content-box">
					<p>Độ ẩm</p>
					<section class="row">
						<svg class="radial-progress" data-percentage="82" viewBox="0 0 80 80">
							<circle class="incomplete" cx="40" cy="40" r="35"></circle>
							<circle class="complete" cx="40" cy="40" r="35" style="stroke-dashoffset: 39.58406743523136;"></circle>
							<text class="percentage" x="50%" y="57%" transform="matrix(0, 1, -1, 0, 80, 0)">82%</text>
						</svg>
					</section>
				</div>
			</div>
		</div>
		<!-- ------------------ -->
		<!-- pure nhiet do -->
		<div class="col-div-4">
			<div class="box-4">
				<div class="content-box">
					<p>Nhiệt độ</p>
					<section class="row">
						<svg class="radial-progress2" data-percentage="28" viewBox="0 0 80 80">
							<circle class="incomplete2" cx="40" cy="40" r="35"	></circle>
							<circle class="complete2" cx="40" cy="40" r="35" style="stroke-dashoffset: 39.58406743523136;"></circle>
							<text class="percentage" x="50%" y="57%" transform="matrix(0, 1, -1, 0, 80, 0)">28°C</text>
						</svg>
					</section>
				</div>
			</div>
		</div>
		<!-- clock -->
		<div class="col-div-4">
			<div class="box-4">
				
						<div class="clockbox">
						<svg id="clock" xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 600 600">
						<g id="face">
						<circle class="circle" cx="300" cy="300" r="253.9"/>
						<path class="hour-marks" d="M300.5 94V61M506 300.5h32M300.5 506v33M94 300.5H60M411.3 107.8l7.9-13.8M493 190.2l13-7.4M492.1 411.4l16.5 9.5M411 492.3l8.9 15.3M189 492.3l-9.2 15.9M107.7 411L93 419.5M107.5 189.3l-17.1-9.9M188.1 108.2l-9-15.6"/>
						<circle class="mid-circle" cx="300" cy="300" r="16.2"/>
						</g>
						<g id="hour">
						<path class="hour-arm" d="M300.5 298V142"/>
						<circle class="sizing-box" cx="300" cy="300" r="253.9"/>
						</g>
						<g id="minute">
						<path class="minute-arm" d="M300.5 298V67"/>
						<circle class="sizing-box" cx="300" cy="300" r="253.9"/>
						</g>
						<g id="second">
						<path class="second-arm" d="M300.5 350V55"/>
						<circle class="sizing-box" cx="300" cy="300" r="253.9"/>
						</g>
						</svg>
						</div>
				
			</div>
			<script async> 
				const HOURHAND = document.querySelector("#hour");
				const MINUTEHAND = document.querySelector("#minute");

				const SECONDHAND = document.querySelector("#second");

				var date = new Date();
				console.log(date);
				let hr = date.getHours();
				let min = date.getMinutes();
				let sec = date.getSeconds();
				console.log("Hour: " + hr + " Minute: " + min + " Second: " + sec);

				let hrPosition = (hr*360/12) + (min*(360/60)/12);
				let minPosition = (min*360/60 )+ (sec*(360/60)/60);
				let secPosition = sec*360/60;

				function runThetime() {
				hrPosition = hrPosition+(3/360);
				minPosition = minPosition+(6/60);
				secPosition = secPosition+(6);

				HOURHAND.style.transform = "rotate(" + hrPosition + "deg)";
				MINUTEHAND.style.transform = "rotate(" + minPosition + "deg)";
				SECONDHAND.style.transform = "rotate(" + secPosition + "deg)";
				}

				var interval = setInterval(runThetime, 1000);
			</script>
			<!-- -----Script cho pure CSS------------- -->
			<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script> 
			<script>
				$(function(){

					// Remove svg.radial-progress .complete inline styling
					$('svg.radial-progress').each(function( index, value ) { 
					$(this).find($('circle.complete')).removeAttr( 'style' );
					});

					// Activate progress animation on scroll
					$(window).scroll(function(){
					$('svg.radial-progress').each(function( index, value ) { 
					// If svg.radial-progress is approximately 25% vertically into the window when scrolling from the top or the bottom
					if ( 
					$(window).scrollTop() > $(this).offset().top - ($(window).height() * 0.75) &&
					$(window).scrollTop() < $(this).offset().top + $(this).height() - ($(window).height() * 0.25)
					) {
					// Get percentage of progress
					percent = $(value).data('percentage');
					// Get radius of the svg's circle.complete
					radius = $(this).find($('circle.complete')).attr('r');
					// Get circumference (2πr)
					circumference = 2 * Math.PI * radius;
					// Get stroke-dashoffset value based on the percentage of the circumference
					strokeDashOffset = circumference - ((percent * circumference) / 100);
					// Transition progress for 1.25 seconds
					$(this).find($('circle.complete')).animate({'stroke-dashoffset': strokeDashOffset}, 1250);
					}
					});
					}).trigger('scroll');									

				});								
			</script>
			<script>
				$(function(){

					// Remove svg.radial-progress .complete inline styling
					$('svg.radial-progress2').each(function( index, value ) { 
					$(this).find($('circle.complete2')).removeAttr( 'style' );
					});

					// Activate progress animation on scroll
					$(window).scroll(function(){
					$('svg.radial-progress2').each(function( index, value ) { 
					// If svg.radial-progress is approximately 25% vertically into the window when scrolling from the top or the bottom
					if ( 
					$(window).scrollTop() > $(this).offset().top - ($(window).height() * 0.75) &&
					$(window).scrollTop() < $(this).offset().top + $(this).height() - ($(window).height() * 0.25)
					) {
					// Get percentage of progress
					percent = $(value).data('percentage');
					// Get radius of the svg's circle.complete
					radius = $(this).find($('circle.complete2')).attr('r');
					// Get circumference (2πr)
					circumference = 2 * Math.PI * radius;
					// Get stroke-dashoffset value based on the percentage of the circumference
					strokeDashOffset = circumference - ((percent * circumference) / 100);
					// Transition progress for 1.25 seconds
					$(this).find($('circle.complete2')).animate({'stroke-dashoffset': strokeDashOffset}, 1250);
					}
					});
					}).trigger('scroll');									

				});								
			</script>
			<script type="text/javascript">

				var _gaq = _gaq || [];
				_gaq.push(['_setAccount', 'UA-36251023-1']);
				_gaq.push(['_setDomainName', 'jqueryscript.net']);
				_gaq.push(['_trackPageview']);

				(function() {
					var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
					ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
					var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);	
				})();
			</script>
			<!-- het script pure css gom temp va humid-->		
		</div>
	<!-- script nav-->	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>

		$(".nav").click(function(){
		$("#mySidenav").css('width','75px');
		$("#main").css('margin-left','75px');
		$(".logo").css('visibility', 'hidden');
		$(".logo span").css('visibility', 'visible');
			$(".logo span").css('margin-left', '-0px');
			$(".icon-a").css('visibility', 'hidden');
			$(".icons").css('visibility', 'visible');
			$(".icons").css('margin-left', '-0px');
			$(".nav").css('display','none');
			$(".nav2").css('display','block');
		});

		$(".nav2").click(function(){
		$("#mySidenav").css('width','240px');
		$("#main").css('margin-left','240px');
		$(".logo").css('visibility', 'visible');
			$(".icon-a").css('visibility', 'visible');
			$(".icons").css('visibility', 'visible');
			$(".nav").css('display','block');
			$(".nav2").css('display','none');
		});

	</script>

</body>


</html>
