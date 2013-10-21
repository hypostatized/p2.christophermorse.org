<!DOCTYPE html>
<html>
<head>
	<title>Shaberi: Create Account</title>
	<link rel="stylesheet" type="text/css" href="../shaberi.css">
</head>

<body><br><br>
	<div id="radial">
		<img src="../images/shaberi.png">
		<div id="radial_center">
			Please fill out the form to join Shaberi.<br><br>

			<form  method="POST" action="/users/p_signup">
				First Name <input type='text' name='first_name' class="page_form"><br>
				Last Name <input type='text' name='last_name' class="page_form"><br>
				Username <input type='text' name='username' class="page_form"><br>
				Email <input type='text' name='email' class="page_form"><br>
				Password <input type='password' name='password' class="page_form"><br>
				<input type="submit" value="Create Account" id="new_acct">
			</form>
			<br><br>

		</div>
	</div>

	<div id="navi">
		<ul id="navi_ul"><li>
			<a href="">About</a></li><li><a href="">Contact</a></li><li><a href="http://www.dwa15.com">DWA15</a></li></ul>
	</div>
</body>

</html>