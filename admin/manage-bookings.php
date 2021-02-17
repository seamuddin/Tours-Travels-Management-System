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
$bcid=intval($_GET['bkid']);
$status=2;
$sql = "UPDATE tblbooking SET status=:status WHERE BookingId=:bcid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':bcid',$bcid, PDO::PARAM_STR);
$query -> execute();
$msg="Booking Cancel successfully";
}




	?>
<!DOCTYPE HTML>
<html>
<head>
<title>TMS | Admin manage Bookings</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' /> 
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- <link rel="stylesheet" href="css/morris.css" type="text/css"/> -->
<link href="css/font-awesome.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> 
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
                <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Manage Bookings</li>
            </ol>




<div class="agile-grids">	


				<!-- tables -->
				<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h2>Manage Bookings</h2>
                         
<!--Tab-->


<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a href="manage-bookings.php" class="nav-link active" >ALL</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="manage-bookings-paid.php" >Paid</a>
  </li>
  <li class="nav-item">
    <a href="manage-bookings-pending.php" class="nav-link" >Pending</a>
  </li>
</ul>

					    <table id="table">
						<thead>
						  <tr>
						  <th>Serial No</th>
						  <th>Booking id</th>
							<th>User Name</th>
							<th>Email</th>
							<th>Package Name</th>
							<th>package Category</th>
							<th>Booking Date </th>
							<th>Travel Date</th>
							<th>Total Person </th>
							<th>Total Amount </th>
							<th>Status </th>
							<th>Action </th>
						  </tr>
						</thead>
						<tbody>
<?php $sql = "SELECT tblusers.FullName, tblusers.EmailId, tbltourpackages.PackageName, tbltourpackages.PackageType, tbltourpackages.PackagePrice, tblbooking.FromDate, tblbooking.RegDate, tblbooking.totalperson, tblbooking.BookingId, tblbooking.status FROM ( ( tblusers INNER JOIN tblbooking ON tblusers.id = tblbooking.UserEmail ) INNER JOIN tbltourpackages ON tblbooking.PackageId = tbltourpackages.PackageId ) GROUP BY tblbooking.FromDate DESC";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>		
						  <tr>
							<td><?php echo $cnt;?></td>
								<td><?php echo htmlentities($result->BookingId);?></td>
							<td><?php echo htmlentities($result->FullName);?></td>
							<td><?php echo htmlentities($result->EmailId);?></td>
							<td><?php echo htmlentities($result->PackageName);?></td>
							<td><?php echo htmlentities($result->PackageType);?></td>
							<td><?php echo htmlentities($result->RegDate);?></td>
							<td><?php echo htmlentities($result->FromDate);?> </td>
							<td><?php echo htmlentities($result->totalperson);?></td>




    						<td><?php 

    						$Person=$result->totalperson;
    						$price = $result->PackagePrice;

    						print $Person*$price."TK";

    						?>
    							

    						</td>



<td><?php if($result->status==1)
{
echo "Pending";
}
if($result->status==3)
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



<?php if($result->status==2)
{
	?><td>Cancelled</td>
<?php } else {?>
<td><a href="manage-bookings.php?bkid=<?php echo htmlentities($result->BookingId);?>" onclick="return confirm('Do you really want to cancel booking')" >Cancel</a> / <a href="viewdetails.php?cid=<?php echo $cnt; ?>&bckid=<?php echo htmlentities($result->BookingId);?>" >View</a></td>
<?php }?>

						  </tr>
						 <?php $cnt=$cnt+1;} }?>
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