<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="assets/css/style7.css">
</head>
<body>
	<div class="container">
		<div class="fb-profile">
			<img class="fb-image-lg" src="/assets/logos/header.jpg" alt="Profile image example"/>
			<img class="fb-image-profile img-circle img-thumbnail" src="/assets/images/profile/default.jpg" alt="Profile image example"/>
			<div class="row">
				<div class="col-sm-3">
					<!--<?php //echo " <h1>  " . $profile['first_name'] ." " . $profile['last_name'] . "</h1>"; ?>
					<br>
					<div class="text-center">
					<p>Upload a different photo...</p>
					<input type="file" class="text-center center-block file-upload">
					</div>-->

					<!-- <?php //echo $error;?> -->

					<?php echo form_open_multipart('friends/do_upload');?>
					<input type="file" name="userfile" size="20" />
					<br /><br />
					<input type="submit" value="upload" />
					</form>
				</div>
				<div class="col-sm-9">
					<br>
					<a href='profile' class="btn btn-info btn-sm" id="btn1"><span class="glyphicon glyphicon-user"></span> My Profile</a>
					<a href='my_friends' class="btn btn-info btn-sm" id="btn1"><span class="glyphicon glyphicon-globe"></span> My Friends</a>
					<a href='edit_profile'class="btn btn-info btn-sm" id="btn1"><span class="glyphicon glyphicon-pencil"></span> Edit Profile</a>
				</div>
		</div>
		<div class="main-container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<?php 
						echo 
						"
						<form action='update_profile' method='post'>
						<div class='form-group'>
							<label>First Name</label>
							<div>" .
							$this->session->flashdata('first_name_err') . "
							</div>
							<input type='text' class='form-control' name='first_name' value='" . $profile['first_name'] ."'>
						</div>
						<div class='form-group'>
							<label>Last Name</label>
							<div>" .
							$this->session->flashdata('last_name_err') . "
							</div>
							<input type='text' class='form-control' name='last_name' value='" . $profile['last_name'] ."'>
						</div>
						<div class='form-group'>
							<label>City</label>
							<select class='form-control' name='city_id'>
								"; 
									foreach ($cities as $row) {
									echo
									"<option value='" . $row['city_id'] . "'>" .$row['city_name'] . "</option>";
									};
						echo "</select></div>
						<div class='form-group'>
							<label>Phone Number</label>
							<div>" .
							$this->session->flashdata('phone_number_err') . "
							</div>
							<input type='text' class='form-control' name='phone_number' value='" . $profile['phone_number'] ."'>
						</div>
						<div class='form-group'>
							<label>Birth Date</label>
							<input type='date' class='form-control' name='birth_date' max='" . date('Y-m-d') . "' value='" . $profile['birth_date'] ."'>
						</div>
						<div class='form-group'>
							<label>Linkedin Profile</label>
							<div>" .
							$this->session->flashdata('linkedin_err') . "
							</div>
							<input type='text' class='form-control' name='linkedin' value='" . $profile['linkedin'] ."'>
						</div>
						<div class='form-group'>
							<label>Biography</label><br>
							<textarea name='biography' class='form-control'>" . $profile['biography'] ."</textarea>
						</div>
						<div class='form-group'>
							<p><b>Are you a Student or a Professional?</b></p>";
							if ($profile['student_professional'] == 0 && $profile['student_professional'] !== NULL)
							{ echo 
								"<input type='radio' checked name='student_professional' value=0>
								<label>Student</label>
								<input type='radio' name='student_professional' value=1>
								<label>Professional</label>";
							} else if ($profile['student_professional']==1)
							{
								echo 
								"<input type='radio' name='student_professional' value=0>
								<label>Student</label>
								<input type='radio' name='student_professional' value=1 checked>
								<label>Professional</label>";
							} else {
								echo
								"<input type='radio' name='student_professional' value=0>
								<label>Student</label>
								<input type='radio' name='student_professional' value=1>
								<label>Professional</label>";
							};
						echo 
						"</div>
						<div class='form-group'>
							<label>University / Company</label>
							<input type='text' class='form-control' name='work_place' value='" . $profile['work_place'] ."'>
						</div>
						<div class='form-group'>
							<label>Expertise</label>
							<input type='text' class='form-control' name='expertise' value='" . $profile['expertise'] ."'>
						</div>
						<div class='form-group'>
							<label>Experience</label>
							<input type='text' class='form-control' name='experience' value='" . $profile['experience'] ."'>
						</div>
						<div class='form-group'>
							<label>Industry</label>
							<select name='industry_id' class='form-control'>
								"; 
								
									foreach ($industries as $row) {
									echo
									"<option value='" . $row['industry_id'] . "'>" .$row['industry'] . "</option>";
									};
						echo "</select></div>
						<div class='form-group'>
							<label>What kind of support are you looking for?</label>
							<input type='text' class='form-control' name='support_for' value='" . $profile['support_for'] ."'>
						</div>
						<div class='form-group'>
							<label>What kind of support can you give?</label>
							<input type='text' class='form-control' name='support' value='" . $profile['support'] ."'>
						</div>
						<div class='form-group'>
							<p><b>Role</b></p>";
							if ($profile['mentor_mentee'] == 0 && $profile['mentor_mentee'] !== NULL)
							{ echo 
								"<input type='radio' checked name='mentor_mentee' value=0>
								<label>Mentor</label>
								<input type='radio' name='mentor_mentee' value=1>
								<label>Mentee</label>";
							} else if ($profile['mentor_mentee']==1)
							{
								echo 
								"<input type='radio' name='mentor_mentee' value=0>
								<label>Mentor</label>
								<input type='radio' name='mentor_mentee' value=1 checked>
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
						<div class='form-group'>
							<p><b>Recruitment</b></p>";
							if ($profile['recruitment_no_yes'] == 0 && $profile['recruitment_no_yes'] !== NULL)
							{ echo 
								"<input type='radio' checked name='recruitment_no_yes' value=0>
								<label>Interested</label>
								<input type='radio' name='recruitment_no_yes' value=1>
								<label>Not interested</label>";
							} else if ($profile['recruitment_no_yes'] == 1)
							{
								echo 
								"<input type='radio' name='recruitment_no_yes' value=0>
								<label>Interested</label>
								<input type='radio' name='recruitment_no_yes' value=1 checked>
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

						<input type='submit' value='Update' class='btn btn-info' id='btn1'>
						<input type='reset' value='Cancel' class='btn btn-default' id='btn1'>
						"
						?>
                </div>      
			</div>
		</div>	
	</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
