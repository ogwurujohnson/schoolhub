<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<?php
	$id = $_GET['id'];
?>

<html class="no-js" lang="zxx">
	
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="robots" content="index,follow">

    <title>School Hub</title>

    <!-- Bootstrap Core CSS -->
	<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
	
	<!-- Bootstrap Select Option css -->
	<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap-select.min.css">
	
    <!-- Icons -->
    <link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet">
	<link href="assets/plugins/themify-icons/css/themify-icons.css" rel="stylesheet">
	<link href="assets/plugins/line-icons/css/line-font.css" rel="stylesheet">
    
    <!-- Animate -->
    <link href="assets/plugins/animate/animate.css" rel="stylesheet">
    
    <!-- Bootsnav -->
    <link href="assets/plugins/bootstrap/css/bootsnav.css" rel="stylesheet">	
    
    <!-- Custom style -->
    <link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/responsiveness.css" rel="stylesheet">
	<link  type="text/css" rel="stylesheet" id="jssDefault" href="assets/css/colors/main.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    
	</head>
	<body>
		<div class="wrapper">  
			<!-- ================ Start Invoice ======================= -->
			<?php
				require('paystack/db.php');
				$query = "select tbladverts.id,tbladverts.ad_title,tbladverts.ad_duration,tbladverts.contact_email,tbladverts.contact_phone,tbladverts.ad_description,tbladverts.schoolid,tblschools.School_Name,tblschools.Email,tblschools.Address,tblschools.Country,tblschools.Website,tblschools.Phone_Number,tbladverts.date,tbladverts.ad_duration from tbladverts, tblschools where tblschools.id = tbladverts.schoolid && tbladverts.id = $id";
				$res = mysqli_query($conn, $query);
				while($row = mysqli_fetch_array($res))
					{
						$schoolname = $row['School_Name'];
						$title = $row['ad_title'];
						$description = $row['ad_description'];
						$date = $row['date'];
						$id = $row['id'];
						$email = $row['contact_email'];
						$phone = $row['contact_phone'];
						$duration = $row['ad_duration'];
						$schoolphone = $row['Phone_Number'];
						$schoolemail = $row['Email'];
						$address = $row['Address'];
						$country = $row['Country'];
						$website = $row['Website'];
					}
			?>
			<section class="list-detail">
				<div class="container">
					<div class="detail-wrapper padd-top-30 padd-bot-30">
						<div class="row text-center">
							<a href="javascript:window.print()" class="btn theme-btn-trans">Print Advert</a>
						</div>
						<div class="row mrg-0">
							<div class="col-md-6">
								<div id="logo"><img src="assets/img/logo.png" class="img-responsive" alt=""></div>
							</div>

							<div class="col-md-6">	

								<p id="invoice-info">
									<strong>Published date:</strong> <?php echo $date; ?> <br>
									Due <?php echo $duration ?> from date of publication
								</p>
							</div>
						</div>
						<div class="row  mrg-0 detail-invoice">
							<div class="col-md-12">
								<h2>Job Advert</h2>
							</div>
							<div class="row mrg-0">
							  <div class="col-lg-7 col-md-7 col-sm-7">
							  
								<h4>Provider: </h4>
								<h5>School Hub</h5>
								<p>
									info@schoolhub.com<br />
									
									+234-8033525155<br />
									
									780/77 , Jos, Plateau,
									<br /> Nigeria
								</p>
								
							  </div>
							  <div class="col-lg-5 col-md-5 col-sm-5">
								<h4>Job Advertiser Contact :</h4>
								<h5><?php echo $schoolname; ?></h5>
								<p>
									<?php echo $email;?><br />
									
									<?php echo $phone;?><br />
									
									<?php echo $address;?>,
									<br /> <?php echo $country;?>
								</p>
							  </div>
							</div>
							<div class="row mrg-0">
							  <div class="col-lg-6 col-md-6 col-sm-6">
								<strong>Job Description and Advice:</strong>
							  </div>
							</div>
							<hr />
							<div class="row mrg-0">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<h5>Job Title:</h5><?php echo $title ?>
									<hr>
									<div>
										<h5>Job Description:</h5> <?php echo $description ?>
									</div>
									<hr>
									<div>
										<h4>Please in cases of uncertaintity please contact school: <?php echo $schoolemail ?> or call: <?php echo $schoolphone ?> </h4>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</section>
			<!-- ================ End Invoice ======================= -->
			
			

			
			<!-- START JAVASCRIPT -->
			<!-- Jquery js-->
			<script src="assets/js/jquery.min.js"></script>
			
			<!-- Bootstrap js-->
			<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
			
			<!-- Bootsnav js-->
			<script src="assets/plugins/bootstrap/js/bootsnav.js"></script>
			<script src="assets/js/viewportchecker.js"></script>
			
			<!-- Slick Slider js-->
			<script src="assets/plugins/slick-slider/slick.js"></script>
			
			<!-- counter js-->
			<script src="assets/plugins/jquery-counter/js/waypoints.min.js"></script>
            <script src="assets/plugins/jquery-counter/js/jquery.counterup.min.js"></script>
			
			<!-- bootstrap Select js-->
			<script src="assets/plugins/bootstrap/js/bootstrap-select.min.js"></script>
			
			<script src="assets/js/jQuery.style.switcher.js"></script>
			
			<!-- Custom Js -->
			<script src="assets/js/custom.js"></script>
			
			
			
			
			
		</div>
	</body>

</html>