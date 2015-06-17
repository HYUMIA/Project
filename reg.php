<?php
		try {
					$id = $_POST["id"];
					$username = $_POST["name"];
					$depart = $_POST["depart"];
					$password = $_POST["password"];
					$identity = $_POST["radio"];

					if($id==""||$username==""||$depart==""||$password=="") {
						echo "<meta http-equiv=\"Content-Type\" content = \"text/html;charset=utf-8\"/><script>alert('빈칸이 존재합니다.');</script>";
						echo "<meta http-equiv='refresh' content ='0; url=index.php'>";
					}

					else {
					

					$name = "reserv";
					$db = new PDO("mysql:dbname=$name;host=localhost","root","apmsetup");
					$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					$username = iconv("UTF-8", "EUC-KR", $username); 
					$depart = iconv("UTF-8", "EUC-KR", $depart); 

					$rows = $db->query("INSERT INTO user VALUES ('$id', '$username', '$depart','$password', '$identity')");
					echo "<meta http-equiv=\"Content-Type\" content = \"text/html;charset=utf-8\"/><script>alert('가입 완료');</script>";
					echo "<meta http-equiv='refresh' content ='0; url=index.php'>";
					/*
					echo "INSERT INTO user VALUES ('$id', '$username', '$depart','$password','$identity')";
					
					$rows = $db->query("SELECT count(*) from user where id = '$id' and password = '$password'");
					$crows = $db->query("SELECT * from user where id = '$id' and password = '$password'");

					foreach($rows as $row) {
						if($row[0]==1) {
							foreach($crows as $crow) {
								$cname = iconv("EUC-KR", "UTF-8", $crow['name']); 
								$cmajor = iconv("EUC-KR", "UTF-8", $crow['major']);

								setcookie('id', $id,time()+10000, "/");
								setcookie('name', $cname,time()+10000, "/");
								setcookie('major', $cmajor,time()+10000, "/");
							} 
							
							echo "<meta http-equiv='refresh' content ='0; url=Map.php'>";
						}
						else {
							echo "<script>alert('Please input valid ID and Password');</script>";
							echo "<meta http-equiv='refresh' content ='0; url=index.php'>";

							
						}
					} */

					}

					
					
					
			?><?php 	} 
				 catch (PDOException $ex) { ?>
					 <?php
   				    $status = $ex->getMessage;
   				    echo "<meta http-equiv=\"Content-Type\" content = \"text/html;charset=utf-8\"/><script>alert('이미 존재하는 ID이거나 유효하지 않은 ID 입니다.');</script>";
   				    echo "<meta http-equiv='refresh' content ='0; url=index.php'>";
				} ?>