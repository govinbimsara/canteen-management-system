<!DOCTYPE html>
<head>

	<title>Create Account</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet" type="text/css">
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	<link href="css/templatemo_style.css" rel="stylesheet" type="text/css">	
    <style>
        p {
            font-family: 'Open Sans', sans-serif;
            font-size: 20px;
            color: #09F;
            text-align: center;
            }
    </style>
</head>
<body class="templatemo-bg-gray">
	<h1 class="margin-bottom-15">Create Account</h1>
	<div class="container">
		<div class="col-md-12">			
			<form class="form-horizontal templatemo-create-account templatemo-container" role="form" action="includes/signup.inc.php" method="POST">
				<div class="form-inner">
					<div class="form-group">
			          <div class="col-md-6">		          	
			            <label for="first_name" class="control-label">First Name</label>
			            <input type="text" class="form-control" name="first_name" placeholder="">		            		            		            
			          </div>  
			          <div class="col-md-6">		          	
			            <label for="last_name" class="control-label">Last Name</label>
			            <input type="text" class="form-control" name="last_name" placeholder="">		            		            		            
			          </div>             
			        </div>
			        <div class="form-group">
			          <div class="col-md-12">		          	
			            <label for="username" class="control-label">Email</label>
			            <input type="email" class="form-control" name="email" placeholder="">		            		            		            
			          </div>              
			        </div>			
			        <div class="form-group">
			          <div class="col-md-6">		          	
			            <label for="username" class="control-label">Username</label>
			            <input type="text" class="form-control" name="username" placeholder="">		            		            		            
			          </div>
			          <div class="col-md-6">		          	
			            <label for="mobile" class="control-label">Mobile number</label>
			            <input type="number" class="form-control" name="mobile" placeholder="">		            		            		            
			          </div>
			        </div>
                    <div class="form-group">
                    <div class="col-md-6">		          	
			            <label for="nic" class="control-label">National ID</label>
			            <input type="text" class="form-control" name="nic" placeholder="">		            		            		            
			          </div> 
                    <div class="col-md-6">		          	
			            <label for="staffstudent" class="control-label">Staff or student</label>
			            <input type="text" class="form-control" name="staffstudent" placeholder="">		            		            		            
			          </div>              
			        </div>
			        <div class="form-group">
			          <div class="col-md-6">
			            <label for="password" class="control-label">Password</label>
			            <input type="password" class="form-control" name="password" placeholder="">
			          </div>
			          <div class="col-md-6">
			            <label for="password" class="control-label">Confirm Password</label>
			            <input type="password" class="form-control" name="password_confirm" placeholder="">
			          </div>
			        </div>
			        <div class="form-group">
			          <div class="col-md-12">
			            <input type="submit" name="submit" value="Create account" class="btn btn-info">
			            <a href="login.php" class="pull-right">Login</a>
			          </div>
                      <?php
                        if(isset($_GET["error"])){
                            if($_GET["error"] == "emptyinput"){
                                echo "<p> Please complete all the fields !</p>";
                            }
                            if($_GET["error"] == "invalidusername"){
                                echo "<p> Choose a proper username !</p>";
                            }
                            if($_GET["error"] == "invalidemail"){
                                echo "<p> Choose a proper email address !</p>";
                            }
                            elseif($_GET["error"] == "passworddontmatch"){
                                echo "<p> Passwords do not match !</p>";
                            }
                            elseif($_GET["error"] == "usernametaken"){
                                echo "<p> Username or mobile number already in use !</p>";
                            }
                            elseif($_GET["error"] == "stmtfailed"){
                                echo "<p> Something went wrong try again !</p>";
                            }
                            elseif($_GET["error"] == "noerror"){
                                echo "<p> Registration successful !</p>";
                            }

                        }
                        ?>
			        </div>
                   	
				</div>				    	
		      </form>		      
		</div>
	</div>

	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>