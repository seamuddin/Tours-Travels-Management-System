<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/config1.php');
if(strlen($_SESSION['login'])==0)
	{	
header('location:index.php');
}
else{ ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap link -->
	
	<!-- Fontawesome Link -->
	<link rel="stylesheet" type="text/css" href="./admin/css/style.css">
	<link rel="stylesheet" type="text/css" href="./admin/css/table-style.css">
	<link rel="stylesheet" type="text/css" href="assets/font/fontawesome/css/all.css">
	<!-- owl-cerousel css link -->
	<link rel="stylesheet" type="text/css" href="assets/plugins/owl-carousel/owl.carousel.min.css">
	<!-- Main css Link -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">


	<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Tourism Management System In PHP" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="css/font-awesome.css" rel="stylesheet">
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>

  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>
</head>
<body>

	<?php if($_SESSION['login'])
{?>
<div class="top-header">
	<div class="container">
		<ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".5s">
			<li class="hm"><a href="index.html"><i class="fa fa-home"></i></a></li>
			<li class="prnt"><a href="profile.php">My Profile</a></li>
				<li class="prnt"><a href="change-password.php">Change Password</a></li>
			
		</ul>
		<ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s"> 
			<li class="tol">Welcome :</li>				
			<li class="sig"><?php echo htmlentities($_SESSION['login']);?></li> 
			<li class="sigi"><a href="logout.php" >/ Logout</a></li>
        </ul>
		<div class="clearfix"></div>
	</div>
</div><?php } else {?>
<div class="top-header">
	<div class="container">
		<ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".5s">
			<li class="hm"><a href="index.php"><i class="fa fa-home"></i></a></li>
				<li class="hm"><a href="admin/index.php">Admin Login</a></li>
		</ul>
		<ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s"> 
			<li class="tol">Toll Number : 123-4568790</li>				
			<li class="sig"><a href="#" data-toggle="modal" data-target="#myModal" >Sign Up</a></li> 
			<li class="sigi"><a href="#" data-toggle="modal" data-target="#myModal4" >/ Sign In</a></li>
        </ul>
		<div class="clearfix"></div>
	</div>
</div>
<?php }?>

<div class="footer-btm wow fadeInLeft animated" data-wow-delay=".5s">
	<div class="container">
	<div class="navigation">
			<nav class="navbar d-flex flex-row navbar-default nav-design-1">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<nav class="cl-effect-1">
						<ul class="nav navbar-nav">
							<li><a style="border-bottom: 0px solid white; background: #3F84B1!important;" href="index.php">Home</a></li>
							<li><a style="border-bottom: 0px solid white; background: #3F84B1!important;" href="page.php?type=About us">About</a></li>
								<li>
				                    <a style="border-bottom: 0px solid white; background: #3F84B1!important;" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Packages Category</a>
								    <div class="dropdown-menu">


								     

								      <?php 
								      include('includes/config1.php');
									$query1="SELECT `packageid`, `packagecategory` FROM `tblpackagecategory`";
											$result1=$conn->query($query1);
											$fetch=$result1->fetch_array();  

									       do {
									          ?>
									           <a style="border-bottom: 0px solid white;" class="dropdown-item" href="package-list-by-category.php?pkgid=<?php echo $fetch[1];?>"><?php echo $fetch[1]; ?></a>
									<?php } while ($fetch=mysqli_fetch_row($result1)) ?>

								    </div>
								</li>

								<li><a style="border-bottom: 0px solid white; background: #3F84B1!important;" href="busticket.php">Bus Ticket</a></li>

								
								<li><a style="border-bottom: 0px solid white; background: #3F84B1!important;" href="page.php?type=Contact">Contact Us</a></li>
								<?php if($_SESSION['login'])
{?>
								<li> </li> 

								<li><a style="border-bottom: 0px solid white; background: #3F84B1!important;" href="" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Issues</a>

                                      <div class="dropdown-menu">

                                      	<a style="border-bottom: 0px solid white; background: #3F84B1!important;" class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal3">Report Issue  </a> 
                                      	<a style="border-bottom: 0px solid white;" class="dropdown-item" href="issuetickets.php">Existing Issues</a>

                                      </div>
								</li>

								<li><a style="border-bottom: 0px solid white; background: #3F84B1!important;" href="" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Booking History</a>

                                      <div class="dropdown-menu">

                                      	<a style="border-bottom: 0px solid white; background: #3F84B1!important;" class="dropdown-item" href="History.php">Package Booking</a>
                                      	<a style="border-bottom: 0px solid white; background: #3F84B1!important;" class="dropdown-item" href="bus-booking-history.php">Bus Ticket Booking</a>

                                      </div>
								</li>

								<?php } else { ?>
								<li><a style="border-bottom: 0px solid white; background: #3F84B1!important;" href="enquiry.php"> Enquiry </a>  </li>
								<?php } ?>
								<div class="clearfix"></div>

						</ul>
					</nav>
				</div><!-- /.navbar-collapse -->	
			</nav>
		</div>
		
		<div class="clearfix"></div>
	</div>
</div>




	<section class="payment-section bg-light">
		<h2 class="text-center text-success">
		  	  <?php

                      if(isset($_REQUEST['bktid']) && isset($_REQUEST['status']))
							 {
							 	$bktid=intval($_GET['bktid']);
							 	$status=intval($_GET['status']);

							 	if($status != is_null($status))
									{

										
                                        date_default_timezone_set("Asia/Dhaka");
                                        
										$date = date("Y-m-d");
										$sql18="UPDATE tblusrtktbook set `status`=$status , `paymentdate` = '$date'  where bookid='$bktid'";
									    $query18 = $dbh->prepare($sql18);
									    $query18->execute();
									    if($query18->rowCount() > 0){
												echo "Payment Successfully Done...........";
											}


									}
							 	
							 }
		  	   ?>
		  </h2>
			<div class="container">
				<div class="row" style="
				display: flex;
     			flex-wrap: wrap;
    			justify-content: center;
    			">
					<div class="col-lg-8 col-md-8 m-auto p-5 bg-light">
						<div class="payment-input-inner ">

							<div class="float-right mr-4" style="text-align: end; margin-right: 10px;">
						  	<button onclick="printDiv()"  class="btn btn-primary">Print</button>
						  </div>
							<div class="m-5" id="printableArea">
							


							    <?php 

if(isset($_REQUEST['bktid']))
	{
$bktid=intval($_GET['bktid']);

$sql = "SELECT * FROM (((tblusers INNER JOIN tblusrtktbook ON tblusers.id = tblusrtktbook.userid) INNER JOIN tblbus ON tblusrtktbook.busid = tblbus.busid) INNER JOIN tblbusroute ON tblbus.busroute = tblbusroute.brid) WHERE tblusrtktbook.bookid = '$bktid' LIMIT 1";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
	foreach($results as $result)
{	
      	

?>
                	 
                	 <p class="p-2 text-left ml-4" style="margin-left: 20px;">Booking No: #BK 

                	 	<?php 

                	 	$sql2 = "SELECT  SUM(tktbookid) as totalid, `busid`, `userid`, `seatnumber`, `tblseatid`, `status`, `bkdate`, `bookid` FROM `tblusrtktbook` where bookid='$bktid' GROUP BY bookid";
                	 	$result1 = $conn->query($sql2);
                	 	$row = $result1->fetch_assoc();
                	 	print $row['totalid'];
                	 	 

                	 	 ?>  


                	 </p>
                	 <h3  class="float-left m-4" style="margin-left: 20px;">Customer Details</h3>
						  <table style="border: 0px solid grey;" class="table tbl-margin bg-light">
						  	<tr class="bg-light">
						  		<td style=" text-align: left!important; width: 30%;padding: 10px!important; 
						  		padding-left: 30px!important;" 
						  		class="border-0 text-dark text-bold">

						  			User Name
                                        
                                      

						  		</td>

						  		<td style="padding: 10px!important;" class="border-0 text-dark text-bold">:</td>

						  		<td style="padding: 10px!important;" class="border-0 text-dark text-light">
						  			
                                      	<?php  print "  ".htmlentities($result->FullName); ?>
                                      

						  		</td>
						  		
						  	</tr>

						  	<tr class="bg-light">
						  		<td style=" text-align: left!important; width: 30%;padding: 10px!important; 
						  		padding-left: 30px!important;" class="border-0 text-dark text-bold">Mobile</td>

						  		<td style="padding: 10px!important;" class="border-0 text-dark text-bold" colspan="1">:</td>


						  		<td style="padding: 10px!important;" class="border-0 text-dark text-light">
						  			
                                      	<?php  print "  ".htmlentities($result->MobileNumber); ?></td>

						  		 
						  		
						  	</tr>

						  	<tr class="bg-light">
						  		<td style=" text-align: left!important; width: 30%;padding: 10px!important; 
						  		padding-left: 30px!important;" class="border-0 text-dark text-bold">Email</td>

						  		<td style="padding: 10px!important;" class="border-0 text-dark text-bold" colspan="1">:</td>

						  		<td style="padding: 10px!important;" class="border-0 text-dark text-light">
						  			
                                      	<?php  print "  ".htmlentities($result->EmailId); ?></td>
						  		
						  	</tr>
						  </table>



				    <h3 class="float-left m-4" style="margin-left: 20px;">Booking Details</h3>
						  <table class="table tbl-margin bg-light">
						  	<tr class="bg-light">
						  		<td 
						  		style=" 
						  		text-align: left!important; 
						  		width: 30%; padding: 10px!important; 
						  		padding-left: 30px!important;" 
						  		class="border-0 text-dark text-bold">
						  	Bus Name
						  </td>

						  <td style="padding: 10px!important;" class="border-0 text-dark text-bold" colspan="1">:</td>

						  <td style="padding: 10px!important;" class="border-0 text-dark text-light">
						  			
                                      	<?php  print "  ".htmlentities($result->busname); ?></td>

						  		
						  	</tr>

						  	<tr class="bg-light">
						  		<td style=" 
						  		text-align: left!important; 
						  		width: 30%; padding: 10px!important; 
						  		padding-left: 30px!important;" class="border-0 text-dark text-bold">Bus Number</td>

						  		 <td style="padding: 10px!important;" class="border-0 text-dark text-bold" colspan="1">:</td>

						  <td style="padding: 10px!important;" class="border-0 text-dark text-light">
						  			
                                      	<?php  print "  ".htmlentities($result->busnumber); ?></td>

						  		
						  	</tr>

						  	<tr class="bg-light">
						  		<td style=" 
						  		text-align: left!important; 
						  		width: 30%; padding: 10px!important; 
						  		padding-left: 30px!important;" class="border-0 text-dark text-bold">Start Counter</td>

						  		 <td style="padding: 10px!important;" class="border-0 text-dark text-bold" colspan="1">:</td>

						  <td style="padding: 10px!important;" class="border-0 text-dark text-light">
						  			
                                      	<?php  print "  ".htmlentities($result->busstart); ?></td>

						  		
						  	</tr>

						  	<tr class="bg-light">
						  		<td style=" 
						  		text-align: left!important; 
						  		width: 30%; padding: 10px!important; 
						  		padding-left: 30px!important;" class="border-0 text-dark text-bold">End Counter</td>

						  		 <td style="padding: 10px!important;" class="border-0 text-dark text-bold" colspan="1">:</td>

						  <td style="padding: 10px!important;" class="border-0 text-dark text-light">
						  			
                                      	<?php  print "  ".htmlentities($result->busend); ?></td>

						  		
						  	</tr>

						  	<tr class="bg-light">
						  		<td style=" 
						  		text-align: left!important; 
						  		width: 30%; padding: 10px!important; 
						  		padding-left: 30px!important;" class="border-0 text-dark text-bold">Bus Type</td>

						  		 <td style="padding: 10px!important;" class="border-0 text-dark text-bold" colspan="1">:</td>

						  <td style="padding: 10px!important;" class="border-0 text-dark text-light">
						  			
                                      	<?php  print "  ".htmlentities($result->bustype); ?></td>

						  		
						  	</tr>

                       <tr class="bg-light">
						  		<td style=" 
						  		text-align: left!important; 
						  		width: 30%; padding: 10px!important; 
						  		padding-left: 30px!important;" class="border-0 text-dark text-bold">Departing Date	</td>

						  		 <td style="padding: 10px!important;" class="border-0 text-dark text-bold" colspan="1">:</td>

						  <td style="padding: 10px!important;" class="border-0 text-dark text-light">
						  			
                                      	<?php 


                                      		

                                   
                                      	$datecng = $result->busdate;
                                      	$datecng = date('d-m-Y',strtotime($datecng));
                                      	 print $datecng; 

                                      	

                                      	  ?></td>

						  		
						  	</tr>



						  	<tr class="bg-light">
						  		<td style=" 
						  		text-align: left!important; 
						  		width: 30%; padding: 10px!important; 
						  		padding-left: 30px!important;" class="border-0 text-dark text-bold">Departing Time</td>

						  		<td style="padding: 10px!important;" class="border-0 text-dark text-bold" colspan="1">:</td>

						  <td style="padding: 10px!important;" class="border-0 text-dark text-light">
						  			
                                      	<?php  print "  ".htmlentities($result->bustime); ?></td>
						  		
						  	</tr>


						  	<tr class="bg-light">
						  		<td style=" 
						  		text-align: left!important; 
						  		width: 30%; padding: 10px!important; 
						  		padding-left: 30px!important;" class="border-0 text-dark text-bold">Ticket Price</td>

						  		<td style="padding: 10px!important;" class="border-0 text-dark text-bold" colspan="1">:</td>

						  <td style="padding: 10px!important;" class="border-0 text-dark text-light">
						  			
                                      	<?php  print "  ".htmlentities($result->bustktprice)." "; ?>TK</td>
						  		
						  	</tr>

						  	<tr class="bg-light">
						  		<td style=" 
						  		text-align: left!important; 
						  		width: 30%; padding: 10px!important; 
						  		padding-left: 30px!important;" class="border-0 text-dark text-bold">Seats</td>

						  		<td style="padding: 10px!important;" class="border-0 text-dark text-bold" colspan="1">:</td>

						  <td style="padding: 10px!important;" class="border-0 text-dark text-light">
						  			
                                      	<?php 

		    	  $sql21="SELECT seatnumber from tblusrtktbook where bookid = '$bktid'";
				$query21=$dbh->prepare($sql21);
				$query21->execute();
				$result21 = $query21->fetchAll(PDO::FETCH_OBJ);
			
				if($query21->rowCount() > 0)
				{
                     foreach ($result21 as $fetch21){

                        echo htmlentities($fetch21->seatnumber); echo " ";


                    }} 
; ?></td>


						  		
						  	</tr>

						  	<tr class="bg-light">
						  		<td style=" 
						  		text-align: left!important; 
						  		width: 30%; padding: 10px!important; 
						  		padding-left: 30px!important;" class="border-0 text-dark text-bold">Total Price</td>

						  		<td style="padding: 10px!important;" class="border-0 text-dark text-bold" colspan="1">:</td>

						  <td style="padding: 10px!important;" class="border-0 text-dark text-light">
						  			
                                      	<?php 

		    	  $sql21="SELECT COUNT(seatnumber) as totalseat from tblusrtktbook where bookid = '$bktid'";
				$query21=$dbh->prepare($sql21);
				$query21->execute();
				$result21 = $query21->fetchAll(PDO::FETCH_OBJ);
			
				if($query21->rowCount() > 0)
				{
                     foreach ($result21 as $fetch21){

                       $seat = ($fetch21->totalseat);
                       $price = ($result->bustktprice);
                       print($seat*$price)." TK";



                    }} 
; ?></td>


						  		
						  	</tr>




						  	

						  		


						  	<tr class="bg-light">
						  		<td style=" 
						  		text-align: left!important; 
						  		width: 30%; padding: 10px!important; 
						  		padding-left: 30px!important;" class="border-0 text-dark text-bold">Status</td>

						  		<td style="padding: 10px!important;" class="border-0 text-dark text-bold" colspan="1">:</td>

						  <td style="padding: 10px!important;" class="border-0 text-dark text-light">

						  			 <?php 
                                      $stts = $result->status;
						  			 if($stts == 0){ ?>
                                         
                                         <p class="text-info">Payment Pending....</p>


						  			 <?php }?>

						  			 <?php if($stts == 1){ ?>
                                         
                                         <p class="text-danger">Cancelled</p>


						  			 <?php }?>

						  			 <?php if($stts == 2){ ?>
                                         
                                         <p class="text-success">Paid</p>


						  			 <?php } ?>

                                      	</td>
						  		
						  	</tr>

                    <?php if($result->status == 2){ ?>
						  	<tr class="bg-light">
						  		<td style=" 
						  		text-align: left!important; 
						  		width: 30%; padding: 10px!important; 
						  		padding-left: 30px!important;" class="border-0 text-dark text-bold">Payment Date:</td>

						  		<td style="padding: 10px!important;" class="border-0 text-dark text-bold" colspan="1">:</td>

						  <td style="padding: 10px!important;" class="border-0 text-dark text-light">
						  			
                                      	<?php
                                      	$datecng1 = $result->paymentdate;
                                      	$datecng1 = date('d-m-Y',strtotime($datecng1));
                                      	 print $datecng1;  

                                      

                                      	?></td>
						  		
						  	</tr>

						  	
				   <?php }?>


						  </table>

<?php /*break;*/


}}}?></div>
						</div>
					</div>
				</div>
			</div>
		</section>


<script type="text/javascript">
	
	function printDiv() {

   /*  var printContents = document.getElementById(printableArea).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = "<html><head><title></title></head><body>" + printContents + "</body>";

     window.print();

     document.body.innerHTML = printContents;*/

     var divContents = document.getElementById("printableArea").innerHTML; 
            var a = window.open('', '', 'height=500, width=500'); 
            a.document.write('<html>'); 
            a.document.write('<body >'); 
            a.document.write(divContents); 
            a.document.write('</body></html>'); 
            a.document.close(); 
            a.window.print();


}
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>

<?php } ?>


