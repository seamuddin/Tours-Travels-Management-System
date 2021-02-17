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
<div class="footer-btm wow fadeInLeft animated" data-wow-delay=".5s">
	<div class="container">
	<div class="navigation">
			<nav class="navbar navbar-default nav-design-1">
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
							<li><a href="index.php">Home</a></li>
							<li><a href="page.php?type=About us">About</a></li>
								<li>
				                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Packages Category</a>
								    <div class="dropdown-menu">


								     

								      <?php 
								      include('includes/config1.php');
									$query1="SELECT `packageid`, `packagecategory` FROM `tblpackagecategory`";
											$result1=$conn->query($query1);
											$fetch=$result1->fetch_array();  

									       do {
									          ?>
									           <a class="dropdown-item" href="package-list-by-category.php?pkgid=<?php echo $fetch[1];?>"><?php echo $fetch[1]; ?></a>
									<?php } while ($fetch=mysqli_fetch_row($result1)) ?>

								    </div>
								</li>

								<li><a href="busticket.php">Bus Ticket</a></li>

								
								<li><a href="page.php?type=Contact">Contact Us</a></li>
								<?php if($_SESSION['login'])
{?>
								<li> </li> 

								<li><a href="" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Issues</a>

                                      <div class="dropdown-menu">

                                      	<a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal3">Report Issue  </a> 
                                      	<a class="dropdown-item" href="issuetickets.php">Existing Issues</a>

                                      </div>
								</li>

								<li><a href="" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Booking History</a>

                                      <div class="dropdown-menu">

                                      	<a class="dropdown-item" href="History.php">Package Booking</a>
                                      	<a class="dropdown-item" href="bus-booking-history.php">Bus Ticket Booking</a>

                                      </div>
								</li>

								<?php } else { ?>
								<li><a href="enquiry.php"> Enquiry </a>  </li>
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