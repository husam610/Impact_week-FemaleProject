
	<div class="container">
		<div class="post-container row">
			<a href='profile'>Profile</a>
			<a href='my_friends'>Friends</a>
			<a href='edit_profile'>Edit Profile</a>

		</div>
		<!------------ FRIENDS ------------------------------------------>
		<div>
			<?php
			echo $profile['first_name'];
				foreach($friends as $row) {
					echo 
					"<div>" . $row['first_name'] . " " . 
						$row['last_name'] . 
						"<img src='" . $row['picture_url'] . "' alt='profile_pic'>
					</div>
					<form action='friend_profile' method='post'>
                        <input type='hidden' name='profile_id' value='" . $row['friend_id'] . "'>
                        <input type='submit' value='View profile'> 
                    </form>
                    <input class='btn btn-disabled' type='submit' value='Friend' disabled> 
                 	";
				}
			?>
		</div>
		<!------------ REQUESTS SENT--------------------------------------->
		<div>
			<?php 
				foreach($requests_sent as $row){
					echo
					"<div>" . $row['first_name'] . " " . 
						$row['last_name'] . 
						"<img src='" . $row['picture_url'] . "' alt='profile_pic'>
					</div>
					<form action='friend_profile' method='post'>
                        <input type='hidden' name='profile_id' value='" . $row['to_user'] . "'>
                        <input type='submit' value='View profile'> 
                    </form>
                    <input class='btn btn-disabled' type='submit' value='Request sent' disabled>";
				}
			?>
		</div>
		<!------------ REQUESTS RECEIVED--------------------------------------->
		<div>
			<?php
				foreach($requests_received as $row) {
					echo 
					"<div>" . $row['first_name'] . " " . 
						$row['last_name'] . 
						"<img src='" . $row['picture_url'] . "' alt='profile_pic'>
					</div>
					<form action='friend_profile' method='post'>
                        <input type='hidden' name='profile_id' value='" . $row['from_user'] . "'>
                        <input type='submit' value='View profile'> 
                    </form>
                    <form action='add_friend' method='post'>
						<input type='hidden' name='requests_id' value='" . $row['requests_id'] . "'>
						<input type='submit' value='Confirm friend'>
					</form>";
				}
			?>
		</div>



	</div>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
