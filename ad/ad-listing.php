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
						<a class="navbar-brand" href="../index.html">
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
							<li class="no-pd"><a href="../index.html#!/newSchool" class="addlist"><i class="ti-user" aria-hidden="true"></i>Add A School</a></li>
						</ul>
					</div>
					<!-- /.navbar-collapse -->
				</div>   
			</nav>
			</div>
			<!-- End Navigation -->
			<div class="clearfix"></div>
<section class="title-transparent page-title" style="background:url(assets/img/title-bg.jpg);">
				<div class="container">
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- ================ End Page Title ======================= -->
			
			<!-- ================ Profile Name Section ======================= -->
			<section class="padd-0">
				<div class="container">
					<div class="col-md-12 translateY-60 col-sm-12">
						<!-- General Information -->
						<div class="add-listing-box edit-info mrg-bot-25 padd-bot-30 padd-top-25">
							<div class="listing-box-header">
								<div class="avater-box">
								<img src="assets/img/schoolhub.png" class="img-responsive img-circle edit-avater" alt="" />
								<span class="avater-status status-pulse online"></span>
								</div>
								<h3>School Hub</h3>
								<p>Total Ad Listing</p>
							</div>
						</div>
						<!-- End General Information -->
					</div>
				</div>
			</section>
			<!-- ================ End Profile Name Section ======================= -->
			
			<!-- ================ Start Manage Listing ======================= -->
			<section class="manage-listing padd-top-0">
				<div class="container">
					<div class="col-md-12 col-sm-12">
						<!-- Filter Option -->
						<div class="row">
							<div class="col-md-8">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-xs-3">Sort By:</label>
											<div class="col-xs-9">
												<select class="form-control" disabled>
													<option value="timestamp">Last Updated</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-xs-3">Author:</label>
											<div class="col-xs-9">
												<select class="form-control" disabled>
													<option value="timestamp">Last Updated</option>
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="full-right search-wrapper">
									<input type="search" class="form-control" placeholder="Filter by keyword..." disabled>
								</div>
							</div>
						</div>
						<!-- End Filter Option -->
					
						<!-- Start All Ad List -->
						<?php
								require('paystack/db.php');
								$query = "select tbladverts.id,tbladverts.ad_title,tbladverts.schoolid,tblschools.School_Name,tbladverts.date,tbladverts.ad_duration from tbladverts, tblschools where tblschools.id = tbladverts.schoolid";
								$res = mysqli_query($conn, $query);
						?>
						<div class="row">
							<div class="col-md-12">
								<div class="small-list-wrapper">
								<ul>
									<?php
										while($row = mysqli_fetch_array($res))
										{
											$schoolname = $row['School_Name'];
											$title = $row['ad_title'];
											$date = $row['date'];
											$id = $row['id'];
											echo '<li>
												<div class="small-listing-box light-gray">
													<div class="small-list-img"></div>
													<div class="small-list-detail">
														<h4>'.$schoolname.'</h4>
														<p><a href="#" title="Food & restaurant">'.$title.'</a> |date published:'.$date.'</p>
													</div>
													<div class="small-list-action">
														<a href="ad-detail.php?id='.$id.'" class="light-gray-btn btn-square" data-placement="top" data-toggle="tooltip" title="View Ad"><i class="glyphicon glyphicon-eye-open"></i></a>
														
													</div>
												</div>
											</li>';
										}
									?>
								</ul>
								</div>
							</div>
						</div>
						<!-- End All Listing List -->
					</div>
				</div>
			</section>
			<!-- ================ End Start Manage Listing ======================= -->
			
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
			
			<!-- Slick Slider js-->
			<script src="assets/plugins/slick-slider/slick.js"></script>
			
			<!-- counter js-->
			<script src="assets/plugins/jquery-counter/js/waypoints.min.js"></script>
            <script src="assets/plugins/jquery-counter/js/jquery.counterup.min.js"></script>
			
			<!-- Bootsnav js-->
			<script src="assets/plugins/bootstrap/js/bootsnav.js"></script>
			<script src="assets/js/viewportchecker.js"></script>
			
			<script src="assets/js/jQuery.style.switcher.js"></script>
			
			<!-- Custom Js -->
			<script src="assets/js/custom.js"></script>
			
			
			
			
			
			
			
			
			
		</div>
	</body>

</html>