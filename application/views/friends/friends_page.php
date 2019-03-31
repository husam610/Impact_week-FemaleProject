
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="assets/css/style5.css">
</head>
<body>
    
    <div class="container">
        <div class="top">
            <h2>Members</h2>
        </div>
        <!---- SEARCH PANEL ---------->
        <div class="form-container">
        <form action='members_search' method='post'>
            <div class="form-group row">
                <div class="col-sm-6">
                    <input type='text' name='first_name' placeholder="First Name" class="form-control">
                </div>
                <div class="col-sm-6">   
                    <input type="text" name="last_name" placeholder="Last Name" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-5">
                    <label style="color:grey;">Industry</label>
                    <select style="width: 200px;" name='industry_id'>
                    <?php foreach ($industries as $row) {
                    echo
                    "<option value='" . $row['industry_id'] . "'>" .$row['industry'] . "</option>";
                    }; ?>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label style="color:grey;">City</label>
                    <select name='city_id'>
                    <?php foreach ($cities as $row) {
                    echo
                    "<option value='" . $row['city_id'] . "'>" .$row['city_name'] . "</option>";
                    }; ?>
                    </select>
                </div>
                <div class="col-sm-3">
                    
                    <label class="radio-inline"><input type='radio' name='mentor_mentee' value=0>Mentor</label>
                    
                    <label class="radio-inline"><input type='radio' name='mentor_mentee' value=1>Mentee</label>
                </div>
                <div class="col-sm-1">
                    <input type='submit' value='Search' class="btn btn-info btn-xs">
                </div>
            </div>
            
        </form>
        </div>
        <!---- END OF SEARCH PANEL ---------->

        <div class="row">
            <?php 
                foreach($users as $row) {

                echo
                "
                    <div class='col-12 col-md-4'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>
                                <img src='/assets/images/profile/default.jpg' class='img-responsive img-thumbnail img-circle' width='90px'>
                            </div>
                            <div class='panel-body'>
                                <p>" . $row['first_name'] . " " . $row['last_name'] . "</p>
                                
                            </div>
                            <div class='panel-footer'>";
                             
                                if ($row['user_id'] != $this->session->userdata('id')) {
                                echo
                                "<form action='friend_profile' method='post'>
                                    <input type='hidden' name='profile_id' value='" . $row['user_id'] . "'>
                                    <input type='submit' value='View profile' class='btn btn-default '> 
                                </form>
                                <br>
                                <form action='friend_request' method='post'>
                                    <input type='hidden' name='request_id' value='" . $row['user_id'] . "'>";
                                    $this->session->set_userdata('friend', 0);
                                    foreach($friends as $friend){
                                    	if ($friend['friend_id'] == $row['user_id']) {
                                    		echo 
                                    		"<input type='submit' value='Friend' class='btn btn-disabled' disabled> 
                                    		";
                                    		$this->session->set_userdata('friend', $this->session->userdata('friend') + 1);
                                    	}
                                    }
                                    foreach($requests_sent as $rs){
                                    	if ($rs['to_user'] == $row['user_id']) {
                                    		echo 
                                    		"<input type='submit' value='Request sent' class='btn btn-disabled' disabled> 
                                    		";
                                    		$this->session->set_userdata('friend', $this->session->userdata('friend') + 1);
                                    	}
                                    }
                                    foreach($requests_rec as $rr){
                                    	if ($rr['from_user'] == $row['user_id']) {
                                    		echo 
                                    		"<input type='submit' value='Request received' class='btn btn-disabled' disabled> 
                                    		";
                                    		$this->session->set_userdata('friend', $this->session->userdata('friend') + 1);
                                    	}
                                    }
                                    if ($this->session->userdata('friend') < 1) {
                                   echo "<input type='submit' value='Add Friend' class='btn btn-info'>";
                               }
                               echo
                                "</form>";
                            } else {
                            echo
                            "<form action='profile' method='post'>
                                    <input type='hidden' name='profile_id' value='" . $row['user_id'] . "'>
                                    <input type='submit' value='View profile' class='btn btn-default '> 
                                </form>
                                <br>
                                <form action='edit_profile' method='post'>
                                    <input type='hidden' name='profile_id' value='" . $row['user_id'] . "'>
                                    <input type='submit' value='Edit profile' class='btn btn-primary '> 
                                </form>
                                ";
                               	}
                            echo
                            "</div>
                        </div>
                    </div>
                ";
            
        		}
            ?>
        </div>
    </div>
</body>
</html>   








	