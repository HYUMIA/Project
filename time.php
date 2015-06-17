<?php
		try {
					$date = $_POST["date"];
					$roomnum = $_POST["room"];
					$check = array();
					$ccheck = array();
					$check[0] = $date;
					$check[1] = "10:00";
					$ccheckin = implode(" ",$check);
					$ccheck[0] = $date;
					$ccheck[1] = "22:00";
					$ccheckout = implode(" ",$ccheck);
					$origintime = array(1000, 1030, 1100, 1130, 1200, 1230, 1300, 1330, 1400,1430, 1500, 1530, 1600, 1630, 1700, 1730, 1800, 1830, 1900, 1930, 2000, 2030, 2100, 2130);
					$oorigintime = array(1000, 1030, 1100, 1130, 1200, 1230, 1300, 1330, 1400, 1430, 1500, 1530, 1600, 1630, 1700, 1730, 1800, 1830, 1900, 1930, 2000, 2030, 2100, 2130);
					$reserved = array();
					$testarray = array();
					$boolean = false;



					$name = "reserv";
					$db = new PDO("mysql:dbname=$name;host=localhost","root","apmsetup");
					$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$rows = $db->query("SELECT * from reservation where roomnum = '$roomnum' and checkin >= '$ccheckin' and checkout <= '$ccheckout'");

					foreach($rows as $row) {
						$tmpin = array();
						$tmpout = array();
						$rcheckin = substr($row[checkin],11,5);
						$rcheckout = substr($row[checkout],11,5);

						$tmpin = explode(":",$rcheckin);
						$tmpout = explode(":",$rcheckout);

						$imtmpin = implode("",$tmpin);
						$imtmpout = implode("",$tmpout);

						for($i=$imtmpin;$i<$imtmpout;$i++) {
							for($k=0;$k<count($origintime);$k++){
								if($origintime[$k]==$i) {
									array_push($reserved, $k);
									//$reserved[] = $origintime[$k];
								}
							}
						}
					}


    				unset($origintime[$reserved[0]]);
    				unset($origintime[$reserved[1]]);
    				unset($origintime[$reserved[2]]);
    				unset($origintime[$reserved[3]]);
    				unset($origintime[$reserved[4]]);
    				unset($origintime[$reserved[5]]);
    				unset($origintime[$reserved[6]]);
    				unset($origintime[$reserved[7]]);
    				unset($origintime[$reserved[8]]);
    				unset($origintime[$reserved[9]]);
    				unset($origintime[$reserved[10]]);
    				unset($origintime[$reserved[11]]);
    				unset($origintime[$reserved[12]]);
    				unset($origintime[$reserved[13]]);
    				unset($origintime[$reserved[14]]);
    				unset($origintime[$reserved[15]]);
    				unset($origintime[$reserved[16]]);
    				unset($origintime[$reserved[17]]);
    				unset($origintime[$reserved[18]]);
    				unset($origintime[$reserved[19]]);
    				unset($origintime[$reserved[20]]);
    				unset($origintime[$reserved[21]]);
    				unset($origintime[$reserved[22]]);
    				unset($origintime[$reserved[23]]);
    
            		$boolean = true;

					sort($origintime);
					$testarray = $origintime;
					/*
					
					print_r($testarray);
						if($boolean){
							error_reporting(0);
							$ary = array('time',$testarray);
							echo json_encode(array('time'=>$testarray));
							$boolean = false;
							break;
						}
					

					
					for($a=0;$a<count($reserved);$a++){
						echo $reserved[$a];
						echo ", ";
					}

						echo $reserved[0];
						echo " r, ";
						echo $origintime[0];
						echo " o, ";
						
					*/

					//var_dump($ary);

					


					
					/*
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

							
						} */

					

					
					
					
			?><?php 	} 
				 catch (PDOException $ex) { ?>
					<p>Sorry, a database error occurred. Please try again later.</p>
   				    <p>(Error details: <?= $ex->getMessage() ?>)</p> <?php
				} ?>