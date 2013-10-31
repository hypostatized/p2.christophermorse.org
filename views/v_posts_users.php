<h1 class="followInfo">Shaberi Users</h1>
<table id="followTable"><tr>
    <?php $i = 0; ?>
    <?php foreach($users as $user): ?>
        <?php if ($i != 0 && $i % 5 == 0): ?><tr><?php endif; ?>
        <td>
            <img src="/uploads/avatars/<?=$user['avatar']?>" class="sm_avatar" alt="<?=$user['username']?>">
        </div>
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
    <?php if ($i != 0 && $i % 5 == 0): ?></tr><?php endif; ?>

    <?php $i++; ?>

<?php endforeach; ?>
</tr></table>