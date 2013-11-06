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
<div id="radial_profile">
	<img src="/uploads/avatars/<?=$this_profile['avatar']?>" alt="<?=$this_profile['username']?>" class="reg_avatar">
	<div id="radial_center">
		<h2><?=$whatuser?></h2><br><br><br><br><br>
		<h3><span class="left">Location:</span></h3><p><?=$this_profile['location'];?></p>
		<h3><span class="left">About Me:</span></h3><p><?=$this_profile['about'];?></p>
	</div>
</div>

<div id="myPosts">
	<h2><?=$whatuser?>'s Posts:</h2><br><br>
	<?php foreach($this_posts as $post): ?>
		<article class="post">
			<img src="/uploads/avatars/<?=$this_profile['avatar']?>" alt="<?=$this_profile['username']?>" class="sm_avatar">
			<h2><?=$post['username']?>:</h2><br>
			<time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
				<?=Time::display($post['created'])?>
			</time>
			<p><?=$post['content']?></p>
		</article><br>
	<?php endforeach; ?>
</div>



