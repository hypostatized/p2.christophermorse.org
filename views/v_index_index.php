<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Shaberi</title>
	<link rel="stylesheet" type="text/css" href="../shaberi.css">
</head>

<body><br><br>
	<div id="radial">
		<img src="../images/shaberi.png" alt="shaberi">
		<div id="radial_center">
			Welcome to <h3>Shaberi</h3>, microcommunication for the new age. <br><br>

			<form method="POST" action="/users/p_login">
				Username: <input type="text" name="username" class="page_form"><br>
				Password: <input type="password" name="password" class="page_form"><br>
				<input type="submit" value="Log in" id="login">
			</form>
			<br><br>

			<form action="/users/signup">
				<input type="submit" value="Create Account" id="create">
			</form>
		</div>
	</div>

	<div id="navi">
		<ul id="navi_ul"><li>
			<a href="http://p2.christophermorse.org/about/">About</a></li><li><a href="">Contact</a></li><li><a href="http://www.dwa15.com">DWA15</a></li></ul>
		</div>
	</body>

	</html>