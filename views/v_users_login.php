<div id="navi">
<div id="navi_ul">
<ul>
<?php if ($user): ?>
<li><a href="/">My Profile</a></li>
<li><a href="/users/editProfile">Edit Profile</a></li>
<li><a href="/users/myImg">Edit Avatar</a></li>
<li><a href="/posts/add">New Post</a></li>
<li><a href="/posts/">Friends</a></li>
<li><a href="/posts/users">Community</a></li>
<?php endif ?>
<li>
<?php if ($user): ?><a href="/users/logout">Logout</a><?php else: ?><a href="/users/login">Login</a><?php endif ?>
</li>
</ul>
</div>
</div>
<br><br><br>
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
