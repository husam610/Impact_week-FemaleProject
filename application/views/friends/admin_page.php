<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="assets/css/style7.css">
</head>
<body>
<div class="container">
	<div class="fb-profile">
		<div class="main-container">
			<div class="row">
				<div class="col-md-6 ">
					<div style="background-color:  #AACACD; color: white; padding: 25px; border-radius: 15px; margin-bottom: 25px;"  >
					<form action="make_admin" method="post">
						<div class="form-group">
							<label >Make a new admin:</label>

						 	<select name="nor_email" class='form-control'>
							<?php
							if($all_emails_normal){
							foreach ($all_emails_normal as $value)
							{
							echo "<option value='{$value['user_id']}'> {$value['email']} </option>";
							}
							}
							?>
							</select>
							<input type="submit" value="Add" class="btn-info btn" style="margin: 10px;">
						</div>
					</form>
					<hr>
					<form action="remove_admin" method="post">
						<div class="form-group">
							<label >Remove an admin:</label>
							<select name="adm_email" class='form-control'>
							<?php
							if($all_emails_admin){
							foreach ($all_emails_admin as $value)
							{
							if($value['email'] !== 'admin@example.com'){
								echo "<option value='{$value['user_id']}'> {$value['email']} </option>";
							}
							}
							}
							?>
							</select>
							<input type="submit" value="Remove" class="btn-danger btn" style="margin: 10px;">
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-6 ">
				<div style="background-color:  #AACACD; color: white; padding: 25px; border-radius: 15px;"  >
					<form action="add_event" method="post">
						<div class="form-group">
							<label >Add Event:</label>
							<br>
							<input type="text" name="title" placeholder="the title" class='form-control' style="width: 200px;"><br>
							<textarea style="width: 75%; height: 200px;" name="event" placeholder="the event" class='form-control'></textarea><br>
							<input type="text" name="location" placeholder="the location" class='form-control' style="width: 200px;"><br>
							<input type="date" name="date" class='form-control'  style="width: 200px;"><br>
							<div class="input-group">
								<input type="text" name="price" min="0" class='form-control' placeholder='the price' style="width: 200px;"><br>
							</div>
							<input type="submit" value="submit" value="0" class="btn-info btn" style="margin: 10px;">
							<input type="reset" value="reset" class="btn-default btn" style="margin: 10px;">
						</div>
					</form>
				</div>
			</div>					
			</div>      
		</div>
	</div>	
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</body>