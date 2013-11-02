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
<h4>Photo types accepted: gif, jpg, png. Please no larger than 400kb, and for best results resize your image to 150 x 150 pixels.</h4>
<form action="/users/pMyImg/" method="post"
enctype="multipart/form-data">
<h3>Filename:</h3>
<input type="file" name="file" class="page_form"><br>
<input type="submit" name="submit" value="Submit" class="post_buttons">
</form>
</div>
</div>