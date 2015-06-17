<?php
		try {
					$id = $_POST["id"];
					$today = date("Y-m-d");
					$name = "reserv";
					$db = new PDO("mysql:dbname=$name;host=localhost","root","apmsetup");
					$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$rows = $db->query("SELECT * from reservation where id = '$id' and checkin >= '$today'");

					foreach($rows as $row) {
						$arr['reservs'][] = array('building' => $row[building],
						'roomnum' => $row[roomnum],
						'checkin' => $row[checkin],
						'checkout' => $row[checkout]);
						
					}

					echo json_encode($arr);

					

					
					
					
			?><?php 	} 
				 catch (PDOException $ex) { ?>
					<p>Sorry, a database error occurred. Please try again later.</p>
   				    <p>(Error details: <?= $ex->getMessage() ?>)</p> <?php
				} ?>