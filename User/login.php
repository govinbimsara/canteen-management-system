<!DOCTYPE html>
<head>

	<title>Login One</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet" type="text/css">
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	<link href="css/templatemo_style.css" rel="stylesheet" type="text/css">	
	<style>
        p {
            font-family: 'Open Sans', sans-serif;
            font-size: 15px;
            color: #09F;
            text-align: center;
            }
    </style>
</head>
<body class="templatemo-bg-gray">
	<div class="container">
		<div class="col-md-12">
			<h1 class="margin-bottom-15">Login</h1>
			<form class="form-horizontal templatemo-container templatemo-login-form-1 margin-bottom-30" role="form" action="includes/login.inc.php" method="POST">				
		        <div class="form-group">
		          <div class="col-xs-12">		            
		            <div class="control-wrapper">
		            	<label for="username" class="control-label fa-label"><i class="fa fa-user fa-medium"></i></label>
		            	<input type="text" class="form-control" name="username" placeholder="Username/moble no.">
		            </div>		            	            
		          </div>              
		        </div>
		        <div class="form-group">
		          <div class="col-md-12">
		          	<div class="control-wrapper">
		            	<label for="password" class="control-label fa-label"><i class="fa fa-lock fa-medium"></i></label>
		            	<input type="password" class="form-control" name="password" placeholder="Password">
		            </div>
		          </div>
		        </div>
		        <div class="form-group">
		          <div class="col-md-12">
		          	<div class="control-wrapper">
		          		<input type="submit" name="submit" value="Log in" class="btn btn-info">
		          		<a href="reset-password.php" class="text-right pull-right">Forgot password?</a>
		          	</div>
		          </div>
		        </div>
				<?php
                        if(isset($_GET["error"])){
            
                            if($_GET["error"] == "emptyinput"){
                                echo "<p> Fill in all the fields !</p>";
                            }
                            if($_GET["error"] == "wrongcredentials"){
                                echo "<p> Incorrect username or password !</p>";
                            }
                            elseif($_GET["error"] == "wrongpassword"){
                                echo "<p> Incorrect password !</p>";
                            }
                        }
						if(isset($_GET["newpwd"])){
            
                            if($_GET["newpwd"] == "passwordupdated"){
                                echo "<p> Password has been reset !</p>";
                            }
						}
                	?>
		      </form>
		      <div class="text-center">
		      	<a href="creat-account.php" class="templatemo-create-new">Create new account <i class="fa fa-arrow-circle-o-right"></i></a>	
		      </div>
              <div class="text-center">
		      	<a href="index.php" class="templatemo-create-new">Go back to home page <i class="fa fa-arrow-circle-o-right"></i></a>	
		      </div>
		</div>
	</div>
</body>
</html>