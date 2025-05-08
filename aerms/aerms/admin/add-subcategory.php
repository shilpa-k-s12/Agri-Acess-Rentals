<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  }
  else{

if(isset($_POST['submit']))
  {
    $category=$_POST['category'];
$subcat=$_POST['subcategory'];
  
    $query=mysqli_query($con, "insert into tblsubcategory(CategoryID,SubcategoryName) value('$category','$subcat')");
    if ($query) {
echo "<script>alert('Agriculture equipment subcategory details has been submitted.');</script>";
echo "<script>window.location.href ='add-subcategory.php'</script>";
  }
  else
    {
     
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }

  

}
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Agriculture Equipment Rental Management Sysytem | Sub-Category</title>
   

    <!-- Style-sheets -->
    <!-- Bootstrap Css -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Bootstrap Css -->
    <!-- Common Css -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--// Common Css -->
    <!-- Nav Css -->
    <link rel="stylesheet" href="css/style4.css">
    <!--// Nav Css -->
    <!-- Fontawesome Css -->
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <!--// Fontawesome Css -->
    <!--// Style-sheets -->

    <!--web-fonts-->
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!--//web-fonts-->
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
       <?php include_once('includes/sidebar.php');?>

        <!-- Page Content Holder -->
        <div id="content">
            <!-- top-bar -->
       <?php include_once('includes/header.php');?>
            <!--// top-bar -->

            <!-- main-heading -->
            <h2 class="main-title-w3layouts mb-2 text-center">Sub-Category</h2>
            <!--// main-heading -->

            <!-- Forms content -->
            <section class="forms-section">

               
                <!-- Forms-3 -->
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Sub-Category</h4>

                    <form action="#" method="post" enctype="multipart/form-data">
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4" style="font-weight: bolder;padding-bottom: 20px;">Category Name</label>

                                
                                <select name="category" class="form-control" required>
<option value="">Select Category</option> 
<?php $query=mysqli_query($con,"select * from tblcategory");
while($row=mysqli_fetch_array($query))
{?>

<option value="<?php echo $row['ID'];?>"><?php echo $row['CategoryName'];?></option>
<?php } ?>
</select> 

                            </div>
                           
                        </div>
                   <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4" style="font-weight: bolder;padding-bottom: 20px;">Sub-Category Name</label>

                                
                                <input type="text" placeholder="Enter SubCategory Name"  name="subcategory" class="form-control" required>
                            </div>
                           
                        </div>     
                     
                        
                        <button type="submit" class="btn btn-primary" name="submit">Add</button>
                    </form>
                </div>
              
            </section>

            <!--// Forms content -->

           <?php include_once('includes/footer.php');?>

        </div>
    </div>


    <!-- Required common Js -->
    <script src='js/jquery-2.2.3.min.js'></script>
    <!-- //Required common Js -->

    <!-- Sidebar-nav Js -->
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <!--// Sidebar-nav Js -->

    <!-- Validation Script -->
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';

            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');

                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <!--// Validation Script -->

    <!-- dropdown nav -->
    <script>
        $(document).ready(function () {
            $(".dropdown").hover(
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>
    <!-- //dropdown nav -->

    <!-- Js for bootstrap working-->
    <script src="js/bootstrap.min.js"></script>
    <!-- //Js for bootstrap working -->
</body>
</html>
<?php }  ?>