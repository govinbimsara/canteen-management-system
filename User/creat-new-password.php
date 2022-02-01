<!DOCTYPE html>
<head>

	<title>Create New Password</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet" type="text/css">
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	<!-- <link href="css/templatemo_style.css" rel="stylesheet" type="text/css">	 -->
</head>
<body class="templatemo-bg-gray">
<?php
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
?>
	<div class="container">
		<div class="col-md-12">
			<h1 class="margin-bottom-15">Create New Password</h1>
            <?php

                $selector = $_GET["selector"];
                $validator = $_GET["validator"];

                if(empty($selector) || empty($validator)){
                    echo 'Could not validate request!';
                }else{
                    if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false){
                        ?>

                        <form action="includes/reset-password.inc.php" method="post">
                            <input type="hidden" name="selector" value="<?php echo $selector;?>">
                            <input type="hidden" name="validator" value="<?php echo $validator;?>">
                            <input type="password" name="pwd" placeholder="Enter a new password...">
                            <input type="password" name="pwd-repeat" placeholder="Repeat a new password...">
                            <button type="submit" name="reset-password-submit">Reset password</button>
                        </form>

                        <?php
                    }
                }

            ?>
		</div>
	</div>
</body>
</html>