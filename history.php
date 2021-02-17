<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/config1.php');
$useremail=$_SESSION['login'];


$sql12 = "SELECT id from tblusers WHERE EmailId = '$useremail'";
$result12=mysqli_query($conn,$sql12);
if (mysqli_num_rows($result12) > 0){
$row = mysqli_fetch_assoc($result12);
$userid =  $row['id'];}


$statuscancel = $_GET['cancel'];
$pkbookid = $_GET['pkbid'];
  if($statuscancel != is_null($statuscancel))
							{

								
								$sql18="UPDATE tblbooking set `status`= 2 where BookingId='$pkbookid'";
							    $query18 = $dbh->prepare($sql18);
							    $query18->execute();


							}

  if(isset($_GET['delid']))
  {
  	$delid = $_GET['delid'];
  	$sql19="DELETE FROM tblbooking WHERE BookingId = '$delid'";
    $query19 = $dbh->prepare($sql19);
    $query19->execute();
  }


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
<link href="assets/font/fontawesome/css/all.css" rel="stylesheet">
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
$pid=intval($_GET['pkgid']);?>

             <div class="row d-flex">
             	<div class="col-md-12">
             		
     	  <table id="example" class="table table-striped table-bordered" style="width:100%">
		        <thead>
		            <tr>
		            	<th style="text-align: center;">#</th>
		                <th style="text-align: center;">Package Name</th>
		                <th style="text-align: center;">Total Person</th>
		                <th style="text-align: center;">Package Price</th>	
		                <th style="text-align: center;">Travel Date</th>	                
		                <th style="text-align: center;">Total</th>		                
		                <th style="text-align: center;">Action</th>
		            </tr>
		        </thead>

		        <tbody>

		        	<?php
                
                /*$ql = "";
                $quer = $dbh->prepare($ql);
				$quer->execute();
				$resul=$quer->fetchAll(PDO::FETCH_OBJ);
				if($quer->rowCount() > 0)
				{
					foreach($resul as $result1)
					{
						$brid = $result1->brid;
					}
				}*/

                $sql="SELECT * from tblbooking where UserEmail = '$userid'";
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
            <td style="text-align: center;">
             <?php 

                $pkid = $fetch1->PackageId;

                $sql16 = "SELECT * from tbltourpackages where PackageId= '$pkid' ";
                 $result16=mysqli_query($conn,$sql16);
                 if (mysqli_num_rows($result16) > 0){

                 	$row2 = mysqli_fetch_assoc($result16);
	                print $row2['PackageName'];

                 ?>

              </td>
              <td style="text-align: center;"><?php echo htmlentities($fetch1->totalperson); ?></td>
            <td style="text-align: center;"> <?php print $row2['PackagePrice']."TK"; ?> </td>
		    <td style="text-align: center;">
		    	<?php 
                $bookdate = $fetch1->FromDate;
		    	$bookdate = date('d-m-Y',strtotime($bookdate));
		    	echo $bookdate;

		     
		        ?>
		     	 
		     </td>
		    <td style="text-align: center;">
		    	<?php

		    	$val1 = $fetch1->totalperson;
		    	$val2 = $row2['PackagePrice'];
		    	$amount = $val1*$val2;

		    	echo $amount."TK";
 
               }

		    	  ?>
		    		

		    	</td>
            <td style="text-align: center;">

            	
            		
            	

            	<?php 
                    $status = $fetch1->status;
                    $pkbid = $fetch1->BookingId;
            	if ($status == 2){ ?>

                 <a href="#"  href="" class="btn btn-danger">Cancelled</a>

               





                 
            	<?php }

               elseif ($status == 3) {?>

               	 <a href="#"  href="" class="btn btn-success">Paid</a>
               	 <a href="Package-invoice.php?bktid=<?php echo $pkbid;  ?>" class="btn btn-success">Invoice</a> 
               	
               <?php }
            	 else {  ?>
            		
            		<!--<button class="btn btn-danger" type="submit" name="cancel">Cancel</button> -->

            		<a href="history.php?cancel=2&pkbid=<?php echo $pkbid; ?>" class="btn btn-danger">cancel</a>


            		
            	
            	<a href="payment.php?pamount=<?php echo $amount;?>&pid=<?php echo $pkbid; ?>" class="btn btn-success ml-2">Pay</a>
            	<a href="package-invoice.php?bktid=<?php echo $pkbid;?>" class="btn btn-success">Invoice</a> 
            	
                <?php }?>
                 </form>
                  <!--  <a href="history.php?delid=<?php echo $pkbid; ?>" class="btn" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash-alt"></i></a>
 -->

            	</td> 
		                
		                </tr>


                   <?php $cnt=$cnt+1; }} ?>

               
		           

		           
		        </tbody>
		    </table>
            
             	</div> <!--col end-->

             	<!-- <div class="col-md-6">
             		<table id="example" class="table table-striped table-bordered" style="width:100%">
		        <thead>
		            <tr>
		            	<th style="text-align: center;">#</th>
		                <th style="text-align: center;">Bus Name</th>
		                <th style="text-align: center;">Total Seat</th>
		                <th style="text-align: center;">Ticket Price</th>
		                <th style="text-align: center;">Departing Time</th>
		                <th style="text-align: center;">Action</th>
		            </tr>
		        </thead>
		        <tbody>
		        	
		        </tbody>
		       </table>

             	</div> -->
             </div>


</div>
</div>
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