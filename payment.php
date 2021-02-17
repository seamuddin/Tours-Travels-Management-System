<?php session_start();
error_reporting(0);
include('includes/config.php');
include('includes/config1.php');
unset($_SESSION['msg']);
if(strlen($_SESSION['login']) == 0)
	{	
header('location:index.php');
}
else{

	


 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap link -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!-- Fontawesome Link -->
	<link rel="stylesheet" type="text/css" href="assets/font/fontawesome/css/all.css">
	<!-- owl-cerousel css link -->
	<link rel="stylesheet" type="text/css" href="assets/plugins/owl-carousel/owl.carousel.min.css">
	<!-- Main css Link -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>

	<section class="payment-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6 m-auto">
						<div class="payment-input-inner">
							<h3 class="title">
								Payment
							</h3>
							<div class="col-lg-6 col-md-6 col-sm-12 m-auto">
								<label for="fname" class="accepted-card">
									Accepted Cards
								</label>
								<div class="card-name">
									<i class="fab fa-cc-visa"></i>
									<i class="fab fa-cc-amex"></i>
									<i class="fab fa-cc-mastercard"></i>
									<i class="fab fa-cc-discover"></i>
								</div>
							</div><form name="myForm" action="" method="POST" onsubmit="return(validate());">	
							<div class="col-md-12">
								<div class="input-wrapper">
									<div class="col-md-6">
										<div class="name-of-card">
											<label for="cname">
												Card Holder Name
											</label>
											<input type="text" name="cname" placeholder="Name" >
										</div>
									</div>
									<div class="col-md-6">
										<div class="card-number">
											<label for="cardnumber">
												Credit card number
											</label>
											<input type="text" name="cardnumber" maxlength="16" placeholder="1111-2222-3333-4444" >
										</div>
									</div>

									<div class="col-md-6">
										<div class="exp-month">
											<label for="expmonth">
												Exp Year And Month
											</label>
											<input type="month" id="bdaymonth" name="bdaymonth" value="hhhhh" >
										</div>
									</div>
									
								 	<div class="col-md-6">
								 		<div class="cvv">
								 			<label for="cvv">
								 				CVV
								 			</label>
								 			<input type="text" name="cvv" maxlength="3" placeholder="012" >
								 		</div>
								 	</div>

								 	<div class="col-md-12">
								 		<div class="" style="">
								 			<label for="cvv" class="mt-2">
								 				Grand Total: 

								 				<?php
								 				if(isset($_REQUEST['amount'])) 
								 				{
                                                      print $_GET['amount']."TK";
								 				}
								 				if(isset($_REQUEST['pamount']))
								 				{
								 					print $_GET['pamount']."TK";
								 				}
								 				?>								 				
								 			</label>

								 			<?php if(isset($_REQUEST['pamount']) && isset($_REQUEST['pid'])) 
								 				{

								 		$pid = intval($_GET['pid']);

								 		?>
                                                    
								 	  	
								 		<button name="pay1" style="width:100%;" class="btn btn-success ml-2" >Pay</button>
                                        
								 		<!-- <input type="submit" name="pkgpay" class="bg-green btn btn-success" style="width:100%;" value="Pay Package" >
 -->
								 	<?php }?>

								 		<?php if(isset($_REQUEST['amount']) && isset($_REQUEST['bktid'])) 
								 				{
								 					 $bktid = intval($_GET['bktid']);?>
                                           
                                            	<button name="pay2" style="width:100%;" class="btn btn-success ml-2" >Pay</button>
                                      
								 			
								 		  <?php }?> </form>	

								 		  <?php

                                              if(isset($_POST['pay1']))
													{
												
														
												       header( "Location: package-invoice.php?bktid=".$pid.'&'."status="."3");

													}

											 if(isset($_POST['pay2']))
													{
												
														
												       header( "Location: ticket-invoice.php?bktid=".$bktid.'&'."status="."2");

													}
																				 		   ?>

								 	</div>
								 	</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

<script>
 function validate() {
      
         if( document.myForm.cname.value == "" ) {
            alert( "Please provide your name!" );
 
            return false;
         }

          if (!/^[a-zA-Z]*$/g.test(document.myForm.cname.value)) {
        alert("Invalid characters");
       
        return false;}

        if( document.myForm.cardnumber.value == "" ) {
            alert( "Please provide your CardNumber !" );
   
            return false;
         }

         


        var cardnumberstr = document.myForm.cardnumber.value;
        var n = cardnumberstr.length;
          if(  n < 16 ) {
            alert( "Provide 16 Digit Card Number !" );
            
            return false;
         }

         var numbers = /^[0-9]+$/;
         if(myForm.cardnumber.value.match(numbers))
	      {
	         if( document.myForm.bdaymonth.value == "" ) {
            alert( "Provide Expire Year & Month !" );
 				 return false;}

         if( document.myForm.cvv.value == "" ) {
            alert( "Provide CVV Number !" );
 
            return false;
         }

          var cardnumberstr1 = document.myForm.cvv.value;
           var n1 = cardnumberstr1.length;

           if(  n1 < 3 ) {
            alert( "Provide 3 Digit CVV !" );
            
            return false;
         }

          var numbers = /^[0-9]+$/;
         if(myForm.cvv.value.match(numbers))
	      {
	         
            return true;
         } else {
         	 alert('Please input numeric characters only');
         	 return false;
         }


	      }else
		      {
		      alert('Please input numeric characters only');}



         


        

     }
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>

<?php } ?>


