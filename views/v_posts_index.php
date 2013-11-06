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
<table id="followTable">
	<?php $i = 0; ?>
	<?php if ($i = 0 || $i % 3 == 0): ?><tr><?php endif; ?>
	<?php foreach($posts as $post): ?>

		<td>
			<div class="post">

				<a href="/users/viewProfile/<?=$post['username']?>"><img src="<?=$post['avatar'];?>" alt="<?=$post['username']?>" class="sm_avatar"></a>
				<h2><?=$post['username']?>:</h2><br>

				<time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
					<?=Time::display($post['created'])?>
				</time>

				<p><?=$post['content']?></p>

			</div>	
		</td>
		<?php $i++ ?>
		<?php if ($i = 0 || $i % 3 == 0): ?></tr><?php endif; ?>
	<?php endforeach; ?>
</table>
