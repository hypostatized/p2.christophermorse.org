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
<div id="radial_profile">
	<img src="<?=$user->avatar;?>" alt="<?=$user->username;?>" class="reg_avatar">
	<div id="radial_center">
		<h2><?=$user->username;?></h2><br><br><br><br>
		<h3>Location:</h3><p><?=$user->location;?></p>
		<h3>About Me:</h3><p> <?=$user->about;?></p>
	</div>
</div>


<div id="myPosts">
	<h2>Your Posts:</h2><br><br>
	<?php foreach($posts as $post): ?>
		<article class="post">
			<img src="<?=$user->avatar;?>" alt="<?=$user->username;?>" class="sm_avatar">
			<h2><?=$user->username;?>:</h2><br>
			<time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
				<?=Time::display($post['created'])?>
			</time>
			<p><?=$post['content']?></p>
		</article><br>
	<?php endforeach; ?>
</div>


