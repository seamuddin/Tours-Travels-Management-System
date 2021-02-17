<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/config1.php');
if(isset($_POST['submit2']))
{
$pid=intval($_GET['pkgid']);
$useremail=$_SESSION['login'];

$sql12 = "SELECT id from tblusers WHERE EmailId = '$useremail'";
$result12=mysqli_query($conn,$sql12);
if (mysqli_num_rows($result12) > 0){
$row = mysqli_fetch_assoc($result12);
$userid =  $row['id'];}


$fromdate=$_POST['fromdate'];
$totalperson = $_POST['totalperson'];
$status=1;
if ($FromDate == is_null($FromDate) || $totalperson == is_null($totalperson) || $totalperson < 1 )
{   
	$error = 'Fill Every Field Properly';

} else{
$sql="INSERT INTO tblbooking(PackageId,UserEmail,FromDate,status,totalperson) VALUES(:pid,:userid,:fromdate,:status,:totalperson)";
$query = $dbh->prepare($sql);
$query->bindParam(':pid',$pid,PDO::PARAM_STR);
$query->bindParam(':userid',$userid,PDO::PARAM_STR);
$query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':totalperson',$totalperson,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Booked Successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>TMS | Package Details</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<link rel="stylesheet" href="css/jquery-ui.css" />
	<script>
		 new WOW().init();
	</script>
<script src="js/jquery-ui.js"></script>
					<script>
						$(function() {
						$( "#datepicker,#datepicker1" ).datepicker();
						});
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
<!-- top-header -->
<?php include('includes/header.php');?>
<div class="banner-3">
	<div class="container">
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> Tours and Travel</h1>
	</div>
</div>
<!--- /banner ---->
<!--- selectroom ---->
<div class="selectroom">
	<div class="container">	
		  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
<?php 
$pid=intval($_GET['pkgid']);
$sql = "SELECT * from tbltourpackages where PackageId=:pid";
$query = $dbh->prepare($sql);
$query -> bindParam(':pid', $pid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

<form name="book" method="post">
		<div class="selectroom_top">
			<div class="col-md-5 selectroom_left wow fadeInLeft animated" data-wow-delay=".5s">
				<img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage);?>" class="img-responsive" alt="">
			</div>
			<div class="col-md-7 selectroom_right wow fadeInRight animated" data-wow-delay=".5s">

				<h2><?php echo htmlentities($result->PackageName);?></h2>
				<p class="dow">#PKG-<?php echo htmlentities($result->PackageId);?></p>
				<p><b>Package Price: </b>

					<?php

					$packageprice = $result->PackagePrice;
					 echo $packageprice;
					 ?>TK</p>
				<p><b>Package Category :</b> <?php echo htmlentities($result->PackageType);?></p>
				<p><b>Package Location :</b> <?php echo htmlentities($result->PackageLocation);?></p>
				<p><b>Tour Duration</b> <?php echo htmlentities($result->tourdays);?></p>
				<p><b>Tour Itinerary</b> <?php echo htmlentities($result->touritinerary);?></p>
				<p><b>Package Inclusion</b> <?php echo htmlentities($result->packageinclusion);?></p>
				<p><b>Hotel Name</b> <?php echo htmlentities($result->PackageFetures);?></p>

					<div class="ban-bottom">
				<div class="bnr-right">
				
			    </div>
			
			</div>
						<div class="clearfix"></div>
				 <div class="grand"><!--
					<p>Grand Total</p>
					<h3>USD.800</h3> -->
				</div>
			</div><br>
			<div class="clearfix"></div>
		<h3 style="margin-left:20px;">Package Details</h3>
				<p style="padding-top: 1%;margin-left:20px;"><?php echo htmlentities($result->PackageDetails);?> </p>	
				<div class="clearfix"></div>
		</div>
		<div class="selectroom_top">
			<h2  >BOOK PACKAGE 
				<p  id="totalvalue"  style="float: right;">Total Price :</p> </h2>
			<div class="selectroom-info animated wow fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp; margin-top: -70px">
				
               <div class="row mt-100 ml-10">

               	<div class="col-md-6">
               		 <label class="inputLabel">Travel Date</label>
				    <input class=" form-control1 mt-1 person-input"  id="date1" type="date" placeholder="dd-mm-yyyy"  name="fromdate" required="">
               	</div>

               	<div class="col-md-6">
               		 <label class="inputLabel">Total Person</label>
               		 <input type="number" id="personinput1" name="totalperson" oninput="inputperson()" class="person-input form-control1 mt-1" >
               	</div>

               	<div class="col-md-12 mt-5 float-right">
               		
					<?php if($_SESSION['login'])
					{?>
						
					<button type="submit" name="submit2" class="btn-primary btn float-right">Book</button>
						
						<?php } else {?>
						
							<a href="#" data-toggle="modal" data-target="#myModal4" class="float-right btn-primary btn" > Book</a>
							<?php } ?>
               	</div>
               	
               </div>



					
				
					<div class="clearfix"></div>
				</ul>
			</div>
			
		</div>
		</form>
<?php }} ?>


	</div>
</div>

<script type="text/javascript">
	function inputperson(){
	var value1 = document.getElementById("personinput1").value;
	var value2 = "<?php print $packageprice; ?>";
	var value3 = value1 * value2;
   
    if (value3 != 0){ 
	document.getElementById("totalvalue").innerHTML = "<?php print "Total Price: "; ?>"+value3+" TK";}

      else{ document.getElementById("totalvalue").innerHTML = "<?php print "Total Price: "; ?>"+0+" TK";}
 }

</script>






<!--- /selectroom ---->
<<!--- /footer-top ---->
<?php include('includes/footer.php');?>
<!-- signup -->
<?php include('includes/signup.php');?>			
<!-- //signu -->
<!-- signin -->
<?php include('includes/signin.php');?>			
<!-- //signin -->
<!-- write us -->
<?php include('includes/write-us.php');?>
</body>
</html>
