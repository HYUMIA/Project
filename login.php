<?php
		try {
					$id = $_POST["id"];
					$password = $_POST["pw"];
					$name = "reserv";
					$db = new PDO("mysql:dbname=$name;host=localhost","root","apmsetup");
					$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
							echo "<meta http-equiv=\"Content-Type\" content = \"text/html;charset=utf-8\"/><script>alert('올바른 ID 또는 비밀번호를 입력하시오.');</script>";
							echo "<meta http-equiv='refresh' content ='0; url=index.php'>";

							
						}
					}

					

					
					
					
			?><?php 	} 
				 catch (PDOException $ex) { ?>
					<p>Sorry, a database error occurred. Please try again later.</p>
   				    <p>(Error details: <?= $ex->getMessage() ?>)</p> <?php
				} ?>

