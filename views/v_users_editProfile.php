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
		<form method="POST" action="/users/p_editProfile">
			<h3>Update Your Profile:</h3><br>
			<?php if(isset($error)): ?>
				<div class='failtext'>
					<p>You typed too much, try again!</p>
				</div>
			<?php endif; ?>
			Location: <input type="text" name="location" class="page_form"><br>
			About: <textarea name="about" class="content"></textarea>
			<input type="submit" value="Update Profile" class="post_buttons">
		</form>
		<br><br>
	</div>
</div>
