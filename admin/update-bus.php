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
$pid=intval($_GET['pid']);	
if(isset($_POST['submit']))
{
$busname=$_POST['busname'];
$busnumber=$_POST['busnumber'];	
$busrouteid=$_POST['busrouteid'];
$bustype = $_POST['bustype'];
$busdate=$_POST['busdate'];
$busdate = date('Y-m-d',strtotime($busdate));
$bustime=$_POST['bustime'];
$bustime = date("g:i a", strtotime($bustime));
$busstartfrom=$_POST['busstartfrom'];	
$busendto=$_POST['busendto'];	
$totalbusseat=$_POST['totalbusseat'];	
$bustktprice=$_POST['bustktprice'];	

$sql = "UPDATE `tblbus` SET `busname`='$busname',`busnumber`='$busnumber',`busroute`='$busrouteid',`bustime`='$bustime',`busstart`='$busstartfrom',`busend`='$busendto',`busseatsavailable`='$totalbusseat',`busdate`='$busdate',`bustktprice`='$bustktprice', `bustype` ='$bustype' WHERE busid = '$pid' ";

if (mysqli_query($conn, $sql))
{

$msg="Bus Updated Successfully";

}
else 
{
$error="Something went wrong. Please try again";

}}

if(isset($_POST['delete'])){
	$sql = "DELETE FROM tblbus WHERE busid = '$pid'";
	if ($conn->query($sql) == TRUE)
    {
		$sql1 = "DELETE FROM tblusrtktbook WHERE busid = '$pid'";

		if ($conn->query($sql1) === TRUE) {
		  $msg = "Record deleted successfully";
		} else {
		  $msg = "Error deleting record: " . $conn->error;
		}
       
    }
      }


	?>
<!DOCTYPE HTML>
<html>
<head>
<title>TMS | Admin Package Creation</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery-2.1.4.min.js"></script>
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
                <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Update Bus </li>
            </ol>
		<!--grid-->
 	<div class="grid-form">
 
<!---->
  <div class="grid-form1">
  	       <h3>Update Bus</h3>
  	        	  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>: <p class="success"><?php echo htmlentities($msg); ?></p> </div><?php }?>
  	        	  
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
						
<?php 
$pid=intval($_GET['pid']);
$sql = "SELECT * from tblbus where busid=:pid";
$query = $dbh -> prepare($sql);
$query -> bindParam(':pid', $pid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result1)
{	?>

							<form class="form-horizontal" name="package" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Bus Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="busname" id="packagename" placeholder="Create Package" value="<?php echo htmlentities($result1->busname);?>" required>
									</div>
								</div>
<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Bus Number</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="busnumber" id="packagelocation" placeholder=" Package Location" value="<?php echo htmlentities($result1->busnumber);?>" required>
									</div>
								</div>


<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Bus Type</label>
									<div class="col-sm-8">
										<select class="form-control" name="bustype">
											<option value="<?php echo htmlentities($result1->bustype);?>">
												<?php echo htmlentities($result1->bustype);?>
											</option>
											<option value="AC">AC</option>
											<option value="NON AC">NON AC </option>
										</select>
									</div>
								</div>





<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Bus Route</label>
									<div class="col-sm-8">
										

									<!--	<input type="text" class="form-control1" name="packagetype" id="packagetype" placeholder=" Package Type eg- Family Package / Couple Package" required> -->

									

								 <select class="form-control" id="exampleFormControlSelect1" name="busrouteid" id="packagetype">

								 	<?php 
								 	$busrouteid = $result1->busroute;
									$query="SELECT `brid`,`busfrom`,`busto` FROM `tblbusroute` where brid ='$busrouteid' ";
											$result=$conn->query($query);
											$fetch=$result->fetch_array();  

									       do {
									          ?>
									<option value="<?php echo $fetch[0] ;?>">
										<?php echo $fetch[1]; ?> to <?php echo $fetch[2]; ?>
										
									</option>
									<?php } while ($fetch=mysqli_fetch_row($result)) ?>
                                  
									<?php 
									$query="SELECT `brid`,`busfrom`,`busto` FROM `tblbusroute`";
											$result=$conn->query($query);
											$fetch=$result->fetch_array();  

									       do {
									          ?>
									<option value="<?php echo $fetch[0] ;?>">
										<?php echo $fetch[1]; ?> to <?php echo $fetch[2]; ?>
										
									</option>
									<?php } while ($fetch=mysqli_fetch_row($result)) ?>
										    </select> 





									</div>
								</div>

<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Bus Date</label>
									<div class="col-sm-8">
										<input type="date" class="form-control1" name="busdate" id="packagefeatures" placeholder="Bus Date" value="<?php echo htmlentities($result1->busdate);?>" required>
									</div>
								</div>	
<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Bus Time</label>
									<div class="col-sm-8">
										<input type="time" class="form-control1" name="bustime" id="packagelocation" value="<?php echo htmlentities($result1->bustime);?>" >
									</div>
								</div>



<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Bus Start Counter</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="busstartfrom" id="packageprice" placeholder="Bus Start" value="<?php echo htmlentities($result1->busstart);?>"  required>
									</div>
								</div>



<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Bus End Counter</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="busendto" id="packagefeatures" placeholder="Bus End " value="<?php echo htmlentities($result1->busend);?>" required>
									</div>
								</div>		



<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Bus Total Seat</label>
									<div class="col-sm-8">
										<input type="number" class="form-control1" name="totalbusseat" id="packagefeatures" placeholder="Bus Seat " value="<?php echo htmlentities($result1->busseatsavailable);?>" required>
									</div>
								</div>		
<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Bus Ticket Price</label>
									<div class="col-sm-8">
										<input type="number" class="form-control1" name="bustktprice" id="packagefeatures" placeholder="Ticket Price " value="<?php echo htmlentities($result1->bustktprice);?>" required>
									</div>
								</div>	

	
								<?php }} ?>

								<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<button type="submit" name="submit" class="btn-primary btn">Update</button>
				<!-- <button type="submit" name="delete" class="btn-primary btn">Delete</button> -->
			</div>
		</div>
						
					
						
						
						
					</div>
					
					</form>

     
      

      
      <div class="panel-footer">
		
	 </div>
    </form>
  </div>
 	</div>
 	<!--//grid-->

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
<?php include('includes/footer.php');?>
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

</body>
</html>
<?php } ?>