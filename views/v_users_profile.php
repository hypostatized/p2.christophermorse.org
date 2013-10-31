<br><br>

<div id="radial_profile">
<img src="<?=$user->avatar;?>" alt="<?=$user->username;?>" class="reg_avatar">
	<div id="radial_center">
		<h2><?=$user->username;?></h2>
		<p>Welcome to the site!</p>
	</div>

</div>
<div id="navi">
<div id ="navi_ul">
<li>
<a href="http://p2.christophermorse.org/users/profile/">Profile</a>
</li>
</div>
</div>

<div id="myPosts">
<h2>Posts by you:</h2>
	<?php foreach($posts as $post): ?>
		<article class="post">
			<img src="<?=$post['avatar']?>" alt="<?=$user->username;?>" class="sm_avatar">
			<h2><?=$user->username;?>:</h2><br>
			<time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
				<?=Time::display($post['created'])?>
			</time>
			<p><?=$post['content']?></p>
		</article><br>
	<?php endforeach; ?>
</div>


