<div id="butterflies">
	<ul class="navi_ul"><li>
		<a href="http://p2.christophermorse.org/">Home</a></li><li><a href="http://p2.christophermorse.org/posts/add">Post</a></li><li><a href="http://p2.christophermorse.org/users/logout">Log out</a></li></ul>
	</div>

	<?php foreach($posts as $post): ?>
		<br><br>
		<article class="post">
			<img src="../images/shaberi.png" alt="shaberi" class="post_logo">
			<h2><?=$post['username']?>:</h2><br>

			<time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
				<?=Time::display($post['created'])?>
			</time>

			<p><?=$post['content']?></p>

		</article><br>

	<?php endforeach; ?>


