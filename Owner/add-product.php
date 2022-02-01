<?php
include('header.php');
?>
<?php
        if(!isset($_SESSION['username'])){
        header("location: login.php");
        ob_end_flush();
    }
?>
<h2 class="margin-bottom-15">Add Product</h2>
	<div class="container">
		<div class="col-md-12">			
			<form class="form-horizontal templatemo-create-account templatemo-container" role="form" action="includes/add.inc.php" method="POST">
				<div class="form-inner">
					<div class="form-group">
			          <div class="col-md-6">		          	
			            <label for="product_name" class="control-label">Product Name</label>
			            <input type="text" class="form-control" name="product_name" placeholder="">		            		            		            
			          </div>  
			          <div class="col-md-6">		          	
			            <label for="brand_name" class="control-label">Brand Name</label>
			            <input type="text" class="form-control" name="brand_name" placeholder="">		            		            		            
			          </div>             
			        </div>
			        <div class="form-group">
			          <div class="col-md-12">		          	
			            <label for="price" class="control-label">Price</label>
			            <input type="text" class="form-control" name="price" placeholder="">		            		            		            
			          </div>              
			        </div>			
			        
                    <div class="form-group">
                    
                    <div class="col-md-6">		          	
			            <label for="qty" class="control-label">Qty</label>
			            <input type="text" class="form-control" name="qty" placeholder="">		            		            		            
			          </div>              
			        </div>
			        <div class="form-group">
			          <div class="col-md-6">
			            <label for="product_description" class="control-label">Product Description</label>
			            <input type="product_description" class="form-control" name="product_description" placeholder="">
			          </div>
			          
			        </div>
			        <div class="form-group">
			          <div class="col-md-12">
			            <input type="submit" name="submit" value="Add Product" class="btn btn-info">
			            <!--<a href="login.php" class="pull-right">Login</a>-->
			          </div>
                      <?php
                        if(isset($_POST["error"])){
                            if($_POST["error"] == "emptyinput"){
                                echo "<p> Please complete all the fields !</p>";
                            }
                           
                            elseif($_POST["error"] == "noerror"){
                                echo "<p> Registration successful !</p>";
                            }

                        }
                        ?>
			        </div>
                   	
				</div>				    	
		      </form>		      
		</div>
	</div>
<?php
    include('footer.php');
?>
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
      $(function() {
        $("#expire_date").datepicker();
      });
    </script>