<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Signup Form</title>
</head>
<body>

<div id="signup_form">

	<p class="heading">New User Signup</p>

	<?php echo form_open('signup/submit'); ?>

	<p>
		<label for="username">Username: </label>
		<?php echo form_input('username'); ?>
	</p>
	<p>
		<label for="password">Password: </label>
		<?php echo form_password('password'); ?>
	</p>
	<p>
		<label for="passconf">Confirm Password: </label>
		<?php echo form_password('passconf'); ?>
	</p>
	<p>
		<label for="email">E-mail: </label>
		<?php echo form_input('email'); ?>
	</p>
	<p>
		<?php echo form_submit('submit','Create my account'); ?>
	</p>

	<?php echo form_close(); ?>
</div>

</body>
</html>
