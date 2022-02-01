<?php
include('header.php');
?>

<?php
        if(!isset($_SESSION['username'])){
        header("location: login.php");
        ob_end_flush();
    }
?>

<?php
    include_once "includes/dbh.inc.php";
?>
    <div class="container mt-5">
      <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-xl-4 tm-block-col">
		  <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
           
            <!-- table container -->
            <button class="btn btn-primary btn-block text-uppercase mb-3">
              BREAKFAST
            </button>
			
			<table class="table tm-table-small tm-product-table">
                <tbody>
                  <tr>
                    <td class="tm-product-name">Rice and Curry</td>
                    <td class="text-center">
                    
                    </td>
                  </tr>
                  <tr>
                    <td class="tm-product-name">String Hoppers</td>
                    <td class="text-center">
                    
                    </td>
                  </tr>
				  <tr>
                    <td class="tm-product-name">Bread</td>
                    <td class="text-center">
                    
                    </td>
                  </tr>
				   <tr>
                    <td class="tm-product-name">All</td>
                    <td class="text-center">
                    
                    </td>
                  </tr>
				  
                </tbody>
              </table>
			
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-block-col">
		  <div class="tm-bg-primary-dark tm-block tm-block-product-categories">

            <!-- table container -->
            <button class="btn btn-primary btn-block text-uppercase mb-3">
              LUNCH
            </button>
			
			<table class="table tm-table-small tm-product-table">
                <tbody>
                  <tr>
                    <td class="tm-product-name">Rice and Curry</td>
                    <td class="text-center">
                    
                    </td>
                  </tr>
                  <tr>
                    <td class="tm-product-name">String Hoppers</td>
                    <td class="text-center">
                    
                    </td>
                  </tr>
				  <tr>
                    <td class="tm-product-name">Bread</td>
                    <td class="text-center">
                    
                    </td>
                  </tr>
				  <tr>
                    <td class="tm-product-name">All</td>
                    <td class="text-center">
                    
                    </td>
                  </tr>
                </tbody>
              </table>
			
          </div>
        </div>
		
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-product-categories">

            <!-- table container -->
            <a href="chart.other.php">
            <button class="btn btn-primary btn-block text-uppercase mb-3">
              INVENTORY
            </button>
            </a>
			
			<table class="table tm-table-small tm-product-table">
                <tbody>
                  <tr>
					<td class="tm-product-name">Bread</td>
                    <td class="text-center">
					<td class="tm-product-name"><a href="Bun_quentity/chart.php"> Quentity</td>
                    <td class="tm-product-name"></a><a href="Bun_sales/chart.php"> Sales</a></td>
                  </tr>
                  <tr>
					<td class="tm-product-name">Rice</td>
                    <td class="text-center">
					<td class="tm-product-name"><a href="Rice_quentity/chart.php"> Quentity</td>
                    <td class="tm-product-name"></a><a href="Rice_sales/chart.php"> Sales</a></td>
                  </tr>
				  <tr>
					<td class="tm-product-name">Milk</td>
                    <td class="text-center">
					<td class="tm-product-name"><a href="Milk_quentity/chart.php"> Quentity</td>
                    <td class="tm-product-name"></a><a href="Milk_sales/chart.php"> Sales</a></td>
                  </tr>
				  <tr>
                    <td class="tm-product-name">String Hoppers</td>
                    <td class="text-center">
					<td class="tm-product-name"><a href="StringHoppers_quentity/chart.php"> Quentity</td>
                    <td class="tm-product-name"></a><a href="StringHoppers_sales/chart.php"> Sales</a></td>
                  </tr>
				   <tr>
                    <td class="tm-product-name">Noodles</td>
                    <td class="text-center">
					<td class="tm-product-name"><a href="Noodles_quentity/chart.php"> Quentity</td>
                    <td class="tm-product-name"></a><a href="Noodles_sales/chart.php"> Sales</a></td>
                  </tr>
				 
                  
				  
                </tbody>
              </table>
			  
			  
			  
			  
			  
			  
			  
			
          </div>
        </div>
		

		
      </div>


<?php
    include('footer.php');
?>

<script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/moment.min.js"></script>
    <!-- https://momentjs.com/ -->
    <script src="js/Chart.min.js"></script>
    <!-- http://www.chartjs.org/docs/latest/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script src="js/tooplate-scripts.js"></script>