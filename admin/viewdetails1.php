<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/config1.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 
	// code for cancel
/*if(isset($_REQUEST['bkid']))
	{
$bid=intval($_GET['bkid']);
$status=2;
$cancelby='a';
$sql = "UPDATE tblbooking SET status=:status,CancelledBy=:cancelby WHERE  BookingId=:bid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> bindParam(':cancelby',$cancelby , PDO::PARAM_STR);
$query-> bindParam(':bid',$bid, PDO::PARAM_STR);
$query -> execute();

$msg="Booking Cancelled successfully";
}*/


/*if(isset($_REQUEST['bckid']))
	{
$bcid=intval($_GET['bckid']);
$status=1;
$cancelby='a';
$sql = "UPDATE tblbooking SET status=:status WHERE BookingId=:bcid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':bcid',$bcid, PDO::PARAM_STR);
$query -> execute();
$msg="Booking Confirm successfully";
}

*/


	?>
<!DOCTYPE HTML>
<html>
<head>
<title>TMS | Admin manage Bookings</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery-2.1.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<link rel="stylesheet" type="text/css" href="css/basictable.css" />
<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('#table').basictable();

      $('#table-breakpoint').basictable({
        breakpoint: 768
      });

      $('#table-swap-axis').basictable({
        swapAxis: true
      });

      $('#table-force-off').basictable({
        forceResponsive: false
      });

      $('#table-no-resize').basictable({
        noResize: true
      });

      $('#table-two-axis').basictable();

      $('#table-max-height').basictable({
        tableWrapper: true
      });
    });
</script>
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
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
   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
				<?php include('includes/header.php');?>
				     <div class="clearfix"> </div>	
				</div>
<!--heder end here-->
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Booking Details</li>
            </ol>

				<!-- tables -->
				
				
					 
					   
         <div class="row bus-ticket-section-inner">
         	<div class="col-md-8">
               
                
                <div class="card box-shadow-1">
                	 
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
                	 <p style="padding-top: 10px;" class="p-2">
                	 	Invoice No: #<?php print $_GET['cid']; ?>
                	 </p>
                	 <p class="p-2">Booking No: #BK 

                	 	<?php 

                	 	$sql2 = "SELECT  SUM(tktbookid) as totalid, `busid`, `userid`, `seatnumber`, `tblseatid`, `status`, `bkdate`, `bookid` FROM `tblusrtktbook` WHERE bookid='$bktid' ";
                	 	$result1 = $conn->query($sql2);
                	 	$row = $result1->fetch_assoc();
                	 	print $row['totalid'];
                	 	 

                	 	 ?>  


                	 </p>
                	 <h3 class="">Customer Details</h3>
						  <table style="border: 0px solid grey;" class="table tbl-margin bg-light">
						  	<tr class="bg-light">
						  		<td style=" text-align: left!important; width: 20%;padding: 10px!important; 
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
						  		<td style=" text-align: left!important; width: 20%;padding: 10px!important; 
						  		padding-left: 30px!important;" class="border-0 text-dark text-bold">Mobile</td>

						  		<td style="padding: 10px!important;" class="border-0 text-dark text-bold" colspan="1">:</td>


						  		<td style="padding: 10px!important;" class="border-0 text-dark text-light">
						  			
                                      	<?php  print "  ".htmlentities($result->MobileNumber); ?></td>

						  		 
						  		
						  	</tr>

						  	<tr class="bg-light">
						  		<td style=" text-align: left!important; width: 20%;padding: 10px!important; 
						  		padding-left: 30px!important;" class="border-0 text-dark text-bold">Email</td>

						  		<td style="padding: 10px!important;" class="border-0 text-dark text-bold" colspan="1">:</td>

						  		<td style="padding: 10px!important;" class="border-0 text-dark text-light">
						  			
                                      	<?php  print "  ".htmlentities($result->EmailId); ?></td>
						  		
						  	</tr>
						  </table>



				    <h3 class="">Booking Details</h3>
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

<?php /*break;*/}


}}?>


						</div>

         		
         	</div>
         </div>
					  
				

<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">

</div>
<!--inner block end here-->
<!--copy rights start here-->

<!--COPY rights end here-->
</div>
</div>
  <!--//content-inner-->
		<!--/sidebar-menu-->
						<?php include('includes/sidebarmenu.php');?>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   
<?php include('includes/footer.php');?>
</body>
</html>
<?php } ?>