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
<table id="followTable"><tr>
    <?php $i = 0; ?>
    <?php if ($i != 0 && $i % 3 == 0): ?><tr><?php endif; ?>
    <?php foreach($posts as $post): ?>

        <td>
            <div class="post">
                <?php $post['avatar'] = "/uploads/avatars/" . $post['avatar'] ?>
                <img src="<?=$post['avatar'];?>" alt="<?=$post['username']?>" class="sm_avatar">
                <h2><?=$post['username']?>:</h2><br>

                <time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
                    <?=Time::display($post['created'])?>
                </time>

                <p><?=$post['content']?></p>

            </div>	
        </td>
        <?php $i++ ?>
        <?php if ($i % 3 == 0): ?></tr><?php endif; ?>
    <?php endforeach; ?>
</tr></table>
