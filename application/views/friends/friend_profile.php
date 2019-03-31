<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="assets/css/style6.css">
</head>
<body>
    <div class="container"> 
        <div class="fb-profile">
        <img class="fb-image-lg" src="/assets/logos/header.jpg" alt="Profile image example"/>
        <img class="fb-image-profile img-circle img-thumbnail" src="/assets/images/profile/default.jpg" alt="Profile image example"/>
        
        <div class="row">
            <div class="col-sm-3">
                <?php echo " <h1>  " . $profile['first_name'] ." " . $profile['last_name'] . "</h1>"; ?>
            <br>  
            <div class="panel panel-default">
                <div class="panel-heading" style="font-weight: bold">Linkedin Profile</div>
                <div class="panel-body" style="text-align: center; padding: 5px">
                <?php if($profile['linkedin'] != NULL) {
                            echo "<a href='" . $profile['linkedin'] ."'>" . $profile['linkedin'] ."
                            </a>";
                        }; ?>
                </div>
            </div>
            
            <ul class="list-group">
                <li class="list-group-item"><b>Activity</b></li>
                <li class="list-group-item text-right"><span class="pull-left">Friends</span> 125</li>
                <li class="list-group-item text-right"><span class="pull-left">Posts</span> 13</li>
                <li class="list-group-item text-right"><span class="pull-left">Likes</span> 37</li>
            </ul> 
                
    
            </div>
            <div class="col-sm-9">
                <a href='friend_profile' class="btn btn-info btn-sm" id="btn"><span class="glyphicon glyphicon-user"></span> Profile</a>
                <a href='show_friends' class="btn btn-info btn-sm" id="btn"><span class="glyphicon glyphicon-globe"></span> Friends</a>
                <div class="info-container">
                    <div class='row'>
                        <div class='col-md-6'>
                            <p><b>First Name</b></p>
                            <p><?php echo $profile['first_name']; ?></p>
                            <hr>
                        </div>
                        <div class='col-md-6'>
                            <p><b>Last Name</b></p>
                            <p><?php echo $profile['last_name']; ?></p>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                                <p><?php if($profile['mentor_mentee'] != NULL) {
                                if($profile['mentor_mentee'] == 0) {
                                    echo "
                                    <p><b>Role</b></p>
                                    <p>Mentor</p>
                                    <hr>";
                                } else {
                                    echo "
                                    <p><b>Role</b></p>
                                    <p>Mentee</p>
                                    <hr>";
                                }
                            }; ?></p>
                        </div>
                        <div class="col-12 col-md-6">
                            <p><?php if($profile['recruitment_no_yes'] != NULL) {
                            if($profile['recruitment_no_yes'] == 0) {
                                echo "
                                <p><b>Recruitment</b></p>
                                <p>Interested</p>
                                <hr>";
                            } else {
                                echo "
                                <p><b>Recruitment</b></p>
                                <p>Not interested</p>
                                <hr>";
                            }
                        }; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="row" id="info-container2">        
                    
    <?php
        if($profile['biography'] != NULL) {
            echo "<p><b>Biography</b></p>
                <p>" . $profile['biography'] ." </p>
                <hr>";
        }; 
                
        if($profile['city_name'] != NULL) {
            echo "<p><b>City</b></p>
                <p>" . $profile['city_name'] ."</p>
                <hr>";
        };
                            
                            
        if($profile['student_professional'] != NULL) {
            if($profile['student_professional'] == 0) {
                echo "
                <p><b>Student</b></p>
                <hr>";
            } else {
                echo "
                <p><b>Professional</b></p>
                <hr>";
            }
        };
            
        if($profile['work_place'] != NULL) {
            if($profile['student_professional'] == 0) {
                echo "<p><b>University</b></p>
                    <p>" . $profile['work_place'] ."</p>
                    <hr>";
            } else {
                echo "<p><b>Company</b></p>
                    <p>" . $profile['work_place'] ."</p>
                    <hr>";
            }
        };
                            
        if($profile['expertise'] != NULL) {
            echo "<p><b>Expertise</b></p>
                <p>" . $profile['expertise'] ."</p>
                <hr>";
        };
                            
        if($profile['experience'] != NULL) {
            echo "<p><b>Experience</b></p>
            <p>" . $profile['experience'] ."</p>
            <hr>";
        };
                            
        if($profile['industry'] != NULL) {
            echo "<p><b>Industry</b></p>
                <p>" . $profile['industry'] ."</p>
                <hr>";
        };
                            
        if($profile['support_for'] != NULL) {
            echo "<p><b>What kind of support are you looking for?</b></p>
                <p>" . $profile['support_for'] ."</p>
                <hr>";
        };
        if($profile['support'] != NULL) {
            echo "<p><b>What kind of support can you give?</b></p>
                <p>" . $profile['support'] ."</p>
                <hr>";
        }; ?>
    </div>
    </div>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</body>
</html>