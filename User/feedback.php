<?php
    include('header.php');
?>
<?php
    include_once "includes/dbh.inc.php";
    include_once "includes/functions.inc.php";
?>
<?php
    if(!isset($_SESSION['username'])){
        header("location: index.php");
        exit();
    }
?>

    <!-- Page Content -->

    <div class="banner header-text">
      <div class="owl-banner owl-carousel">

       	 <div class="banner-item-02">
          		<div class="text-content">
           				 <h2>Give us your feedback</h2>
           				 <h4><?php
              echo $_SESSION["username"];
              ?></h4>
         		 </div>
       	 </div>

      </div>
    </div>
   
<!-- <?php
echo "<pre>";
print_r($_POST);
echo "</pre>";
?> -->
    <div class="send-message">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Give us a Message</h2>
            </div>
          </div>
          <div class="col-md-8">
            <div class="contact-form">
              <form id="contact" action="includes/feedback.inc.php" method="POST">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                        <select name="topic" class="form-select" aria-label="Default select example">
                            <option selected>Select topic</option>
                            <option value="About food">About food</option>
                            <option value="About service">About service</option>
                            <option value="About hygiene">About hygiene</option>
                            <option value="Compliant">Compliant</option>
                            <option value="Other">Other</option>
                        </select>
                    </fieldset>
                  </div>
                  <div>
                </div>
                <div class="col-lg-12">
                    <fieldset>
                      <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message" required=""></textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                        <button type="submit" name="submit" id="form-submit" class="filled-button">Send Message</button>
                    </fieldset>
                  </div>
                  <div>
                      <input type="hidden" name="uname" id="uname" value="<?php echo $_SESSION['username'] ?>">
                  </div>
                </div>
                <?php
                        if(isset($_GET["error"])){
            
                            if($_GET["error"] == "noerror"){
                                echo "<p> We got your feedback. Thank you !</p>";
                            }

                        }
                	?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


    <?php
    include('footer.php');
?>
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Additional Scripts -->
<script src="assets/js/custom.js"></script>
<script src="assets/js/owl.js"></script>
<script src="assets/js/slick.js"></script>
<script src="assets/js/isotope.js"></script>
<script src="assets/js/accordions.js"></script>