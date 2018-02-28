<?php
	require('db.php');
	$amount = $_GET['amount'];
	$email = $_GET['email'];
	$school_id = $_GET['schoolid'];
	$duration = $_GET['duration'];
	$description = $_GET['description'];
	$title = $_GET['title'];
	$phone = $_GET['phone'];
	$refid = $_GET['refid'];
	
	//modified paystack code
	$query = "INSERT into tbladverts (payment_id,schoolid,ad_title,ad_description,contact_email,contact_phone,ad_duration,ad_cost) 
	VALUES ('$refid','$school_id','$title','$description','$email','$phone','$duration','$amount')";
	$insert_v = mysqli_query($conn,$query);

	if ($insert_v){
		header('Location:  http://localhost/schoolhub/ad/ad-listing.php');
	}
?>