<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/config1.php');

unset($_SESSION['success_message']);
unset($_SESSION['error_message']);

$busid = $_GET['busid'];
$sql16 = "SELECT `bustktprice`, `bustype` FROM `tblbus` WHERE busid='$busid'";
$result16=mysqli_query($conn,$sql16);
if (mysqli_num_rows($result16) > 0){
	$row2 = mysqli_fetch_assoc($result16);
	$busPrice =  $row2['bustktprice'];
	
}


$usermail = $_SESSION['login'];
$sql12 = "SELECT id from tblusers WHERE EmailId = '$usermail'";
$result12=mysqli_query($conn,$sql12);
if (mysqli_num_rows($result12) > 0){
$row = mysqli_fetch_assoc($result12);
$userid =  $row['id'];}
 

$bookid = mt_rand(1,200000);
if(isset($_POST['submit1'])){
	$itemArr=$_POST['name'];
	
	foreach($itemArr as $list){
		if($list!=" "){


            
			$sql13 = "SELECT busseatid from tblbusseat WHERE seatname = '$list'";
			$result13=mysqli_query($conn,$sql13);
			if (mysqli_num_rows($result12) > 0){
				$row1 = mysqli_fetch_assoc($result13);
				$seatid = $row1['busseatid'];

				$sql14 = "SELECT * from tblusrtktbook WHERE seatnumber = '$list' AND busid='$busid' AND status = '0' ";
			    $result14=mysqli_query($conn,$sql14);
			    if (mysqli_num_rows($result14) > 0){

				$row2 = mysqli_fetch_assoc($result14);
				$seatnum = $row2['seatnumber'];
				$msg = $seatnum." ticket is already booked";
				

			}
				else{


            
            $date = date("Y-m-d h:i:sa");
            
			$sql4="INSERT INTO `tblusrtktbook`(`busid`, `userid`, `seatnumber`, `tblseatid`,`bkdate`,`bookid`) 
			VALUES('$busid','$userid','$list','$seatid',' $date','$bookid')";
			if($conn->query($sql4) === TRUE)
			{
				$msg1 = 'Ticket Successfully Booked, Check your History';
				


			}else{echo 'failed';}}


		   }
		}
	} 

} 

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
<?php include('includes/header.php');?>
<!--- banner ---->
<div class="banner-3">
	<div class="container">
		 <?php 
         

		 ?>
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> BOOK SEAT FOR </h1>
	</div>
</div>
<!--- /banner ---->
<!--- rooms ---->

<b>
<!--	<h3 style="margin: 20px" class="text-center mt-5 ml-10 h3"><?php echo "Date:",$ddate; ?></h3> -->
</b>
	
	

     
<!--Table-->

<div class="container m-10">
             
         <div class="row bus-ticket-section-inner">
             <div class="col-md-8 m-2">
                <?php if($msg!=''){?>
             	<div class="alert alert-danger" role="alert">
                 <?php echo $msg; ?>
                </div> <?php } ?>

                    <?php if($msg1!=''){?>
                <div class="alert alert-success" role="alert">
               <?php echo $msg1; ?>
                </div><?php } ?>
                  
                  <div class="card p-2 pad-5 text-center ">

                  	<h3 class="text-center">Book Ticket</h3>
                  
                  <div style="text-align: left;
    margin-left: 80px;
    margin-top: 40px;">
                  	     	<button class="btn btn-success">Seat Available</button>
                  	<button class="btn btn-danger">Seat Booked</button>
                  </div>
             
                  	      
                  	      <div class="form-group">
	                  	      	<div class="row bus-ticket-section-inner mb-2">


	                  	      	<!--	<div class=" col-md-3">
	             			      	<label for="focusedinput" class=" control-label">Bus Number</label> 
	             			         </div> -->
										
	<div class="col-md-10">
		<form action="" method="post">
			<div id="wrap">
				<div class="my_box">

			<div class="field_box col-md-10">
				<select class="form-control1 bus-seat-selection" name="name[]" >
				
					<?php

					 $query7="SELECT * FROM `tblbusseat`";
						$result7=$conn->query($query7);
						$fetch7=$result7->fetch_array();  
						do {
                     ?>

                     <option data-value="<?php echo $busPrice;?>" value="<?php echo $fetch7[1]?>"><?php echo $fetch7[1]?></option>
					<?php } while ($fetch7=mysqli_fetch_row($result7))?>
				</select>
			</div> 

	<div style="margin-top: 17px;" class="button_box col-md-2">
		<input class="btn btn-info"  type="button" name="add_btn" value="Add More" onclick="add_more()">
	</div>
</div><!--my_box end -->
</div>
<h2 id="totalTicketPrice">
	Total Price
	<span></span>
</h2>
<input style="float: right ; margin: 18px -13px 0px 0px;" class="btn btn-info mt-2" type="submit" value="BOOK" name="submit1">
<input type="hidden" id="box_count" value="1">
											</form>
										</div><!--col-->

	                  	      	</div>
             			  </div>
                  </div><!--Card-->
             		
             		
             	</div>

             	<div class="col-md-3">
														<div class="row bus-ticket-section">

															<?php $sql10="SELECT * FROM `tblbusseat`";
															$query10 = $dbh -> prepare($sql10);
															$query10 ->execute();
															$result10 = $query10->fetchAll(PDO::FETCH_OBJ);
															if($query10->rowCount()>0)
															{
																foreach($result10 as $result11)
																{

															?>

																	<?php
                                     
																		
								$sql9 = "SELECT tblseatid, seatnumber FROM `tblusrtktbook` WHERE tblseatid = '$result11->busseatid' AND busid = '$busid' AND status = '0' ";
										$result1=mysqli_query($conn,$sql9);
										if (mysqli_num_rows($result1) > 0){
											 while($row = mysqli_fetch_assoc($result1)){

											 	$clr = 'btn-danger';

											 


											 	


											 }
										} else {
											$clr = 'btn-success';
										}
											
											
										/* if($fetch[0] > 0 )
											{
												print $fetch[0];
											  $clr = 'btn-danger';
											} else{
												$clr = 'btn-success';} */
											
											
																		 ?>


															<div class="col-md-3 mt-2">
																<button class="btn <?php echo $clr ?> "><?php echo htmlentities($result11->seatname) ?></button>

															</div> <?php }}?>
															

														</div>
             	</div><!--col end-->
       </div><!-- Row end-->

          	
