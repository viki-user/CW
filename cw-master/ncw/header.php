<?php
session_start() ;
error_reporting(0) ;
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'ncw');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
$usr= $_SESSION['login_user'] ;
$sql = "SELECT isadmin FROM users WHERE username = '$usr' ";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$r = $row['isadmin'] ;
?>
<!DOCTYPE html PUBLIC "-//W3c//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/dxhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>CORRESPONDANCE WORLD</title>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/ncw/stylesheets/header.css">
	<link rel="stylesheet" type="text/css" href="/ncw/stylesheets/common.css">
	<link rel="stylesheet" type="text/css" href="/ncw/stylesheets/footer.css">
	<link href="https://fonts.googleapis.com/css?family=Kalam:700" rel="stylesheet">
</head>
<body>
	<!-- CORRESPONDANCE PORTAL -->
	<div class="head-logo" align="center">
		<div class="titlebody">
			<img src="/ncw/images/logo.png">
			<span><a href="/ncw/home.php" id="headlink"><h1>CORRESPONDANCE WORLD</h1></a></span>
		</div>
	</div>
	<div id="container">
		<div id="side-bar">
			<button class="accordion">APPLICATIONS</button>
				<div class="panel">
				<ul class="panel-ul">
					<li class="acc-link"><a class="acc-a" href="/ncw/applications/submit_applications.php">SUBMIT APPLICATIONS</a></li>
					<li class="acc-link"><a class="acc-a" href="/ncw/applications/view_applications.php">VIEW PREVIOUS APPLICATIONS</a></li>
					<!--<li class="acc-link"><a class="acc-a" href="#">APOLOGY</a></li>-->
					<!--<li class="acc-link"><a class="acc-a" href="#">ATTENDENCE</a></li>-->
				</ul>
				</div>
			<button class="accordion">NOTICES</button>
				<div class="panel">
				<ul class="panel-ul">
					<li class="acc-link"><a class="acc-a" href="/ncw/notices/view_notices.php">VIEW NOTICES</a></li>
					<li class="acc-link" <?php if($r==0){ echo 'style="display:none"' ;}?>><a class="acc-a" href="/ncw/notices/new_notice.php">NEW/UPDATE NOTICES</a></li>
					<!--<li class="acc-link"><a class="acc-a" href="#">CO-CURRICULAR</a></li>-->
					<!--<li class="acc-link"><a class="acc-a" href="#">EXTRA-CURRICULAR</a></li>-->
					<!--<li class="acc-link"><a class="acc-a" href="#">SOCIETY RECURITMENT</a></li>-->
				</ul>
				</div>
			<button class="accordion">FORMS</button>
				<div class="panel">
				<ul class="panel-ul">
					<li class="acc-link"><a class="acc-a" href="/ncw/forms/all-forms.php">FILL FORMS</a></li>
					<li class="acc-link" <?php if($r==0){ echo 'style="display:none"' ;}?>><a class="acc-a" href="/ncw/forms/new_form.php">NEW FORM LINK</a></li>
					<!--<li class="acc-link"><a class="acc-a" href="#"></a></li>-->
					<!--<li class="acc-link"><a class="acc-a" href="#">UDDESHYA</a></li>-->
				</ul>
				</div>
				<a class="logout" href="/ncw/scripts/logout.php">LOGOUT</a>
			</div>
