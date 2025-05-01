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
	<a href="/index.php" class='tabTitle tabHome'>Home</a>
	<a href="/our_beaches/" class='tabTitle tabPage1'>Our Beaches</a>
	<a href="/employment/" class='tabTitle tabPage2'>Employment</a>
	<a href="/forms/" class='tabTitle tabPDFs'>Forms</a>
	<a href="/media/" class='tabTitle tabPDFs'>Media</a>
	<a href="/contact_us/" class='tabTitle tabReports'>Contact Us</a>
	<a href="/staff_login/" class='tabTitle tabLogin'>Staff Login</a>
</div>
<!-- End Navigation Tabs -->
<!--Begin index content-->
		
		<div class="myPageContent">
<!DOCTYPE html><h1 style="text-align: center;">Reports</h1><div class="myTextBox"><h2>Reports Form</h2><p>No nonsense, no outside links, as simple as this. The request is uploaded to our system and our guards are texted to respond as soon as possible.</p><form action="post.php" method="post"><table><tbody><tr><th>Name</th><td><input type="text" name="name" size="25" maxlength="35" autocomplete="off" value=""></td></tr><tr><th>Beach</th><td><select name="options" id="options" autocomplete="off"><option value="civic">Civic Beach</option><option value="ptlookout">Point Lookout Beach</option><option value="malibu">Malibu Shore Club Beach</option><option value="nickerson">Nickerson Beach</option><option value="mushrooms">Lido Beach (Mushrooms)/The Shore</option><option value="mushrooms">Lido Beach Estates</option><option value="lidowest">Lido West Beach</option><option value="EAB">East Atlantic Beach</option><option value="mushrooms">Lido Beach (Mushrooms)/The Shore</option><option value="" selected="selected"></option></select></td></tr><tr><th>Subject</th><td><input style="float:left;" type="text" name="subject" size="25" maxlength="100" autocomplete="off"><input accesskey="s" style="margin-left:2px;" type="submit" name="post" value="Submit"></td></tr><tr><th>Description</th><td><textarea name="body" id="body" rows="5" cols="50"></textarea></td></tr><tr><th>File Upload</th><td><input type="file" name="file_multiple[]" id="upload_file" multiple/><script type="text/javascript">if (typeof init_file_selector !== "undefined") { var iOS_ifs = !!navigator.platform && /iPad|iPhone|iPod/.test(navigator.platform); if(!iOS_ifs) { init_file_selector({{ config.max_images }}); } }</script></td></tr></tbody></table></form></div>
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
