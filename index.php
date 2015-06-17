<!DOCTYPE html>
<html>
<head>
	<title>Lecture Room Reservation System</title>
	<meta charset="utf-8"/>
	<link href="./css/index.css" type="text/css" rel="stylesheet" />
	<script src="./js/index.js" type="text/javascript"></script>
	<script src="./js/prototype.js" type="text/javascript"></script>
	<script src="./js/scriptaculous.js" type="text/javascript"></script>
</head>
<body>
	<div id="login">
		<h1 id="title">Lecture room Rerservation System</h1>
		<form id="login_form" action="login.php" enctype="multipart/from-data" method="post">
			<div class="field">
				<label for="id">ID : </label>
				<input type="text" name="id" id="id"/>
			</div>
			<div class="field">
				<label for="pw">PW : </label>
				<input type="password" name="pw" id="pw"/>
			</div>
			<div class="btns">
				<button form="login_form" type="submit" id="login_btn">Login</button>
				<button id="reg_btn" type="button">Join</button>
			</div>
		</form>
	</div>
	<div id="register_filter" class="dis_show">
		<div id="register" class="dis_show">
			<form id="register_form" action="reg.php" enctype="multipart/from-data" method="post">
				<ul class="row radio">
					<label><input type="radio" name="radio" value="st" id="student" class="radioes" checked="checked"/>Student</label>
					<label><input type="radio" name="radio" value="pf" id="professor" class="radioes"/>Professor</label>
				</ul>
				<ui class="row">
					<label><span>ID </span><input type="text" name="id" id="rid" placeholder="학번 기입" size="20"/></label>
				</ui>
				<ul class="row">
					<label><span>Password </span><input type="password" name="password" id="rpwd" placeholder="비밀번호"/></label>
				</ul>
				<ui class="row">
					<label><span>성명 </span><input type="text" name="name" id="rname" placeholder="성명" size="20"/></label>
				</ui>
				<ui class="row">
					<label><span>학과 </span><input type="text" name="depart" id="rdepart" placeholder="학과" size="20"/></label>
				</ui>
				
				<input type="hidden" name="identity" value="" id="identity"/>
				<button form="register_form" type="submit" id="register_btn">Done</button>
				<button id="reg_cancel" type="reset">Cancel</button>
			</form>
		</div>
	</div>
</body>
</html>