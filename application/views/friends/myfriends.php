<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="assets/css/style8.css">
</head>
<body>
	<div class="container">
		<div class="fb-profile">
			<img class="fb-image-lg" src="/assets/logos/header.jpg" alt="Profile image example"/>
			<img class="fb-image-profile img-circle img-thumbnail" src="/assets/images/profile/default.jpg" alt="Profile image example"/>
			<div class="row">
				<div class="col-sm-3">
					<?php echo " <h1>  " . $profile['first_name'] ." " . $profile['last_name'] . "</h1>"; ?>
		
				</div>
				<div class="col-sm-9">
					<br>
					<a href='profile' class="btn btn-info btn-sm" id="btn"><span class="glyphicon glyphicon-user"></span> My Profile</a>
					<a href='my_friends' class="btn btn-info btn-sm" id="btn"><span class="glyphicon glyphicon-globe"></span> My Friends</a>
					<a href='edit_profile'class="btn btn-info btn-sm" id="btn"><span class="glyphicon glyphicon-pencil"></span> Edit Profile</a>
				</div>
		</div>
		<!------------ FRIENDS ------------------------------------------>
		<div class="main-container">
		<div class="row">
			<?php
				foreach($friends as $row) {
					echo 
					"<div class='col-12 col-md-4'>
						<div class='panel panel-default'>
							<div class='panel-heading'>
								<img src='/assets/images/profile/default.jpg' class='img-responsive img-thumbnail img-circle' width='90px'>
							</div>
							<div class='panel-body'>
								<p>" . $row['first_name'] . " " . $row['last_name'] . "</p>
		
							</div>
							<div class='panel-footer'>
								<form action='friend_profile' method='post'>
									<input type='hidden' name='profile_id' value='" . $row['friend_id'] . "'>
									<input type='submit' id='btn2' value='View profile' class='btn btn-default'> 
								</form>
								<form action='friend_profile' method='post'>
								<input class='btn btn-default' id='btn2' type='submit' value='Friend' disabled>
								</form>
							</div>
						</div>
						<hr>
					</div> 
					";
				}
			?>
		</div>
		<!------------ REQUESTS SENT--------------------------------------->
		<div class="row">
			<?php 
				foreach($requests_sent as $row){
					echo
					"<div class='col-12 col-md-4'>
						<div class='panel panel-default'>
							<div class='panel-heading'>
								<img src='/assets/images/profile/default.jpg' class='img-responsive img-thumbnail img-circle' width='90px'>
							</div>
							<div class='panel-body'>
								<p>" . $row['first_name'] . " " . $row['last_name'] . "</p>
								<p><a href='#'>4 friends</a></p>
							</div>
							<div class='panel-footer'>
								<form action='friend_profile' method='post'>
									<input type='hidden' name='profile_id' value='" . $row['to_user'] . "'>
									<input type='submit' id='btn2' value='View profile' class='btn btn-default'> 
								</form>
								<form action='friend_profile' method='post'>
								<input class='btn btn-default' id='btn2' type='submit' value='Request sent' disabled>
								</form>
							</div>
						</div>
						<hr>
					</div>";
				}
			?>
		</div>
		<!------------ REQUESTS RECEIVED--------------------------------------->
		<div class="row">
			<?php
				foreach($requests_received as $row) {
					echo 
					"<div class='col-12 col-md-4'>
						<div class='panel panel-default'>
							<div class='panel-heading'>
								<img src='/assets/images/profile/default.jpg' class='img-responsive img-thumbnail img-circle' width='90px'>
							</div>
							<div class='panel-body'>
								<p>" . $row['first_name'] . " " . $row['last_name'] . "</p>
								<p><a href='#'>4 friends</a></p>
							</div>
							<div class='panel-footer'>
								<form action='friend_profile' method='post'>
									<input type='hidden' name='profile_id' value='" . $row['from_user'] . "'>
									<input type='submit' id='btn2' value='View profile' class='btn btn-default'> 
								</form>
                   				<form action='add_friend' method='post'>
									<input type='hidden' name='requests_id' value='" . $row['requests_id'] . "'>
									<input type='submit' id='btn2' value='Confirm friend' class='btn btn-primary'>
								</form>
							</div>
						</div>
						<hr>
					</div> ";
				}
			?>
		</div>
	</div>
	</div>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>