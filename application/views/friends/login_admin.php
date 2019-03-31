<!DOCTYPE html>
<html>
<head>
	<title>Female Friends</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" type="text/css" href="<? echo base_url('assets/css/style.css');?>" />
</head>
<body>
	<div class="container">
		<h2>Welcome to Female Friends Admin Page!</h2>
		<h3><?= $this->session->userdata('welcome'); ?></h3>

	<!-- ----------	Login form ----------------->		
			<div class="col-xs-6" id="log">
				<h3>Login</h3>
				<form action="login_admin" method="post">
					<input type="text" name="email_log" placeholder="email" value="<?php echo set_value('email_log'); ?>">
					<?php echo $this->session->userdata('error_pass_log'); ?>
					<input type="password" name="password_log" placeholder="password"">
					<input type="submit" value="Login">
				</form>
		</div>
	</div><!-- end of container div -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</body>
</html>