<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>TigerAdmin - Control Panel</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/tiger-admin.css" />
<!-- blue theme is default -->
<link rel="stylesheet" type="text/css" href="css/tiger-admin-login.css" />
<!-- blue theme is default -->

<!--[if lte IE 6]><link media="screen" rel="stylesheet" type="text/css" href="css/ie-login.css" /><![endif]-->

<!--[if lte IE 6]><link media="screen" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/ie.css" /><![endif]-->
<script type="text/javascript" src="<?php echo base_url(); ?>/js/css.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/js/behaviour.js"></script>
</head>
<body>
	<!--[if !IE]>start wrapper<![endif]-->
	<div id="wrapper">
		<!--[if !IE]>start head<![endif]-->
		<div id="head">
			<div class="inner">
				<h1 id="logo"><a href="#">Voltxion</a></h1>
				<!--[if !IE]>start user details<![endif]-->
                                <br />
                                        <ul id="user_details_menu">
                                            
                                            <?php if ($user = Current_User::user()): ?>
                                            <li class="first">Welcome <strong><?php echo $user->username; ?></strong></li>
                                            <li><a href="#">My Account</a></li>
                                            <li class="last"><?php echo anchor('logout', 'Logout'); ?></li>
					<?php else: ?>
                                            <li><?php echo anchor('login','Login'); ?></li>
                                            <li><?php echo anchor('signup', 'Register'); ?></li>
                                        <?php endif; ?>
                                        </ul>
					<div id="server_details">
						<dl>
							<dt>Server time:</dt>
							<dd>6:45 AM</dd>
						</dl>
						<dl>
							<dt>Last login ip:</dt>
							<dd>192.168.0.15</dd>
						</dl>
					</div>
				</div>
				<!--[if !IE]>end user details<![endif]-->