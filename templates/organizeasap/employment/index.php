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
<div class="myPage" style="min-height: 2020px;">

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
	<a href="/our_beaches" class='tabTitle tabPage1'>Our Beaches</a>
	<a href="/index.php?page=employment" class='tabTitle tabPage2'>Employment</a>
	<a href="/index.php?page=forms" class='tabTitle tabPDFs'>Forms</a>
	<a href="/index.php?page=media" class='tabTitle tabPDFs'>Media</a>
	<a href="/index.php?page=contact_us" class='tabTitle tabReports'>Contact Us</a>
	<a href="/index.php?page=staff_login" class='tabTitle tabLogin'>Staff Login</a>
</div>
<!-- End Navigation Tabs -->
<!--Begin index content-->
		
		<div class="myPageContent">
	<div class="myRow">
		<h1>Employment</h1>
		</div>
		<div class="myRow">
			<div class="myTextBox">
		<h2>Be a lifeguard</h2>How often in life can you make a real difference? TOH Ocean Rescue lifeguards can and do make an everyday difference to their communities. Not everyone is up to the challenge. Imagine testing your own limits on a daily basis, mentally and physically. Growing more confident each day as you rise to each challenge. The job provide you with opportunities to make friends for life who have risen to the challenge with you. Past uards have taken the rise-to-the-challenge mentality with them to achieve accolades in industries’ within Long Island, Nationally, and Internationally.</div></div><div class="myTextBox"><h2>Pre-Requisites</h2>Any person to be employed as a lifeguard at a bathing beach or swimming pool, under the jurisdiction of the Nassau Country Department of Health, must possess an appropriate current lifeguard certification issued by the Nassau County Department of Parks, Recreation and Museums.<h4>Medical Examinations</h4>A current medical examination is required before testing for any grade. Your medical exam is valid for one (1) year only from the date of the medical exam. The qualifications and requirements for certification in each grade are as follows:<h4>Stuff</h4>Applicant must be at least 16 years of age at the time of the test. All applicants must possess an American Red Cross Basic Lifeguard Certificate or a New York State Department of Health accepted equivalent. Applicant must also be in satisfactory medical condition and have visionof at least 20/40 in one eye, without corrective lens. Hearing loss in either ear does not exceed 25db between 500 and 2,000 Hz, 40 db at 3,000 Hz and 45db at 4,000 Hz. The medical examination must be attested to by a registered physician.<h4>The Performance Test</h4>The Performance Test will consist of: (1) Entrance into the water with a standard shallow dive,followed by a minimum speed test in freestyle - 50 yards in 35 seconds or less,(2) An endurance swim of 200 yards in continuous crawl style in good form (body must be planing the water continuously), within 3:45, (3) Front surface approach for 25 yards, followed by an alternate cross chest carry of a struggling victim for 25 yards, (4) Front and back head hold escapes, (5) 15 yard approach with a piece of equipment (torp or rescue buoy), place equipment on victim and return to starting location. (6) Surface dive in a minimum of 10 feet of water to retrieve a 10 pound weight and bring it to the surface, (7) Witness a demonstration of handling neck and back injuries in shallow and deep water, (8) Written test on lifeguarding. Must receive at least 80% on the test (the questions come from the American Red Cross Lifeguarding Textbook, which you can obtain from the Nassau County Red Cross, 195 Willis Avenue, Mineola, N.Y. 11501 - 747-3500)</div><div class="myTextBox"><h2>The Application</h2>The Aquatic Division will offer a unique screening process program for certified and non-certified persons, 15 years of age and over, interested in working as lifeguards. The screening program will evaluate candidates in a 200-yard swim and interview those who wish to apply for a job with the Town of Hempstead. Employment is not guaranteed. Interviews will be conducted in May, on the 4th, 11th, 18th, and 25th. Please call the Aquatics office for further information on summer employment as a Town of Hempstead Lifeguard at 516-292-9000, ext. 7237.</div><div class="myTextBox"><h2>Who to Talk To</h2><p>Justine Anderson</p><p>Email: <a href="justand@hempteadny.gov">Justine Anderson</a></p>Phone: 516-292-9000, ext. 7239</div>
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
