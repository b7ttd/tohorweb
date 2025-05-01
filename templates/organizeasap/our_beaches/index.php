<?php 
require '../../inc/instance-config.php';
require '../../inc/functions.php' ;
error_reporting(E_ALL);
ini_set('display_errors','1');
$page="home"; if (isset($_GET['page'])) $page=$_GET['page'];
class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('../../tmp/website.db');
    }
}

$db = new MyDB();
?>
<!DOCTYPE html>
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
	<meta charset="utf-8">
  	<meta name="author" content="b7ttd">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" type="text/css" href="../static/styles.css">
	<link href="https://fonts.googleapis.com/css2?family=Racing+Sans+One&display=swap" rel="stylesheet">
</head>
<body>
<div class="myPageWrapper">
<div class="myPage" style="min-height: <?php echo $db->querySingle('SELECT pixels FROM posts WHERE page="'.$page.'"')?>px;">

<!-- myTabs begins here -->
<div class="container" style="height:410px">
	<!-- Left Section-->
	<div class="left-element">
		<img src="/static/wp-content/CrewTwentyFour.jpg" >
 		<div class="centered-element" style="right:180px; top:20px;">
			<a href="/index.php">
				<img src="/static/wp-content/TownOfHempsteadLogo.ico" width="170" height="150" alt="Logo"/>
			</a>
		</div>
	</div>
	<!-- Right Section -->
	<div class="right-element">
		<h2>Contact Information</h2>
		<p>
			Chief Anthony Romano
			<br>

			Town Park at Point Lookouk
		</p>
		<dl>
			<dt>Office Number:</dt>
			<p> 516-801-5699 </p>
		</dl>
		<h2>Hours of Operation</h2>
		May 26 through Septmeber 20th
		<br>
		10am - 6pm
		<h2>Coverage Area</h2>
		From Jones Inlet to Eastern
		Long Beach.
		<h2>Tides Today</h2>
		The Low Tide for Today is 8:06 AM at 0.61 ft
		<br>
		While the High Tide for today 2:04 PM at 3.29 ft
	</div>
</div>
<!-- Navigation Tabs -->
<div id='myTabs' class="container" style="top:-10px;height: 30px; border: 2px;">
	<a href="/" class='tabTitle tabHome'>Home</a>
	<a href="localhost/our_beaches/" class='tabTitle tabPage1'>Our Beaches</a>
	<a href="localhost/employment/" class='tabTitle tabPage2'>Employment</a>
	<a href="localhost/forms/" class='tabTitle tabPDFs'>Forms</a>
	<a href="localhost/media/" class='tabTitle tabPDFs'>Media</a>
	<a href="localhost/contact_us/" class='tabTitle tabReports'>Contact Us</a>
	<a href="localhost/staff_login/" class='tabTitle tabLogin'>Staff Login</a>
</div>
<!-- End Navigation Tabs -->
<!--Begin index content-->
		
		<div class="myPageContent">
<h1>Beaches of the Town</h1><div class="myTextBox"><p>Some of Long Islandss most beautiful South Shore beaches are located in the Town of Hempstead. Ocean beaches at Point Lookout,Lido,and Lido West areopen from Memorial Day weekend through Labor Day. In addition to its four beaches along the Atlantic shoreline, the town also operates a bay beach at Hewlett Point Park in Bay Park and a small beachfront along Hog Island Channel in the community of Harbor Isle. <a href= http://www.lishore.org/jones/latest.php>Photos from the latest at Point Lookout.</a></p></div>
		</div>
<!-- Begin footer content -->
<hr>
<br>
<a href='https://instagram.com/tohoceanlifeguards?igsh=MW5wemc3ZHBjZWxxdw=='><img src='https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Flogos-world.net%2Fwp-content%2Fuploads%2F2020%2F06%2FInstagram-Logo-120x67.png&f=1&nofb=1&ipt=2e1d633f50db8d7142f6e884fed0fb0486388c4ce83d774e90e9ec7aedffe614&ipo=images' alt="InstagramLogo"/></a>
<a href='https://www.facebook.com/groups/144084575830/'><img height="75"src='https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn.icon-icons.com%2Ficons2%2F91%2FPNG%2F128%2Ffacebook_16423.png&f=1&nofb=1&ipt=152e977ae5e4538668148453bf4324d4b5906b872af0e0bf2ee82aafbb9094b6&ipo=image' alt="FacebookLogo"/></a>
<div class="myFooter">
	<div style="text-align: left;"> &copy; 2024 Town of Hempstead Ocean Rescue. All Rights Reserved. Original Web design by <a href="https://github.com/elsaburren/website" class="myLink" target="_blank">Elsa Burren</a>, forked by <a href="https://github.com/b7ttd/tohorweb" class="myLink" target="_blank">Daniel Butt</a>
		<h5 style='text-align:center;'>Direct all questions to buttdann84@gmail.com</h5>
	</div>
</div>
<!--created by Elsa Burren-->
</div>
</html>
		</div><!--endOfPageContent-->
	</div> <!--endOfPage-->
</div><!--endOfPageWrapper-->
</body>
</html>
