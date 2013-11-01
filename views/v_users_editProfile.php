<div id="navi">
    <div id="navi_ul">
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
    </div>
</div>
<br><br>
	<div id="radial">
		<img src="/images/shaberi.png" alt="shaberi">
		<div id="radial_center">
			<form method="POST" action="/users/p_editProfile">
				<label for='content'><h3>New Post:</h3></label><br>
				<?php if(isset($error)): ?>
				<div class='failtext'>
					You typed too much, try again!
				</div>
			<?php endif; ?>
				Location: <input type="text" name="location" class="page_form"><br>
    			About: <textarea name='about' class='content'></textarea>
				<input type="submit" value="Edit Profile" class="post_buttons">
			</form>
			<br><br>
		</div>
	</div>