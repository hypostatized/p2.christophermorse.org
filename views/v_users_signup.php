<div id="navi">
	<div id="navi_ul">
		<ul>
			<li><a href="/about.html">About Shaberi</a></li>
			<li><a href="http://p1.christophermorse.org">Author</a></li>
			<li><a href="http://www.dwa15.com">DWA 15</a></li>
		</ul>
	</div>
</div>
<br><br><br>
<div id="radial">
	<img src="/images/shaberi.png" alt="shaberi">
	<div id="radial_center">
		<?php if(isset($error) && $error == 'username'): ?>
			<p class="failtext">Username already exists.</p>
		<?php else: ?>
			<?php if(isset($error) && $error == 'form'): ?>
				<p class="failtext">Please fill out all fields.</p>
			<?php else: ?>
				<p>Please fill out the form to join Shaberi.</p>
			<?php endif; ?>
		<?php endif; ?>

		<form  method="POST" action="/users/p_signup">
			First Name <input type='text' name='first_name' class="page_form"><br>
			Last Name <input type='text' name='last_name' class="page_form"><br>
			Username <input type='text' name='username' class="page_form"><br>
			Email <input type='text' name='email' class="page_form"><br>
			Password <input type='password' name='password' class="page_form"><br>
			<input type="submit" value="Create Account" id="new_acct">
		</form>
		<br><br>

	</div>
</div>
