<!DOCTYPE html>
<head></head>
<body>
<?php
if (isset($user_name)): ?>
<h1>This is the username for <?=$user_name?></h1>
<?php else: ?>
<h1>No username specified.</h1>
<?php endif; ?>
</body>
