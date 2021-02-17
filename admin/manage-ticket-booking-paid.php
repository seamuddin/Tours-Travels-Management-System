<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 
	// code for cancel
if(isset($_REQUEST['bkid']))
	{
$bid=intval($_GET['bkid']);
$status=1;
$sql24 = "UPDATE tblusrtktbook SET status=:status WHERE bookid=:bid";
$query24 = $dbh->prepare($sql24);
$query24 -> bindParam(':status',$status, PDO::PARAM_STR);
$query24-> bindParam(':bid',$bid, PDO::PARAM_STR);
$query24 -> execute();

   $msg="Booking Cancelled successfully";
}


if(isset($_REQUEST['bckid']))
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
                <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Manage Ticket Bookings</li>
            </ol>
<div class="agile-grids">	
				<!-- tables -->
				<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h2>Manage Ticket Bookings</h2>

					  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a href="manage-ticket-booking.php" class="nav-link active" >ALL</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="manage-bookings-paid.php" >Paid</a>
  </li>
  <li class="nav-item">
    <a href="manage-ticket-booking-pending.php" class="nav-link" >Pending</a>
  </li>
</ul>
					    <table id="table">
						<thead>
						  <tr>
						  <th>Serial No</th>
						  <th>Book ID</th>
							<th>User Name</th>
							<th>Email</th>
							<th>Bus Name</th>
							<th>Bus Number</th>
							<th>Bus Route</th>
							<th>BookingDate </th>
							<th>Departing Date</th>
							<th>Time </th>
							<th>Seats </th>
							<th>Total Amount </th>
							<th>Status </th>
							<th>Action </th>
						  </tr>
						</thead>
						<tbody>
<?php $sql = "SELECT * FROM (((tblusers INNER JOIN tblusrtktbook ON tblusers.id = tblusrtktbook.userid) INNER JOIN tblbus ON tblusrtktbook.busid = tblbus.busid) INNER JOIN tblbusroute ON tblbus.busroute = tblbusroute.brid) WHERE tblusrtktbook.status = 2 GROUP BY tblusrtktbook.bookid ORDER BY tblusrtktbook.bkdate ASC";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result3)
{
	?>

	



   
	
						  <tr>
							<td><?php echo $cnt;?></td>
							<td><?php echo htmlentities($result3->tktbookid);?></td>
							<td><?php echo htmlentities($result3->FullName);?></td>
							<td><?php echo htmlentities($result3->EmailId);?></td>
							<td><?php echo htmlentities($result3->busname);?></td>
							<td><?php echo htmlentities($result3->busnumber);?></td>
							<td><?php echo htmlentities($result3->busfrom); echo " To "; echo htmlentities($result3->busto);?></td>
							<td><?php 
							     $datecng2 = $result3->bkdate;
								$datecng2 = date('d-m-Y',strtotime($datecng2));
							echo $datecng2;

							?> </td>
							<td><?php
							 $datecng3 = $result3->busdate;
								$datecng3 = date('d-m-Y',strtotime($datecng3));
							 echo $datecng3;

							 ?></td>
							<td><?php echo htmlentities($result3->bustime);?></td>




    						<td><?php 


                  $bookid = $result3->bookid;
		    	  $sql21="SELECT seatnumber from tblusrtktbook where bookid = '$bookid'";
				$query21=$dbh->prepare($sql21);
				$query21->execute();
				$result21 = $query21->fetchAll(PDO::FETCH_OBJ);
			
				if($query21->rowCount() > 0)
				{
                     foreach ($result21 as $fetch21){

                        echo htmlentities($fetch21->seatnumber); echo " ";


                    }} 

    					

    						?>
    							

    						</td>

    						<td>
    							
    							<?php

 					

					$busid = $result3->busid;
					$userid = $result3->userid;
		    	  $sql22="SELECT count(seatnumber) as seatvalue from tblusrtktbook where bookid = '$bookid'";
				$query22=$dbh->prepare($sql22);
				$query22->execute();
				$result22 = $query22->fetchAll(PDO::FETCH_OBJ);
			
				if($query22->rowCount() > 0)
				{
                     foreach ($result22 as $fetch22){

                       $val1 = ($fetch22->seatvalue);
                       $val2 = ($result3->bustktprice);
                        
                        

                        print $val1*$val2."TK";
                    }} 

                
                 
               
    							 ?>
    						</td>



<td><?php if($result3->status==0)
{
echo "Pending";
}
elseif($result3->status==1)
{
echo "Cancelled";
}
else
{
	echo "Paid";
}
/*if($result->status==2 and  $result->cancelby=='a')
{
echo "Canceled by you at " .$result->upddate;
} 
if($result->status==2 and $result->cancelby=='u')
{
echo "Canceled by User at " .$result->upddate;

}*/
?></td>

<td>

<?php if($result3->status==1)
{
	?><p>Cancelled</p>
<?php } else {?><a href="manage-ticket-booking.php?bkid=<?php echo htmlentities($result3->bookid);?>" onclick="return confirm('Do you really want to cancel booking')" >Cancel</a> <br> 
<?php }?>

<a href="viewdetails1.php?bktid=<?php  echo htmlentities($result3->bookid); ?>&cid=<?php echo $cnt; ?>" >View</a></td>

						  </tr>
						 <?php $cnt=$cnt+1; ?>
                          
                       
                          <?php }}?>
						</tbody>
					  </table>
					</div>
				  </table>

				
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