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
		<h4>Photo types accepted: gif, jpg, png. Please no larger than 400kb, and for best results resize your image to 150 x 150 pixels.</h4>
		<form action="/users/pMyImg/" method="post"
		enctype="multipart/form-data">
		<label for="file">Filename:</label>
		<input type="file" name="file" class="page_form"><br>
		<input type="submit" name="submit" value="Submit" class="post_buttons">
	</form>
</div>
</div>