<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Agriculture Equipment Rental Management Sysytem || Single Product Details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body class="goto-here">
	<?php include_once('includes/header.php');?>

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span class="mr-2"><a href="index.php">Product</a></span> <span>Product Single</span></p>
            <h1 class="mb-0 bread">Product Single</h1>
          </div>
        </div>
      </div>
    </div>
<?php
 $vid=$_GET['viewid'];
$ret=mysqli_query($con,"select tblproduct.ID as pid,tblproduct.CategoryID,tblproduct.SubcategoryID,tblproduct.ProductName,tblproduct.ModelNumber,tblproduct.PowerSource,tblproduct.RentPrice,tblproduct.ProductSpecifications, tblproduct.ProductDescription,tblproduct.Image,tblproduct.Image1,tblproduct.Image2,tblproduct.Image3,tblproduct.Image4,tblproduct.Image5,tblcategory.ID, tblcategory.CategoryName,tblsubcategory.CategoryID,tblsubcategory.SubcategoryName from  tblproduct join tblcategory on tblcategory.ID=tblproduct.CategoryID join tblsubcategory on tblsubcategory.ID = tblproduct.SubcategoryID where tblproduct.ID='$vid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<img src="admin/images/<?php echo $row['Image'];?>" class="img-fluid" width="500" height="300">

    				     <img src="admin/images/<?php echo $row['Image1'];?>" alt="" width="200" height="200">
                                        <img src="admin/images/<?php echo $row['Image2'];?>" alt="" width="200" height="200">
                                        <img src="admin/images/<?php echo $row['Image3'];?>" alt="" width="200" height="200">
                                        <img src="admin/images/<?php echo $row['Image4'];?>" alt="" width="200" height="200">

    			
    			
    			</div>


    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3><?php echo $row['ProductName'];?> </h3>
    				<div class="rating d-flex">
							<p>
								<?php echo $row['CategoryName'];?>
								
							</p> <strong style="padding-left: 10px;padding-right: 10px;">></strong> 
							<p>
								<?php echo $row['SubcategoryName'];?>
							</p>
						
						</div>
    				<p class="price"><span> Rent Price: $<?php echo $row['RentPrice'];?>/day</span></p>
    				<p>Model Number : <?php echo $row['ModelNumber'];?>
						</p>
						<p>Power Source: <?php echo $row['PowerSource'];?>.
						</p>

    				<p><?php echo $row['ProductDescription'];?>.
						</p>
							<p><strong>Specifications: </strong><?php echo $row['ProductSpecifications'];?></p>
    			
          	<p>
 <?php if($_SESSION['uid']==""){?>
<button type="submit" name="submit" ><a href="login.php" class="btn btn-black py-3 px-5">Book Now</a></button>
<?php } else {?>


                                            <a href="book-products.php?bookid=<?php echo $row['pid'];?>" class="btn btn-black py-3 px-5">Book Now</a>

                                         <?php }?>
          	</p>
    			</div>
    		</div>
    	</div>
    </section>

 <?php } ?>     

	 <?php include_once('includes/footer.php');?>
  

  


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>
    
  </body>
</html>