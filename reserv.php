<?php
	function transformTime($times){
		$time = array();
		$tmp = array();

		
		$tmp[0] = substr($times,0,2);
		$tmp[1] = substr($times,-2);
		$time[0] = implode(":",$tmp);
		


		return $time[0];
	}

	function calculateCheckout($times){
		$time = array();
		$tmp = array();

		if(substr($times,2,3) == "00") {
			$times += 30;
		} else {
			$times += 70;
		}

		
		$tmp[0] = substr($times,0,2);
		$tmp[1] = substr($times,-2);
		$time[0] = implode(":",$tmp);
		


		return $time[0];
	}

		try {		
					$time = "";
					$id = $_COOKIE["id"];
					$date = $_POST["date"];
					$roomnum = $_POST["room"];
					$time = $_POST["time"];
					$sub = max($time)-min($time);
					$check = array();
					$checks = array();

					$name = "reserv";
					$db = new PDO("mysql:dbname=$name;host=localhost","root","apmsetup");
					$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					if ($date < date("Y-m-d")) {
						echo "<meta http-equiv=\"Content-Type\" content = \"text/html;charset=utf-8\"/><script>alert('금일 이전의 예약은 불가능합니다.');</script>";
						echo "<meta http-equiv='refresh' content ='0; url=Map.php'>";
					}	
					else if(count($time)==1) {
						$check[0] = $date;
						$check[1] = transformTime($time);
						$checks[0] = $date;
						$checks[1] = calculateCheckout($time[0]);
						$checkin = implode(" ",$check);
						$checkout = implode(" ",$checks);

						$rows = $db->query("INSERT INTO reservation VALUES ('Y05', '$roomnum', '$checkin','$checkout', '$id')");
						echo "<meta http-equiv=\"Content-Type\" content = \"text/html;charset=utf-8\"/><script>alert('예약 완료.');</script>";
						echo "<meta http-equiv='refresh' content ='0; url=Map.php'>";
						
					}
					else if((count($time)==2&&$sub==30)||(count($time)==3&&$sub==100)||(count($time)==4&&$sub==130)) {
						$check[0] = $date;
						$check[1] = transformTime($time[0]);
						$checks[0] = $date;
						$checks[1] = calculateCheckout(max($time));
						$checkin = implode(" ",$check);
						$checkout = implode(" ",$checks);

						$rows = $db->query("INSERT INTO reservation VALUES ('Y05', '$roomnum', '$checkin','$checkout', '$id')");
						echo "<meta http-equiv=\"Content-Type\" content = \"text/html;charset=utf-8\"/><script>alert('예약 완료.');</script>";
						echo "<meta http-equiv='refresh' content ='0; url=Map.php'>";
					}
					else {
						echo "<meta http-equiv=\"Content-Type\" content = \"text/html;charset=utf-8\"/><script>alert('1일 1회 두시간이 최대이며 연속된 시간만 가능합니다.');</script>";
						echo "<meta http-equiv='refresh' content ='0; url=Map.php'>";
					}
					
					
					
			?><?php 	} 
				 catch (PDOException $ex) { ?>
					 <?php
   				    $status = $ex->getMessage;
   				    echo "<script>alert('Error is occured. Please try again.');</script>";
   				    echo "<meta http-equiv='refresh' content ='0; url=Map.php'>";
				} ?>