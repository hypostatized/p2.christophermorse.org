<div id="navi">
	<div id="navi_ul">
		<ul>
			<li>
				<?php if ($user): ?><a href="/users/logout">Logout</a><?php else: ?><a href="/users/login">Login</a><?php endif ?>
			</li>
			<?php if ($user): ?>
				<li><a href="/">My Profile</a></li>
				<li><a href="/users/editProfile">Edit Profile</a></li>
				<li><a href="/users/myImg">Edit Avatar</a></li>
				<li><a href="/posts/add">Post</a></li>
				<li><a href="/posts/">View Followers</a></li>
				<li><a href="/posts/users">Find Users</a></li>
			<?php endif ?>
		</ul>
	</div>
</div>
<br><br><br>
<div id="radial">
	<img src="/images/shaberi.png" alt="shaberi">
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
		<a href="http://p2.christophermorse.org/about.html">About</a></li><li><a href="http://p1.christophermorse.org">Author</a></li><li><a href="http://www.dwa15.com">DWA15</a></li></ul>
	</div>
