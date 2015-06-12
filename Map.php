<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="./css/Mapcss.css">
		<script src="./js/Mapjs.js" type="text/javascript"></script>
		<script src="./js/prototype.js" type="text/javascript"></script>
	</head>
	<body>
		<header>
			<!-- 유저 상태창 -->
			<div id="status">
				<ul id="snum">학번: 2000123456</ul>
				<ul id="sname">이름: 김수한무</ul>
				<ul id="sdepart">학과: 컴퓨터공학과</ul>
			</div>
			<div id="logout"><img src="./img/logout.png"></div>
		</header>
		<article>
		<!-- 지도 -->
			<div id="Map">
				<img id="EriMap" src="./img/Erica map.jpg" >
				<div id="G1">
					<img src="./img/FGong.png">
				</div>

				<div id="G3">
					<img src="./img/TGong.png">
				</div>
			</div>
		</article>
		<aside>
		<!-- 사이드 바 -->
			<form action="Map.php">
				<div class="title">층별 강의실 (클릭 가능)</div>
				<div id="showroom">
					<div id="building">1공학관</div>
					<div class="floors" id="floor1">1층</div>
					<ul class="room_list" id="room_list1">
						<ul class="room"><label><input type="radio" name="room" value="101" />101호</label></ul>
						<ul class="room"><label><input type="radio" name="room" value="102" />102호</label></ul>
						<ul class="room"><label><input type="radio" name="room" value="103" />103호</label></ul>
						<ul class="room"><label><input type="radio" name="room" value="104" />104호</label></ul>
						<ul class="room"><label><input type="radio" name="room" value="105" />105호</label></ul>
					</ul>
					<div class="floors" id="floor2">2층</div>
					<ul class="room_list" id="room_list2">
						<ul class="room"><label><input type="radio" name="room" value="201" />201호</label></ul>
						<ul class="room"><label><input type="radio" name="room" value="202" />202호</label></ul>
						<ul class="room"><label><input type="radio" name="room" value="203" />203호</label></ul>
						<ul class="room"><label><input type="radio" name="room" value="204" />204호</label></ul>
						<ul class="room"><label><input type="radio" name="room" value="205" />205호</label></ul>
					</ul>
					<div class="floors" id="floor3">3층</div>
					<ul class="room_list" id="room_list3">
						<ul class="room"><label><input type="radio" name="room" value="301" />301호</label></ul>
						<ul class="room"><label><input type="radio" name="room" value="302" />302호</label></ul>
						<ul class="room"><label><input type="radio" name="room" value="303" />303호</label></ul>
						<ul class="room"><label><input type="radio" name="room" value="304" />304호</label></ul>
						<ul class="room"><label><input type="radio" name="room" value="305" />305호</label></ul>
					</ul>
				</div>
				<div class="title">강의실 시간표</div>
				<div id="classroom">1공학관 201호</div>
				<div id="timeline">
					<ul class="time"><label><input type="checkbox" name="time" value="1800">18:00~18:30</label></ul>
					<ul class="time"><label><input type="checkbox" name="time" value="1830">18:30~19:00</label></ul>
					<ul class="time"><label><input type="checkbox" name="time" value="1900">19:00~19:30</label></ul>
					<ul class="time"><label><input type="checkbox" name="time" value="1930">19:30~20:00</label></ul>
					<ul class="time"><label><input type="checkbox" name="time" value="2030">20:30~21:00</label></ul>
					<ul class="time"><label><input type="checkbox" name="time" value="2100">21:00~21:30</label></ul>
					<ul class="time"><label><input type="checkbox" name="time" value="2130">21:30~22:00</label></ul>
					<ul class="time"><label><input type="checkbox" name="time" value="2200">22:00~22:30</label></ul>
					<ul class="time"><label><input type="checkbox" name="time" value="2230">22:30~23:00</label></ul>
				</div>
				<input type="hidden" name="building" value="Y05" />
				<button id="reservation" type="submit">예약하기</button>
			</form>
		</aside>
	</body>
</html>