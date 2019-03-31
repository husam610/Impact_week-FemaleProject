<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="/assets/css/style1.css">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-fixed-top sticky" id="navbar">
    <div class="nav-container">
            <div class="navbar-header">
                <a href="#" class="navbar-brand" ><img src="/assets/logos/Logo_White.png" alt="logo" id="logo"></a>
                <button class="navbar-toggle" data-toggle ="collapse" data-target =".navHeaderCollapse">
                    <span class="glyphicon glyphicon-menu-hamburger" style="color:white; font-size:35px;"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse navHeaderCollapse">
                <ul class="nav navbar-nav navbar-right">  
                    <li><a href="homepage">Home</a></li>
                    <li><a href="all_events">Events</a></li>
                    <li><a href="all_posts">Forum</a></li>
                    <li><a href="contact">Contact</a></li> 
                </ul>
            </div>
    </div>    
    </nav> 
    <div class="main-container">
    <div class="row">
    <div class="col-md-6" id="parag">
        <h1>WE EMPOWER WOMEN IN BUSINESS</h1> 
        <h1>ACCELERATING YOUR CAREER</h1>
    </div>
    <div class="col-md-6">
        <!-- ----------  Login form ----------------->
        <div class="log-container">
                <form action="login" method="post" class="form-inline">
                	<div>
                	<?php echo $this->session->userdata('error_email_log'); ?>
                	<?php echo $this->session->userdata('error_pass_log'); ?>
                	</div>
                    <div class="form-group">
                        
                        <input type="text" name="email_log" placeholder="email" value="<?php echo set_value('email_log'); ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        
                        <input type="password" name="password_log" placeholder="password" class="form-control">
                    </div>
                    <input type="submit" value="Login" class="btn btn-info">
                </form>
        </div>
        <br>
        <h3><?= $this->session->userdata('welcome'); ?></h3>
        <!-- ----------  Registration form ----------------->
        <div class="">
            <div class="reg-container">
                <h4>Join Us!</h4>
                <form action="registration" method="post">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <?php echo form_error('first_name'); ?>
                            <input type="text" name="first_name" placeholder="First name" value="<?php echo set_value('first_name'); ?>" class="form-control">
                        </div>
                        <div class="col-md-6">   
                            <?php echo form_error('last_name'); ?>
                            <input type="text" name="last_name" placeholder="Last name" value="<?php echo set_value('last_name'); ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">    
                        <?php echo form_error('email'); ?>
                        <input type="text" name="email" placeholder="email" value="<?php echo set_value('email'); ?>" class="form-control">
                    </div>   
                    <div class="form-group">   
                        <?php echo form_error('password'); ?>
                        <input type="password" name="password" placeholder="password" class="form-control">
                    </div>  
                    <div class="form-group">  
                        <?php echo form_error('confirm_password'); ?>
                        <input type="password" name="confirm_password" placeholder="confirm pass" class="form-control">
                    </div> 
                        <input type="submit" value="Register" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>   
    </div>
    <footer>
        <div class="row">
            <div class="col-12 col-md-3">
                <h5>CONTACT</h5>
                <hr>
                <a href="#">team@femaleventures.nl</a>
            </div>
            <div class="col-12 col-md-3">
                <h5>FOLLOW US</h5>
                <hr>
                <p><a href="#">Link us on Linkedin</a></p>  
                <p><a href="#">Like us on Facebook</a></p>
                <p><a href="#">Follow us on Twitter</a></p>
            </div>
            <div class="col-12 col-md-3">
                <h5>SUBSCRIBE TO OUR NEWSLETTER</h5>
                <hr>
                <form class="form-group">
                <p>Email *</p>
                <p><input type="text" class="form-control"></p>
                <p><input type="submit" value="Subscribe!" class="btn btn-primary"></p>
                </form>
            </div>
            <div class="col-12 col-md-3">
                <h5>INFORMATION</h5>
                <hr>
                <p><a href="#">Terms and Conditions</a></p>
                <p><a href="#">Privacy</a></p>
            </div>
        </div>
    </footer>
</body>
</html>