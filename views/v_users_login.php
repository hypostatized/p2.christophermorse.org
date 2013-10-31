<br><br>
	<div id="radial">
		<img src="/images/shaberi.png" alt="shaberi">
		<div id="radial_center">
			<?php if(isset($error)): ?>
				<div class='failtext'>
					Login failed. Please double check your email and password.
				</div>
				<br>
			<?php endif; ?>
			Please log in: <br><br>

			<form method="POST" action="/users/p_login">
				Username: <input type="text" name="username" class="page_form"><br>
				Password: <input type="password" name="password" class="page_form"><br>
				<input type="submit" value="Log in" id="login">
			</form>

		</div>
	</div>

	<div class="navi">
		<ul class="navi_ul"><li>
			<a href="http://p2.christophermorse.org/about.html">About</a></li><li><a href="http://p1.christophermorse.org">Author</a></li><li><a href="http://www.dwa15.com">DWA15</a></li></ul>
		</div>
