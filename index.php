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
<section class="home-silder-section pt-85">
	<div class="home-silder-outer owl-carousel">
		<div class="home-silder-inner">
			<div class="silder-content">
				<h1 class="title">
					We are  
					<span>trusted</span>
					by many customers
				</h1>
				<p>
					Excellent and quality service meeting customers need, Instant worldwide hotel booking with lowest ,Reliable visa assistance with extra care, We believe in friendly support and long lasting relationships.
				</p>
				<a class="silder-content-btn" href="#">BOOK NOW</a>
			</div>
			<div class="image1">
				
			</div>
		</div>
		<div class="home-silder-inner">
			<div class="silder-content">
				<h1 class="title">
					We are  
					<span>trusted</span>
					by many customers
				</h1>
				<p>
					Excellent and quality service meeting customers need, Instant worldwide hotel booking with lowest ,Reliable visa assistance with extra care, We believe in friendly support and long lasting relationships.
				</p>
				<a class="silder-content-btn" href="#">BOOK NOW</a>
			</div>
			<div class="image2">
				
			</div>
		</div>
		<div class="home-silder-inner">
			<div class="silder-content">
				<h1 class="title">
					We are  
					<span>trusted</span>
					by many customers
				</h1>
				<p>
					Excellent and quality service meeting customers need, Instant worldwide hotel booking with lowest ,Reliable visa assistance with extra care, We believe in friendly support and long lasting relationships.
				</p>
				<a class="silder-content-btn" href="#">BOOK NOW</a>
			</div>
			<div class="image3">
				
			</div>
		</div>
	</div>
</section>
		<!-- Home slider section End -->



<!--- rupes ---->
<!-- <div class="container">
	<div class="rupes">
		<div class="col-md-4 rupes-left wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
			<div class="rup-left">
				<a href="offers.html"><i class="fa fa-usd"></i></a>
			</div>
			<div class="rup-rgt">
				<h3>UP TO USD. 50 OFF</h3>
				<h4><a href="offers.html">TRAVEL SMART</a></h4>
				
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="col-md-4 rupes-left wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
			<div class="rup-left">
				<a href="offers.html"><i class="fa fa-h-square"></i></a>
			</div>
			<div class="rup-rgt">
				<h3>UP TO 70% OFF</h3>
				<h4><a href="offers.html">ON HOTELS ACROSS WORLD</a></h4>
				
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="col-md-4 rupes-left wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
			<div class="rup-left">
				<a href="offers.html"><i class="fa fa-mobile"></i></a>
			</div>
			<div class="rup-rgt">
				<h3>FLAT USD. 50 OFF</h3>
				<h4><a href="offers.html">US APP OFFER</a></h4>
			
			</div>
				<div class="clearfix"></div>
		</div>
	
	</div>
</div> -->
<!--- /rupes ---->




<!---holiday---->
<div class="container">
	<div class="holiday">
	



	
	<h3 class="holiday-title">Package List</h3>

					


			



<!--Section Start -->
<section class="package-section">
	<div class="container">
		<div class="row package-items-wrapper justify-content-center">

<?php $sql = "SELECT * from tbltourpackages order by rand() limit 3";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>		

			<div class="col-lg-4 col-md-12 package-item text-center shadow-lg ">
				<div class="item-image ">
					<img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage);?>" class="img-responsive mx-auto" style="height: 200px;">
					<a href="#" class="item-price"><?php echo htmlentities($result->PackagePrice);?>TK</a>
				</div>
				<div class="item-info">
					<a href="#">
						<a href="package-details.php?pkgid=<?php echo htmlentities($result->PackageId);?>"><h3 class="m-0"><?php echo htmlentities($result->PackageName);?></h3></a>

						
					</a>
					<p><?php echo htmlentities($result->PackageLocation);?></p>
					<div class="item-rating">
						<span>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<a href="#">(20 Review)</a>
						</span>
						<div class="days">
							<i class="fa fa-clock-o"></i>
							<a href="#">5 Days</a>
						</div>

					</div>
					<!--Div end -->
				</div>
			</div>



<?php }} ?>


		</div>
	</div>
</section>

<!--Section end-->
			
		
<div class="package-view-btn"><a href="package-list.php" class="view">View More Packages</a></div>
</div>
			<div class="clearfix"></div>
	</div>


<!--routes-->

                   <section>
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
<div class="routes">
	<div class="container">
		<div class="col-md-4 routes-left wow fadeInRight animated" data-wow-delay=".5s">
			<div class="rou-left">
				<a href="#"><i class="glyphicon glyphicon-list-alt"></i></a>
			</div>
			<div class="rou-rgt wow fadeInDown animated" data-wow-delay=".5s">
				<h3>80000</h3>
				<p>Enquiries</p>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="col-md-4 routes-left">
			<div class="rou-left">
				<a href="#"><i class="fa fa-user"></i></a>
			</div>
			<div class="rou-rgt">
				<h3>1900</h3>
				<p>Regestered users</p>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="col-md-4 routes-left wow fadeInRight animated" data-wow-delay=".5s">
			<div class="rou-left">
				<a href="#"><i class="fa fa-ticket"></i></a>
			</div>
			<div class="rou-rgt">
				<h3>7,00,00,000+</h3>
				<p>Booking</p>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

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