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
$userid =  $row['id'];
}

if(isset($_REQUEST['tkbid']))
	{
$bid=intval($_GET['tkbid']);
$status=1;
$sql = "UPDATE tblusrtktbook SET status=:status WHERE  bookid=:bid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':bid',$bid, PDO::PARAM_STR);
$query -> execute();
if($query->rowCount() > 0){
	$msg="Booking Cancelled successfully";
}

  
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
$pid=intval($_GET['pkgid']);?>

             <div class="row d-flex">
             	<div class="col-md-12">
             		
     	  <table id="example" class="table table-striped table-bordered" style="width:100%">
		        <thead>
		            <tr>
		            	<th style="text-align: center;">#</th>
		                <th style="text-align: center;">Bus Name</th>
		                <th style="text-align: center;">Bus Number</th>
		                <th style="text-align: center;">Bus Route</th>
		                
		                <th style="text-align: center;">Departing Date</th>
		                <th style="text-align: center;">Seat Number</th>
		                <th style="text-align: center;">Total Price</th>
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

                $sql="SELECT  * FROM `tblusrtktbook` WHERE userid = '$userid' GROUP BY bookid ORDER BY bkdate DESC";
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
            <td style="text-align: center;"><?php ;?>
             <?php 

                $pkid = $fetch1->busid;

                $sql16 = "SELECT * from tblbus where busid= '$pkid' ";
                 $result16=mysqli_query($conn,$sql16);
                 if (mysqli_num_rows($result16) > 0){

                 	$row2 = mysqli_fetch_assoc($result16);
	                print $row2['busname'];

                 ?>


                
              </td>
              <td style="text-align: center;"><?php print $row2['busnumber'];?></td>

              <td style="text-align: center;"><?php 
                    
                    $routeid = $row2['busroute'];
                    $sql20 = "SELECT * from tblbusroute where brid= '$routeid' ";
                 $result20=mysqli_query($conn,$sql20);
                 $row3 = mysqli_fetch_assoc($result20);
                 if (mysqli_num_rows($result20)>0){
                 
                 print $row3['busfrom'].' to '.$row3['busto'];}


               ?></td>



            <td style="text-align: center;"> 
            	<?php 
            	$bookdate = $row2['busdate'];
		    	$bookdate = date('d-m-Y',strtotime($bookdate));
		    	echo $bookdate; 
		    	?> </td>

		    <td style="text-align: center;">
		    	<?php 


                  $busid = $fetch1->busid;
                  $status = $fetch1->bookid;
		    	  $sql21="SELECT seatnumber from tblusrtktbook where busid = $busid  AND userid = '$userid' AND bookid = '$status' ";
				$query21=$dbh->prepare($sql21);
				$query21->execute();
				$result21 = $query21->fetchAll(PDO::FETCH_OBJ);
			
				if($query21->rowCount() > 0)
				{
                     foreach ($result21 as $fetch21){

                        echo htmlentities($fetch21->seatnumber); echo " ";}} 


                   


                
                


		     
		        ?>
		     	 
		     </td>
		    <td style="text-align: center;">
		    	<?php
                   
		    	
		    	 $busid = $fetch1->busid;
		    	  $sql22="SELECT count(seatnumber) as seatvalue from tblusrtktbook where busid = $busid  AND userid = '$userid' AND bookid = '$status'";
				$query22=$dbh->prepare($sql22);
				$query22->execute();
				$result22 = $query22->fetchAll(PDO::FETCH_OBJ);
			
				if($query22->rowCount() > 0)
				{
                     foreach ($result22 as $fetch22){

                       $val1 = ($fetch22->seatvalue);
                        
                        $val2 =  $row2['bustktprice'];
                        $totalamount = $val1*$val2;

                        print $totalamount."TK";
                    }

                
                 }
               

		    	  ?>
		    		

		    	</td>
            <td style="text-align: center;">

            	
            		
            	

            	<?php 
                    $status = $fetch1->status;
                    $pkbid = $fetch1->bookid;

            	if ($status == 1){ ?>

                 <a href="#"  href="" class="btn btn-danger">Cancelled</a> <?php } ?>

               





                 
            	<?php }
				if($status == 2){ ?>
				<a href="#"  href="" class="btn btn-success">Paid</a> 
				<a  href="ticket-invoice.php?bktid=<?php echo htmlentities($fetch1->bookid);  ?>" class="btn btn-success">Invoice</a> 

				<?php }
				if ($status == 0) {  ?>
            		
            		<!--<button class="btn btn-danger" type="submit" name="cancel">Cancel</button> -->

            		<a href="bus-booking-history.php?tkbid=<?php echo $pkbid; ?>" class="btn btn-danger" onclick="return confirm('Do you really want to cancel booking')">cancel</a>

            		
            	
            	<a  href="payment.php?amount=<?php print $totalamount; ?>&bktid=<?php echo htmlentities($fetch1->bookid); ?>  " class="btn btn-success ml-2">Pay</a>

            	<a href="ticket-invoice.php?bktid=<?php echo htmlentities($fetch1->bookid);  ?>" class="btn btn-success">Invoice</a> 
            	
                <?php }?>
                 </form>
                   <a href="history.php?delid=<?php echo $pkbid; ?>" class="btn" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash-alt"></i></a>


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