</div> <!--Container end-->
          
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script type="text/javascript" src="dynamic/jquery-1.4.1.min.js"></script> -->

<script>

	/*For Add new Field*/
function add_more(){
	var box_count=jQuery("#box_count").val();
	box_count++;
	jQuery("#box_count").val(box_count);
	jQuery("#wrap").append('<div class="my_box" id="box_loop_'+box_count+'"><div class="field_box col-md-10"><select class="form-control1 bus-seat-selection" name="name[]"><option data-value="<?php echo $busPrice; ?>" value="A1">A1</option><option data-value="<?php echo $busPrice; ?>" value="A2">A2</option><option data-value="<?php echo $busPrice; ?>" value="B1">B1</option><option data-value="<?php echo $busPrice; ?>" value="B2">B2</option><option data-value="<?php echo $busPrice; ?>" value="C1">C1</option><option data-value="<?php echo $busPrice; ?>" value="C2">C2</option><option data-value="<?php echo $busPrice; ?>" value="D1">D1</option><option data-value="<?php echo $busPrice; ?>" value="D2">D2</option><option data-value="<?php echo $busPrice; ?>" value="E1">E1</option><option data-value="<?php echo $busPrice; ?>" value="E2">E2</option><option data-value="<?php echo $busPrice; ?>" value="F1">F1</option><option data-value="<?php echo $busPrice; ?>" value="F2">F2</option><option data-value="<?php echo $busPrice; ?>" value="G1">G1</option><option data-value="<?php echo $busPrice; ?>" value="G2">G2</option><option data-value="<?php echo $busPrice; ?>" value="H1">H1</option><option data-value="<?php echo $busPrice; ?>" value="H2">H2</option><option data-value="<?php echo $busPrice; ?>" value="I1">I1</option><option data-value="<?php echo $busPrice; ?>" value="I2">I2</option><option data-value="<?php echo $busPrice; ?>" value="J1">J1</option><option data-value="<?php echo $busPrice; ?>" value="J2">J2</option><option data-value="<?php echo $busPrice; ?>" value="K1">K1</option><option data-value="<?php echo $busPrice; ?>" value="K2">K2</option><option data-value="<?php echo $busPrice; ?>" value="L1">L1</option><option data-value="<?php echo $busPrice; ?>" value="L2">L2</option><option data-value="<?php echo $busPrice; ?>" value="M1">M1</option><option data-value="<?php echo $busPrice; ?>" value="M2">M2</option><option data-value="<?php echo $busPrice; ?>" value="N1">N1</option><option data-value="<?php echo $busPrice; ?>" value="N2">N2</option><option data-value="<?php echo $busPrice; ?>" value="O1">O1</option><option data-value="<?php echo $busPrice; ?>" value="O2">O2</option><option data-value="<?php echo $busPrice; ?>" value="P1">P1</option><option data-value="<?php echo $busPrice; ?>" value="P2">P2</option><option data-value="<?php echo $busPrice; ?>" value="Q1">Q1</option><option data-value="<?php echo $busPrice; ?>" value="Q2">Q2</option><option data-value="<?php echo $busPrice; ?>" value="R1">R1</option><option data-value="<?php echo $busPrice; ?>" value="R2">R2</option><option data-value="<?php echo $busPrice; ?>" value="S1">S1</option><option data-value="<?php echo $busPrice; ?>" value="S2">S2</option><option data-value="<?php echo $busPrice; ?>" value="T1">T1</option><option data-value="<?php echo $busPrice; ?>" value="T2">T2</option></select></div><div class="button_box col-md-2"><input style="float: right ; margin: 18px -13px 0px 0px;"class="btn" type="button" name="submit" id="submit" value="Remove" onclick=remove_more("'+box_count+'")></div></div>');
}
/*For remove exist Field*/
function remove_more(box_count){
	jQuery("#box_loop_"+box_count).remove();
	var box_count=jQuery("#box_count").val();
	box_count--;
	jQuery("#box_count").val(box_count);
	
	var totalPrice = 0;
	$('.bus-seat-selection').each(function(){
		totalPrice += parseFloat($(this).find(":selected").attr('data-value'));
	});
	$('#totalTicketPrice span').text(totalPrice);
	$('#totalTicketPrice').css('display','flex');
}

/*For Calculate total value*/
jQuery(document).on('change','.bus-seat-selection',function(){
	var totalPrice = 0;
	$('.bus-seat-selection').each(function(){
		totalPrice += parseFloat($(this).find(":selected").attr('data-value'));
	});
	$('#totalTicketPrice span').text(totalPrice);
	$('#totalTicketPrice').css('display','flex');

});
</script>


<script type="text/javascript">
	if($('#example').length >0 ){
		$(document).ready(function() {
		    $('#example').DataTable();
		});
	}
	
</script>