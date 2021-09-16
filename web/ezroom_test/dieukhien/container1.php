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
						<p>Đèn 1<br/><span>Bật</span></p>
						<i class="fas fa-lightbulb box-icon-on"></i>
						';
				} else {
					echo '
						<p>Đèn 1<br/><span>Tắt</span></p>
						<i class="fas fa-lightbulb box-icon-off"></i>
						';
				}
			}
			$result->free();
		}
		?>