<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
</head>
<body>
	<form action="assign.php" method="post" enctype="multipart/form-data">
			<ul id="sets">
				<li >
					ID : <input type="text" name="id" value="id"/> <button type="button" id="check">중복확인</button>
				</li>
				<li>
					Password : <input type="password" name="password" value="password"/> 
				</li>
				<li>
					Nick Name : <input type-"text" name="nick" /> 커플 애칭, 별명 ex> 홍이와 람이
				</li>
				<li>
					Male : <input type="text" name="m_name" /> 남성 이름
				</li>
				<li>
					Female : <input type="text" name="f_name" /> 여성 이름
				</li>
				<li>
					D-day : <input type = "date" name = "d_day" /> 사귀귀 시작한 날! </br>
				</li>
				<li>
					Photo : <input type="file" name="photo" id="photo" /> 커플 사진을 올려주세요! </br>
					<input type="submit" value = "Assign" id="assign"/><br /><input type="reset" id="reset" value="초기화"/>
				</li>
			</ul>
		</form>
</body>
</html>