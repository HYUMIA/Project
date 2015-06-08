<!DOCTYPE html>
<html>
<head>
	<title>Lecture Room Reservation System</title>
	<meta charset="utf-8"/>
	<link href="./css/index.css" type="text/css" rel="stylesheet" />
	<script src="./js/index.js" type="text/javascript"></script>
	<script src="./js/prototype.js" type="text/javascript"></script>
</head>
<body>
	<div id="login">
		<h1 id="title">Lecture room Rerservation System</h1>
		<form id="login_form" action="Map.php" enctype="multipart/from-data">
			<div class="field">
				<label for="id">ID : </label>
				<input type="text" name="id" id="id"/>
			</div>
			<div class="field">
				<label for="pw">PW : </label>
				<input type="password" name="pw" id="pw"/>
			</div>
			<div class="btns">
				<button form="login_form" type="submit" name="login" id="login_btn">Login</button>
				<button id="reg_btn" type="button">Join</button>
			</div>
		</form>
	</div>
	<div id="register_filter" class="dis_show">
		<form id="register_form" action="index.php" class="dis_show">
			<ul class="row radio">
				<label><input type="radio" name="type" value="student" id="student" class="radioes">Student</label>
				<label><input type="radio" name="type" value="professor" id="professor" class="radioes">Professor</label>
			</ul>
			<ui id="number" class="row">
				<label><span>학번</span><input type="text" name="number" placeholder="학번" size="20"/></label>
			</ui>
			<ui class="row">
				<label><span>이름 </span><input type="text" name="name" placeholder="이름" size="20"/></label>
			</ui>
			<ui class="row">
				<label><span>ID </span><input type="text" name="id" placeholder="ID" size="20"/></label>
			</ui>
			<ul class="row">
				<label><span>Password </span><input type="password" name="password" placeholder="비밀번호"/></label>
			</ul>
			<!-- <ul class="notice">
				* : 필수입력
			</ul> -->
			<button type="submit">Done</button>
			<button id="reg_cancel" type="refresh">Cancel</button>
		</form>
	</div>
</body>
</html>