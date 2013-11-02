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
    <?php if ($i % 5 == 0): ?><tr><?php endif; ?>
    <?php foreach($users as $user): ?>

        <td>
            <img src="/uploads/avatars/<?=$user['avatar']?>" class="sm_avatar" alt="<?=$user['username']?>">

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
        </td>
        <?php $i++; ?>

        <?php if ($i % 5 == 0): ?></tr><?php endif; ?>
    <?php endforeach; ?>

</tr></table>