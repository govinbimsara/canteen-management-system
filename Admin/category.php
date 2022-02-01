<?php
include('header.php');
?>

<div class="main content">
  <div class="wrapper">
    <h1>Add category</h1>

    

    <br></br>
    <?php 
      if(isset($_SESSION['add'])){
        echo $_SESSION['add'];
        unset($_SESSION['add']);
      }

    ?>

    <br></br>

<!--Addd category form starts-->
<form action="" method="POST">
  <div class="form-group">
    <table class="tbl-30">
      <tr>
        <td>Name:</td>
        <td>
          
          <input type="text" name="name">
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <input type ="submit" name="submit" value="ADD NEW CATEGORY" class="btn-secondary"> 
        </td>
      </tr>
    </table>
  </div>
  
</form>


             <!-- table container -->
            <!--<button class="btn btn-primary btn-block text-uppercase mb-3">
              Add new category
            </button>-->
 <br></br>   
 <?php
   if(isset($_POST['submit']))
   {
     //echo "clicked";
     $name = $_POST['name'];

     $sql="INSERT INTO categories SET name=  '$name' ";
     $res=mysqli_query($conn,$sql);

     if(res==true){
        $_SESSION['add']="<div class='success'>category added successfully.</div>";
        header ('location:'.SITEURL.'admin/');
     }else{
      $_SESSION['add']="<div class='error'>failed to add category .</div>";
      header ('location:'.SITEURL.'admin/');

     }

   }
 ?> 
  </div>
</div>           
<?php
include('scripts.php');
include('footer.php');
?>