<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="zxx" ng-app="schoolApp">
	
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
	
	<!-- Slick Slider -->
    <link href="assets/plugins/slick-slider/slick.css" rel="stylesheet">
	
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
   

    <script src="assets/js/angular.min.js"></script>
    <script src="assets/js/angular-route.js"></script>
    <script src="assets/js/angular-file-upload.js"></script>
    <script src="assets/js/routing.js"></script>
    <script src="assets/js/factory.js"></script>
	<script src="assets/js/form-step.js"></script>
    <script src="assets/js/app.js"></script>
</head>
<body>
<div class="wrapper">  
			<!-- Start Navigation -->
			<nav class="navbar navbar-default navbar-fixed navbar-transparent white bootsnav">
				<div class="container-fluid">         
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
						<i class="ti-align-left"></i>
					</button>
					
					<!-- Start Header Navigation -->
					<div class="navbar-header">
						<a class="navbar-brand" href="index.html">
							<img src="assets/img/logo-white.png" class="logo logo-display" alt="">
							<img src="assets/img/logo.png" class="logo logo-scrolled" alt="">
						</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="navbar-menu">
						<ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
							<li><a class="page-scroll" href="../index.html#!/schoolLeaderBoard">LeaderBoard</a></li>
							<li><a class="page-scroll" href="index.php">Create Ad</a></li>
							<li><a class="page-scroll" href="ad-listing.html">View All Ad's</a></li>
							<li><a class="page-scroll" href="#">About</a></li>
							<li><a class="page-scroll" href="../index.html#!/privacy">Privacy Policy</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
							<li class="no-pd"><a href="#!/newSchool" class="addlist"><i class="ti-user" aria-hidden="true"></i>Add A School</a></li>
						</ul>
					</div>
					<!-- /.navbar-collapse -->
				</div>   
			</nav>
			</div>
			<!-- End Navigation -->
			<div class="clearfix"></div>
