<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="./css/Mapcss.css">
		<script src="./js/Mapjs.js" type="text/javascript"></script>
		<script src="./js/reservecancel.js" type="text/javascript"></script>
		<script src="./js/prototype.js" type="text/javascript"></script>
	</head>
	<body>
		<header>
			<!-- 유저 상태창 -->
			<div id="status">
				<ul id="snum">학번: <?php echo $_COOKIE["id"]; ?></ul>
				<ul id="sname">이름: <?php echo $_COOKIE["name"]; ?></ul>
				<ul id="sdepart">학과: <?php echo $_COOKIE["major"]; ?></ul>
			</div>
			<div id="logout"><a href="index.php"><img src="./img/logout.png"></a></div>
		</header>
		<article>
		<!-- 지도 -->
			
			<div id="cancel_filter" class="dis_show">
				<div id="cancel" class="dis_show">
					<form id="cancel_form">
						<table>
                     <tr>
                        <td class="num">번호</td>
                        <td class="builgding">빌딩</td>
                        <td class="roomnum">방번호</td>
                        <td class="checkin">체크인</td>
                        <td class="checkout">체크아웃</td>
                     </tr>
                        <?php
                           $id = $_COOKIE['id'];
                           $name = "reserv";
                           $date = date(Y-m-d);
                           $db = new PDO("mysql:dbname=$name;host=localhost", "root", "apmsetup");
                           $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                           $rows = $db->query("select building, roomnum, checkin, checkout from reservation where checkin >= '$date' and id = '$id'");
                           foreach ($rows as $row) {
                              $i = 1;
                              $building=$row['building'];
                              $roomnum=$row['roomnum'];
                              $checkin=$row['checkin'];
                              $checkout=$row['checkout'];
                              ?>
                                 <tr>
                                    <td class="num"><input type="radio" name="number" value="<?=$i?>"/></td>
                                    <td class="building"><label><input type="hidden" name="building" value="<?=$building?>"><?=$building?></label></td>
                                    <td class="roomnum"><label><input type="hidden" name="roomnum" value="<?=$roomnum?>"><?=$roomnum?>호</label></td>
                                    <td class="checkin"><label><input type="hidden" name="checkin" value="<?=$checkin?>"><?=$checkin?></label></td>
                                    <td class="checkout"><label><input type="hidden" name="checkout" value="<?=$checkout?>"><?=$checkout?></label></td>
                                 </tr>
                              <?php
                              $i++;
                           }
                        ?>
                  </table>
						<button type="refresh" id="quit">취소</button>
						<input type="submit" value="예약취소" id="reservationCancelBtn"/>
					</form>

				</div>
			</div>
			<div id="Map">
				<img id="EriMap" src="./img/Erica map.jpg" >
				<div id="G1">
					<label><input type="checkbox" value="G1" id="G1_box"/><img src="./img/FGong.png"></label>
				</div>
			</div>
		</article>
		<aside>
		<!-- 사이드 바 -->
			<form id="reserv_form" action="reserv.php" enctype="multipart/from-data" method="post">
				<div id="date">날짜 선택: <input type="date" name="date" /></div>
				<div class="title">층별 강의실 (클릭 가능)</div>
				<div id="showroom">
					<div id="building">1공학관</div>
					<div class="floors" id="floor1">1층</div>
					<ul class="room_list" id="room_list1">
						<ul class="room dis_show"><label><input type="radio" name="room" value="101" />101호</label></ul>
						<ul class="room dis_show"><label><input type="radio" name="room" value="124" />124호</label></ul>
						<ul class="room dis_show"><label><input type="radio" name="room" value="125" />125호</label></ul>
						<ul class="room dis_show"><label><input type="radio" name="room" value="126" />126호</label></ul>
					</ul>
					<div class="floors" id="floor2">2층</div>
					<ul class="room_list" id="room_list2">
						<ul class="room dis_show"><label><input type="radio" name="room" value="201" />201호</label></ul>
						<ul class="room dis_show"><label><input type="radio" name="room" value="202" />202호</label></ul>
						<ul class="room dis_show"><label><input type="radio" name="room" value="203" />203호</label></ul>
						<ul class="room dis_show"><label><input type="radio" name="room" value="204" />204호</label></ul>
						<ul class="room dis_show"><label><input type="radio" name="room" value="205" />205호</label></ul>
						<ul class="room dis_show"><label><input type="radio" name="room" value="206" />206호</label></ul>
						<ul class="room dis_show"><label><input type="radio" name="room" value="207" />207호</label></ul>
					</ul>
					<div class="floors" id="floor3">3층</div>
					<ul class="room_list" id="room_list3">
						<ul class="room dis_show"><label><input type="radio" name="room" value="301" />301호</label></ul>
						<ul class="room dis_show"><label><input type="radio" name="room" value="302" />302호</label></ul>
						<ul class="room dis_show"><label><input type="radio" name="room" value="303" />303호</label></ul>
						<ul class="room dis_show"><label><input type="radio" name="room" value="304" />304호</label></ul>
						<ul class="room dis_show"><label><input type="radio" name="room" id="305" value="305" />305호</label></ul>
					</ul>
					<div class="floors" id="floor4">4층</div>
					<ul class="room_list" id="room_list4">
						<ul class="room dis_show"><label><input type="radio" name="room" value="401" />401호</label></ul>
						<ul class="room dis_show"><label><input type="radio" name="room" value="402" />402호</label></ul>
						<ul class="room dis_show"><label><input type="radio" name="room" value="403" />403호</label></ul>
						<ul class="room dis_show"><label><input type="radio" name="room" value="404" />404호</label></ul>
						<ul class="room dis_show"><label><input type="radio" name="room" value="405" />405호</label></ul>
						<ul class="room dis_show"><label><input type="radio" name="room" value="406" />406호</label></ul>
						<ul class="room dis_show"><label><input type="radio" name="room" value="407" />407호</label></ul>
						<ul class="room dis_show"><label><input type="radio" name="room" value="409" />409호</label></ul>
					</ul>
					<div class="floors" id="floor5">5층</div>
					<ul class="room_list" id="room_list5">
						<ul class="room dis_show"><label><input type="radio" name="room" value="501" />501호</label></ul>
						<ul class="room dis_show"><label><input type="radio" name="room" value="502" />502호</label></ul>
						<ul class="room dis_show"><label><input type="radio" name="room" value="503" />503호</label></ul>
						<ul class="room dis_show"><label><input type="radio" name="room" value="504" />504호</label></ul>
						<ul class="room dis_show"><label><input type="radio" name="room" value="505" />505호</label></ul>
						<ul class="room dis_show"><label><input type="radio" name="room" value="506" />506호</label></ul>
						<ul class="room dis_show"><label><input type="radio" name="room" value="507" />507호</label></ul>
						<ul class="room dis_show"><label><input type="radio" name="room" value="508" />508호</label></ul>
						<ul class="room dis_show"><label><input type="radio" name="room" value="509" />509호</label></ul>
					</ul>
				</div>
				<div class="title">강의실 시간표</div>
				<!-- <div id="classroom">1공학관 201호</div> -->
				<div id="timeline">
					<ul class="time"><label><input type="checkbox" name="time[]" id="1000" value="1000">10:00~10:30</label></ul>
					<ul class="time"><label><input type="checkbox" name="time[]" id="1030" value="1030">10:30~11:00</label></ul>
					<ul class="time"><label><input type="checkbox" name="time[]" id="1100" value="1100">11:00~11:30</label></ul>
					<ul class="time"><label><input type="checkbox" name="time[]" id="1130" value="1130">11:30~12:00</label></ul>
					<ul class="time"><label><input type="checkbox" name="time[]" id="1200" value="1200">12:00~12:30</label></ul>
					<ul class="time"><label><input type="checkbox" name="time[]" id="1230" value="1230">12:30~13:00</label></ul>
					<ul class="time"><label><input type="checkbox" name="time[]" id="1300" value="1300">13:00~13:30</label></ul>
					<ul class="time"><label><input type="checkbox" name="time[]" id="1330" value="1330">13:30~14:00</label></ul>
					<ul class="time"><label><input type="checkbox" name="time[]" id="1400" value="1400">14:00~14:30</label></ul>
					<ul class="time"><label><input type="checkbox" name="time[]" id="1430" value="1430">14:30~15:00</label></ul>
					<ul class="time"><label><input type="checkbox" name="time[]" id="1500" value="1500">15:00~15:30</label></ul>
					<ul class="time"><label><input type="checkbox" name="time[]" id="1530" value="1530">15:30~16:00</label></ul>
					<ul class="time"><label><input type="checkbox" name="time[]" id="1600" value="1600">16:00~16:30</label></ul>
					<ul class="time"><label><input type="checkbox" name="time[]" id="1630" value="1630">16:30~17:00</label></ul>
					<ul class="time"><label><input type="checkbox" name="time[]" id="1700" value="1700">17:00~17:30</label></ul>
					<ul class="time"><label><input type="checkbox" name="time[]" id="1730" value="1730">17:30~18:00</label></ul>
					<ul class="time"><label><input type="checkbox" name="time[]" id="1800" value="1800">18:00~18:30</label></ul>
					<ul class="time"><label><input type="checkbox" name="time[]" id="1830" value="1830">18:30~19:00</label></ul>
					<ul class="time"><label><input type="checkbox" name="time[]" id="1900" value="1900">19:00~19:30</label></ul>
					<ul class="time"><label><input type="checkbox" name="time[]" id="1930" value="1930">19:30~20:00</label></ul>
					<ul class="time"><label><input type="checkbox" name="time[]" id="2000" value="2000">20:00~20:30</label></ul>
					<ul class="time"><label><input type="checkbox" name="time[]" id="2030" value="2030">20:30~21:00</label></ul>
					<ul class="time"><label><input type="checkbox" name="time[]" id="2100" value="2100">21:00~21:30</label></ul>
					<ul class="time"><label><input type="checkbox" name="time[]" id="2130" value="2130">21:30~22:00</label></ul>
				</div>
				<input type="hidden" name="building" value="Y05" />
				<button id="reservation" type="submit" class="button">예약하기</button>
			</form>
			<button id="cancelBtn" type="button" class="button">예약취소</button>
		</aside>
	</body>
</html>