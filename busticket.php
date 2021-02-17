<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>TMS | Tourism Management System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" type="text/css" href="js/owl.carousel.min.css">
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="css/font-awesome.css" rel="stylesheet">
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
		 // owl-carousel start
$(document).ready(function() {
        $('.home-silder-outer').owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            responsiveClass: true,
            responsive: {
              0: {
                items: 1,
                nav: true
              },
              600: {
                items: 1,
                nav: true
              },
              1000: {
                items: 1,
                nav: true,
                loop: true,
                margin: 0
              }
            },
            autoplay: true,
            smartSpeed:1000,
            navText: ['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>']
        });
    });
	</script>
<!--//end-animate-->
</head>
<body>
<?php include('includes/header.php');?>
<!-- home slider section start -->



<!--routes-->

                   <section class="mb-10">
                   	<div class="holiday">
                   		
                   		  	      
                   		  	      <div class="container"> <!--container-->
                   		  	      	    <div class="row bus-ticket-section-inner">
                   		  	      	    	<div class="col-md-10 m-auto padd-5">
                   		  	      	    		<div class="row g-0">
												    <div class="col-md-5">
												      <img src="images/10.jpg" class="img-fluid" alt="..." height="300px">
												    </div>
												    <div class="col-md-7 text-center item-center">
												        <div class="card-body">
												        <h5 class="card-title h1 card-text-1 mb-1">Buy bus tickets in easy steps</h5>
												        <form action="bus-route-list.php" method="get">
                                                        <div class="row item-center-1">
												        <!--selection -->
 														<div class="col-md-4">
 															
 															<h4 class="mb-6">Leaving From:*</h4>
 															<select class="form-control" id="exampleFormControlSelect1" name="route1" id="packagetype">

															<?php 
															$query="SELECT distinct`busfrom` FROM `tblbusroute`";
																	$result=$conn->query($query);
																	$fetch=$result->fetch_array();  

															       do {
															          ?>
															<option value="<?php echo $fetch[0] ;?>"><?php echo $fetch[0]; ?></option>
															<?php } while ($fetch=mysqli_fetch_row($result)) ?>
														</select> 
 														</div>
 														<!--selection end -->

 														<!--selection -->
 														<div class="col-md-4">

 															<h4 class="mb-6">Going To:*</h4>
 															<select class="form-control" id="exampleFormControlSelect1" name="route2" id="packagetype">

															<?php 
															$query="SELECT distinct`busto` FROM `tblbusroute`";
																	$result=$conn->query($query);
																	$fetch=$result->fetch_array();  

															       do {
															          ?>
															<option value="<?php echo $fetch[0] ;?>"><?php echo $fetch[0]; ?></option>
															<?php } while ($fetch=mysqli_fetch_row($result)) ?>
														</select> 
 														</div>
 														<!--selection end -->

 														<!--date input-->

 														<div class="col-md-4 ">
 															<h4 class="mb-7">Departing On:*</h4>
 															<input type="date" name="ddate" class="form-control">
 														</div> 
                                                        
                                                        

 													</div>  

                                                     <div class="row item-center-1">
 													<div class="col-md-5 mt-5">
                                                        	<input style="width: 100px; background: #34ad00;" class="btn btn-info package-view-btn" type="submit" name="route">
                                                        </div></div></form>
                                                      
 													

 														<?php 
 															/*
 														if(isset($_POST['route'])){

 														       $from = $_POST['route1'] ;
 														       $to = $_POST['route2'];
 														       $date = $_POST['date'];

 														       header('location:bus-route-list.php');
 														   }*/

 														?>
 														<!--date input-->

 														<div class="clearfix"></div>

												     

												          
													</div>
												</div>
												      
												    </div>
												  </div>
                   		  	      	    	</div>

                   		  	      	    </div><!--row-->
                   		  	      </div> <!--container-->
                   	</div>
                 
                   </section>
<!--- routes ---->

<div class="clearfix"></div>

<?php include('includes/footer.php');?>
<!-- signup -->
<?php include('includes/signup.php');?>			
<!-- //signu -->
<!-- signin -->
<?php include('includes/signin.php');?>			
<!-- //signin -->
<!-- write us -->
<?php include('includes/write-us.php');?>			
<!-- //write us -->
</body>
</html>