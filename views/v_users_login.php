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
		<?php if(isset($error) && $error == 'fail'): ?>
			<div class='failtext'>
				<p>Login failed. Please double check your email and password.</p>
			</div>
		<? else: ?>
		<?php if(isset($error) && $error == 'newuser') ?>
		<p>Thanks for signing up! Please log in:</p>
	<? else: ?>
	<p>Please log in:</p>
<?php endif; ?>
<?php endif; ?>

<form method="POST" action="/users/p_login">
	Username: <input type="text" name="username" class="page_form"><br>
	Password: <input type="password" name="password" class="page_form"><br><br>
	<input type="submit" value="Log in" id="login">
</form>

</div>
</div>
