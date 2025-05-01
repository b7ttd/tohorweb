<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require '/srv/http/tohorweb/inc/instance-config.php';
require_once '/srv/http/tohorweb/inc/functions.php';

//if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['logout'])){destroyCookies();}
	
//if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
    // If user is not authenticated, redirect to the login page
//    header("Location: /templates/login.php");
//    exit;
//}
?>

<html>
<head>
	<title>
	<?php echo $config['web_title'];?>
	</title>
	<?php if (isset($config['web_icon'])):?>
	<link rel = "icon" href="<?php echo $config['web_icon']?>" type = "images/x-icon">
	<?php endif?>
	<?php if (isset($config['web_description'])):?>
		<meta name="description" content="<?php echo $config['web_description']?>">
	<?php endif?>
	<?php if (isset($config['web_keywords'])):?>
  		<meta name="keywords" content='<?php echo $config['web_keywords']?>'>
	<?php endif?>
  	<meta name="author" content="b7ttd">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" type="text/css" href="../static/styles.css">
</head>
<body id='Home'>
		<div class="myPageWrapper">
			<div class="myPage" style="min-height:120vh;">
				<h1 style="text-align:center;">Mod Dashboard</h1>
					<div class="myCol myLeft myBlueBox" style:"border-radius:20px;">
					<h2>Reports and Complaints</h2>
					Access complaints we have received.
					<p><a href="/templates/page1.php" class="myLinkButton">Read more...</a></p>
				</div>
				<div class="myCol myRight myBlueBox">
					<h2>Upload Media</h2>
					Upload media to the site.
					<p><a href="/templates/page2.php" class="myLinkButton">Read more...</a></p>
				</div>
				<div class="myCol myLeft myBlueBox">
					<h2>View Lifeguard Data</h2>
					View the database we keep for the guards.
					<p><a href="/database.php" class="myLinkButton">Read more...</a></p>
				</div>
				<div class="myCol myRight myBlueBox">
					<h2>Logout</h2>
					Safe logout button.
					<form action="dashboard.php" method="post">
						<input type="submit" name="logout" value="Logout"/>
					</form>
				</div>
				<div class="myCol myBlueBox">
					<h2>Make an announcement</h2>
					Make an anouncement to the website.
					<p><a href="/templates/reports.php" class="myLinkButton">Read more...</a></p>
		</div> <!--endOfPage-->
</div><!--endOfPageWrapper-->
</body>
</html>
