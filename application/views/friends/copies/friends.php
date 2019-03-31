
	<div class="container">
		<div class="post-container row">
			
		</div>
		<div class="row">
			<a href='/friend_profile'>About</a>
			<a href='/show_friends'>Friends</a>
		</div>
		<?php
			foreach($friends as $row) {
				echo 
				"<div>" . $row['first_name'] . " " . 
					$row['last_name'] . 
					"<img src='/" . $row['picture_url'] . "' alt='profile_pic'>
				</div>" ;
			}
		?>



	</div>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
