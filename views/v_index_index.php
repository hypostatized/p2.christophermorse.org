<?php if ($user): ?>
	<? Router::redirect('/users/profile'); ?>
<?php else: ?>

	<div id="navi">
		<div id="navi_ul">
			<ul>
				<li><a href="/about.html">About Shaberi</a></li>
				<li><a href="http://p1.christophermorse.org">Author</a></li>
				<li><a href="http://www.dwa15.com">DWA 15</a></li>
			</ul>
		</div>
	</div>
	<br><br><br>

	<div id="radial">
		<img src="/images/shaberi.png" alt="shaberi">
		<div id="radial_center">
			Welcome to <h3>Shaberi</h3>, microcommunication for the new age.<br><br>

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
	<p class="plusones">+1 edit avatar</p>
	<p class="plusones">+1 edit bio / view other users' bios</p>
<?php endif;?>