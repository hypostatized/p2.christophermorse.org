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
	<tr>
		<?php $i = 0; ?>
		<?php $c = 1; ?>
		<?php foreach($users as $user): ?>
			<?php if ($i == 0 || $c % 5 == 0): ?>
				<td>
				<? else: ?>
				<td>
				<?php endif; ?>

				<a href="/users/viewProfile/<?=$user['username']?>"><img src="/uploads/avatars/<?=$user['avatar']?>" class="sm_avatar" alt="<?=$user['username']?>"></a>

				<div class="followInfo">
					<?=$user['username']?><br>
					<!-- If there exists a connection with this user, show a unfollow link -->
					<?php if(isset($connections[$user['user_id']])): ?>
						<a href='/posts/unfollow/<?=$user['user_id']?>'>Unfollow</a>

						<!-- Otherwise, show the follow link -->
					<?php else: ?>
						<a href='/posts/follow/<?=$user['user_id']?>'>Follow</a>
					<?php endif; ?>
				</div>

				<?php if ($i == 0 || $c % 5 != 0): ?>
				</td>
				<?php $i++; ?>
				<?php $c++; ?>
			<? else: ?>
			<?php if ($i != 0 && $c % 5 == 0): ?></td></tr><tr>
				<?php $i++; ?>
				<?php $c++; ?>
			<?php endif; ?>
		<?php endif; ?>

	<?php endforeach; ?>

</table>