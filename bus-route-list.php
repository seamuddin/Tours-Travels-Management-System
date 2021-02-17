<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/config1.php');

$route1 = $_GET['route1'];
$route2 = $_GET['route2'];
$ddate =  $_GET['ddate'];


if ($route1 == is_null($route1)|| $route2 == is_null($route2) || $ddate==is_null($ddate)) {header('location:index.php');}
else {


?>
<!DOCTYPE HTML>
<html>
<head>
<title>TMS  | Package List</title>
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
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
</head>
<body>

<!--- /top-header ---->
<!--- header ---->
<!-- <div class="header">
	<div class="container">
		<div class="logo wow fadeInDown animated" data-wow-delay=".5s">
			<a href="index.php">Tourism <span>Management System</span></a>	
		</div>
	
		<div class="lock fadeInDown animated" data-wow-delay=".5s">
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</div> -->
<!--- /header ---->
<!--- footer-btm ---->
<?php include('includes/header.php'); ?>
<!--- banner ---->
<div class="banner-3">
	<div class="container">
		 <?php 
         

		 ?>
		<h1 class="wow zoomIn animated animated text-info" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> BUS LIST OF <?php print strtoupper($route1) ?> TO <?php print strtoupper($route2) ?> </h1>
	</div>
</div>
<!--- /banner ---->
<!--- rooms ---->

<b>
	<h3 style="margin: 20px" class="text-center mt-5 ml-10 h3"><?php echo "Date:",$ddate; ?></h3>
</b>
	
	

     
<!--Table-->
<div class="container">
     	  <table id="example" class="table table-striped table-bordered" style="width:100%">
		        <thead>
		            <tr>
		            	<th style="text-align: center;">#</th>
		                <th style="text-align: center;">Company Name</th>
		                <th style="text-align: center;">Coach No</th>
		                <th style="text-align: center;">Departing Time</th>
		                <th style="text-align: center;">Starting Counter</th>
		                <th style="text-align: center;">End Counter</th>
		                <th style="text-align: center;">Ticket price</th>
		                <th style="text-align: center;">Bus Type</th>
		                <th style="text-align: center;">Seat Available</th>
		                <th style="text-align: center;">Action</th>
		            </tr>
		        </thead>

		        <tbody>

		        	<?php
                
                $ql = "SELECT * from tblbusroute where busfrom = '$route1' AND busto = '$route2'";
                $quer = $dbh->prepare($ql);
				$quer->execute();
				$resul=$quer->fetchAll(PDO::FETCH_OBJ);
				if($quer->rowCount() > 0)
				{
					foreach($resul as $result1)
					{
						$brid = $result1->brid;
					}
				}

                $sql="SELECT * from tblbus where busroute = $brid AND busdate = '$ddate'";
				$query1=$dbh->prepare($sql);
				$query1->execute();
				$result2 = $query1->fetchAll(PDO::FETCH_OBJ);
				$cnt=1;
				if($query1->rowCount() > 0)
				{
                     foreach ($result2 as $fetch1) {
                     	
                     

                     ?>

                         
                        <tr>
		                <td style="text-align: center;"><?php echo $cnt; ?></td>
		                <td style="text-align: center;"> <?php echo htmlentities($fetch1->busname);?> </td>
		                <td style="text-align: center;"> <?php echo htmlentities($fetch1->busnumber);?></td>
		                <td style="text-align: center;">  <?php echo htmlentities($fetch1->bustime);?></td>
		                <td style="text-align: center;">  <?php echo htmlentities($fetch1->busstart);?></td>
		                <td style="text-align: center;"> <?php echo htmlentities($fetch1->busend);?></td>
		                <td style="text-align: center;">  <?php echo htmlentities($fetch1->bustktprice);?>TK</td>
		                <td style="text-align: center;"> <?php echo htmlentities($fetch1->bustype);?></td>


		                <td style="text-align: center;">

		                 <?php 

		                 
								$busid = $fetch1->busid;

							


													
								$sql15="SELECT (40-count(`seatnumber`)) as availableseat, `tblseatid` FROM `tblusrtktbook` WHERE busid = '$busid' AND status = 0";
								$query15 = $dbh->prepare($sql15);
								$query15->execute();
								$result15=$query15->fetchAll(PDO::FETCH_OBJ);
								if($query15->rowCount() > 0){
									foreach($result15 as $result16){
                                
									echo htmlentities($result16->availableseat);}}

		                 ?>


		                 	

		                 </td>



		                <td style="text-align: center;"> 
                            
                             <?php if($_SESSION['login'])
					       {?>
					       	<a href="book-ticket.php?busid=<?php echo htmlentities($fetch1->busid) ?>" class="btn btn-success">Book Ticket</a>
					       	<?php } else {?><a href="#" data-toggle="modal" data-target="#myModal4" href="" class="btn btn-success">Book Ticket</a>
					       	<?php } ?>
		                </td>
		                
		                </tr>


                   <?php $cnt=$cnt+1; }} ?>

               
		           

		           
		        </tbody>
		    </table>
</div>

          
<!--Table-->
<!--- /rooms ---->

<!--- /footer-top ---->
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

<script type="text/javascript">
	
	$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

<?php } ?>