<section class="title-transparent page-title" style="background:url(assets/img/ad.jpg);">
				<div class="container">
					<div class="title-content">
						<h1>Create Advert</h1>
						<div class="breadcrumbs">
							<a href="#">Home</a>
							<span class="gt3_breadcrumb_divider"></span>
							<span class="current">Create Advert</span>
						</div>
					</div>
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- Page Title -->
			
			<!-- ================ Create Advert ======================= -->
			<section>
				<div class="container">
					<div class="col-md-10 col-md-offset-1">
						<div class="add-listing-box general-info mrg-bot-25 padd-bot-30 padd-top-25">
							<div class="listing-box-header">
								<i class="ti-shopping-cart theme-cl"></i>
								<h3>Create Your Advertisements</h3>
								<p>Write something a general information about your Ad</p>
							</div>
							<?php
								require('paystack/db.php');
								$query = "select * from tblschools";
								$res = mysqli_query($conn, $query);
								
							?>
							<form name = "adForm">
							<script type="text/javascript" src="assets/js/jquery.min.js"></script>
							<script src="https://js.paystack.co/v1/inline.js"></script>
								<div class="extra-field-box">
									<div class="multi-box">	
										<div class="dublicat-box mrg-bot-40">
											<div class="row mrg-0">
												<div class="col-md-12 col-sm-12">
													<label>Select School*</label>
													<select id="schoolid" type="text" class="form-control" required>
														<option selected disabled>Select School</option>
														<?php
														while($row = mysqli_fetch_array($res))
														{
															$schoolname = $row['School_Name'];
															$schoolid = $row['id'];
															echo '<option value="'.$schoolid.'">'.$schoolname;
														}   
															
														?>
														</option>
													</select>
												</div>
											</div>
											<div class="row mrg-0">
												<div class="col-md-12 col-sm-12" ng-class="{ 'has-error' : adForm.adtitle.$invalid && !adForm.adtitle.$pristine }">
													<label>Ad Title*</label>
													<input type="text" id="title" name ="adtitle" ng-model = "adtitle" ng-minlength="5" ng-maxlength="40" class="form-control" ng-min placeholder="Ad Title" required>
													<p ng-show="adForm.adtitle.$error.minlength" class="help-block">Ad Title is too Short.</p>
													<p ng-show="adForm.adtitle.$error.maxlength" class="help-block">Ad Title is too Long.</p>
												</div>
											</div>
											<div class="row mrg-0">
												<div class="col-md-6 col-sm-6">
													<label>Price*</label>
													<input type="text" id="amount" value="500000" class="form-control" placeholder="5000" required disabled>	
												</div>
												<div class="col-md-6 col-sm-6">
													<label>Ad Duration*</label>
													<select id="duration" class="form-control" placeholder="Month" required>
														<option selected disabled>Select Duration</option>
														<option value="24hours">24 hours</option>
														<option value="2days">2 Days</option>
														<option value="4days">4 Days</option>
														<option value="1week">1 Week</option>
														<option value="2weeks">2 Weeks</option>
														<option value="1month">1 Month</option>
														<option value="2months">2 Months</option>
													</select>
												</div>
											</div>
											<div class="row mrg-0">
												<div class="col-md-12 col-sm-12">
													<label>Description*</label>
													<textarea id="description" class="form-control height-120" placeholder="Ad Description" required></textarea>
												</div>
											</div>
											<div class="row mrg-0">
												<div class="col-md-12 col-sm-12" ng-class="{ 'has-error' : adForm.adtitle.$invalid && !adForm.adtitle.$pristine }">
													<label>Email*</label>
													<input type="email" name="email" ng-model = "email" id="email" class="form-control" placeholder="Contact Email" required>
													<p ng-show="adForm.email.$invalid && !adForm.email.$pristine" class="help-block">Invalid Email Format.</p>
												</div>
											</div>
											<div class="row mrg-0">
												<div class="col-md-12 col-sm-12">
													<label>Phone*</label>
													<input id="phone" type="tel" class="form-control" placeholder="Contact Phone" required>
												</div>
											</div>
										</div>
									</div>									
									<div class="text-center"><button type="submit" ng-disabled="adForm.$invalid" class="btn theme-btn" onclick="payWithPaystack()">Create Ad</button></div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>
			<!-- ================ End Create Pricing  ======================= -->
			<script>

				function usersAmount(){
						return document.getElementById("amount").value;
				}
				var pay_amount = document.getElementById("amount").value;
				function usersEmail(){
					return document.getElementById("email").value;
				}
				var email = usersEmail();
				function usersPhone(){
					return document.getElementById("phone").value;
				}
				var phone = usersPhone();
				function adTitle(){
					return document.getElementById("title").value;
				}
				var title = adTitle();
				function adDescription(){
					return document.getElementById("description").value;
				}
				var description = adDescription();
				function adDuration(){
					return document.getElementById("duration").value;
				}
				var duration = adDuration();
				function schoolId(){
					return document.getElementById("schoolid").value;
				}
				var schoolid = schoolId();
				var variable = 'SchoolHub - '+Math.floor((Math.random() * 1000000000) + 1);
				
				function payWithPaystack(){
					var handler = PaystackPop.setup({
					key: 'pk_test_cfc7b44c08d96a3a09e37e046a670266b7e2615c',
					email: usersEmail(),
					amount: usersAmount(),
					ref: variable, // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
					metadata: {
						custom_fields: [
							{
								display_name: "Mobile Number",
								variable_name: "mobile_number",
								value: usersPhone()
							}
						]
					},
					callback: function(response){
						window.location = "paystack/entry.php?email="+usersEmail()+"&amount="+usersAmount()+"&schoolid="+schoolId()+"&duration="+adDuration()+"&description="+adDescription()+"&title="+adTitle()+"&phone="+usersPhone()+"&refid="+variable;
					},
					onClose: function(){
						alert('window closed');
					}
					});
					handler.openIframe();
				}
			</script>
			<!-- ================ Start Footer ======================= -->
			<footer class="footer dark-bg">
				<div class="row padd-0 mrg-0">
					<div class="footer-text">
					</div>
				</div> 
				<div class="footer-copyright">
					<p>Copyright@ 2018 School Hub Developed By <a href="#" title="School Hub" target="_blank">Team We Grey</a></p>
				</div>
			</footer>
			<!-- ================ End Footer Section ======================= -->
			
			
			
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
			
			<script src="assets/js/jQuery.style.switcher.js"></script>
			
			<!-- Custom Js -->
			<script src="assets/js/custom.js"></script>
			
			<script>
				function openRightMenu() {
					document.getElementById("rightMenu").style.display = "block";
				}
				function closeRightMenu() {
					document.getElementById("rightMenu").style.display = "none";
				}
			</script>
			
			<script type="text/javascript">
				$(document).ready(function() {
					$('#styleOptions').styleSwitcher();
				});
			</script>
			
		</div>
	</body>

</html>