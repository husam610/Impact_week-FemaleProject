
	<div class="container">
		<div class="post-container row">
			<a href='profile'>About</a>
			<a href='my_friends'>Friends</a>
			<a href='edit_profile'>Edit Profile</a>
		</div>
		<?php 
			echo 
			"<div>
			<img src='" . $profile['picture_url'] ."' alt='profile_pic'>" . " " . $profile['first_name']
			. " " . $profile['last_name'] . "</div>
		
			<form action='update_profile' method='post'>
			<div>
				<label>First Name</label>
				<div>" .
				$this->session->flashdata('first_name_err') . "
				</div>
				<input type='text' name='first_name' value='" . $profile['first_name'] ."'>
			</div>
			<div>
				<label>Last Name</label>
				<div>" .
				$this->session->flashdata('last_name_err') . "
				</div>
				<input type='text' name='last_name' value='" . $profile['last_name'] ."'>
			</div>
			<div>
				<label>City</label>
				<select name='city_id'>
					"; 
						foreach ($cities as $row) {
						echo
						"<option value='" . $row['city_id'] . "'>" .$row['city_name'] . "</option>";
						};
			echo "</select></div>
			<div>
				<label>Phone Number</label>
				<div>" .
				$this->session->flashdata('phone_number_err') . "
				</div>
				<input type='text' name='phone_number' value='" . $profile['phone_number'] ."'>
			</div>
			<div>
				<label>Birth Date</label>
				<input type='date' name='birth_date' max='" . date('Y-m-d') . "' value='" . $profile['birth_date'] ."'>
			</div>
			<div>
				<label>Linkedin Profile</label>
				<div>" .
				$this->session->flashdata('linkedin_err') . "
				</div>
				<input type='text' name='linkedin' value='" . $profile['linkedin'] ."'>
			</div>
			<div>
				<label>Biography</label><br>
				<textarea name='biography' value='" . $profile['biography'] ."'></textarea>
			</div>
			<div>
				<label>Are you a Student or a Professional?</label>";
				if ($profile['student_professional'] == 0 && $profile['student_professional'] !== NULL)
				{ echo 
					"<input type='radio' checked name='student_professional' value=0>
					<label>Student</label>
					<input type='radio'name='student_professional' value=1>
					<label>Professional</label>";
				} else if ($profile['student_professional']==1)
				{
					echo 
					"<input type='radio' name='student_professional' value=0>
					<label>Student</label>
					<input type='radio'name='student_professional' value=1 checked>
					<label>Professional</label>";
				} else {
					echo
					"<input type='radio' name='student_professional' value=0>
					<label>Student</label>
					<input type='radio'name='student_professional' value=1>
					<label>Professional</label>";
				};
			echo 
			"</div>
			<div>
				<label>University / Company</label>
				<input type='text' name='work_place' value='" . $profile['work_place'] ."'>
			</div>
			<div>
				<label>Expertise</label>
				<input type='text' name='expertise' value='" . $profile['expertise'] ."'>
			</div>
			<div>
				<label>Experience</label>
				<input type='text' name='experience' value='" . $profile['experience'] ."'>
			</div>
			<div>
				<label>Industry</label>
				<select name='industry_id'>
					"; 
					
						foreach ($industries as $row) {
						echo
						"<option value='" . $row['industry_id'] . "'>" .$row['industry'] . "</option>";
						};
			echo "</select></div>
			<div>
				<label>What kind of support are you looking for?</label>
				<input type='text' name='support_for' value='" . $profile['support_for'] ."'>
			</div>
			<div>
				<label>What kind of support can you give?</label>
				<input type='text' name='support' value='" . $profile['support'] ."'>
			</div>
			<div>
				<label>Role</label>";
				if ($profile['mentor_mentee'] == 0 && $profile['mentor_mentee'] !== NULL)
				{ echo 
					"<input type='radio' checked name='mentor_mentee' value=0>
					<label>Mentor</label>
					<input type='radio'name='mentor_mentee' value=1>
					<label>Mentee</label>";
				} else if ($profile['mentor_mentee']==1)
				{
					echo 
					"<input type='radio' name='mentor_mentee' value=0>
					<label>Mentor</label>
					<input type='radio'name='mentor_mentee' value=1 checked>
					<label>Mentee</label>";
				} else {
					echo
					"<input type='radio' name='mentor_mentee' value=0>
					<label>Mentor</label>
					<input type='radio' name='mentor_mentee' value=1>
					<label>Mentee</label>"
				;}
			echo
			"</div>
			<div>
				<label>Recruitment</label>";
				if ($profile['recruitment_no_yes'] == 0 && $profile['recruitment_no_yes'] !== NULL)
				{ echo 
					"<input type='radio' checked name='recruitment_no_yes' value=0>
					<label>Interested</label>
					<input type='radio'name='recruitment_no_yes' value=1>
					<label>Not interested</label>";
				} else if ($profile['recruitment_no_yes'] == 1)
				{
					echo 
					"<input type='radio' name='recruitment_no_yes' value=0>
					<label>Interested</label>
					<input type='radio'name='recruitment_no_yes' value=1 checked>
					<label>Not interested</label>";
				} else {
					echo
				"<input type='radio' name='recruitment_no_yes' value=0>
				<label>Interested</label>
				<input type='radio' name='recruitment_no_yes' value=1>
				<label>Not interested</label>"
				;}
			echo
			"</div>

			<input type='submit' value='Update' class='btn btn-info'>
			<input type='reset' value='Cancel' class='btn btn-default'>
			"
			?>






	</div>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
