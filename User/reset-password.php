<!DOCTYPE html>
<head>

	<title>Reset password</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet" type="text/css">
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	<link href="css/templatemo_style.css" rel="stylesheet" type="text/css">	
</head>
<body class="templatemo-bg-gray">
<?php

?>
	<div class="container">
		<div class="col-md-12">
			<h1 class="margin-bottom-15">Password reset</h1>
			<form class="form-horizontal templatemo-container templatemo-login-form-1 margin-bottom-30" role="form" action="includes/reset-request.inc.php" method="POST">				
		        <div class="form-group">
		          <div class="col-xs-12">
					<div class="control-wrapper">
				  		<p>An e-mail will be sent to you with instructions on how to reset your password</p>
					</div>		            
		            <div class="control-wrapper">
		            	<input type="text" class="form-control" name="email" placeholder="E-mail used to register">
		            </div>		            	            
		          </div>              
		        </div>
		        <div class="form-group">
		          <div class="col-md-12">
		          	<div class="control-wrapper">
		          		<input type="submit" name="reset-request-submit" value="Receive new password by E-mail" class="btn btn-info">
		          	</div>
		          </div>
		        </div>
				
				
		      </form>
			  <div class="text-center">
			  <?php
                        if(isset($_GET["reset"])){
            
                            if($_GET["reset"] == "success"){
                                echo "<p> Check your E-mail, please check spam if it doesn't appear in your inbox</p>";
                            }
                        }
                ?>
					</div>
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