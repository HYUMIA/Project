<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="./css/Mapcss.css">
		<!-- <script src="" type="text/javascript"> </script>js -->
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
			<div class="title">층별 강의실 (클릭 가능)</div>
			<div id="showroom">
				<ul class="building_list">
					<div class="building">1층</div>
					<ul class="row">101호</ul>
					<ul class="row">102호</ul>
					<ul class="row">103호</ul>
					<ul class="row">104호</ul>
					<ul class="row">105호</ul>
				</ul>
				<ul class="building_list">
					<div class="building">2층</div>
					<ul class="row">201호</ul>
					<ul class="row">202호</ul>
					<ul class="row">203호</ul>
					<ul class="row">204호</ul>
					<ul class="row">205호</ul>
				</ul>
				<ul class="building_list">
					<div class="building">3층</div>
					<ul class="row">301호</ul>
					<ul class="row">302호</ul>
					<ul class="row">303호</ul>
					<ul class="row">304호</ul>
					<ul class="row">305호</ul>
				</ul>
			</div>
			<div class="title">강의실 시간표</div>
			<div id="classroom">1공학관 201호</div>
			<div id="timeline">
				<ul class="row">6:00~6:30</ul>
				<ul class="row">6:30~7:00</ul>
				<ul class="row">7:00~7:30</ul>
				<ul class="row">7:30~8:00</ul>
				<ul class="row">8:30~9:00</ul>
				<ul class="row">9:00~9:30</ul>
				<ul class="row">9:30~10:00</ul>
				<ul class="row">10:00~10:30</ul>
				<ul class="row">10:30~11:00</ul>
			</div>
			<button id="reservation">예약하기</button>
		</aside>
	</body>
</html>