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

  <?php
    $csvFile = fopen("lgdata.csv","w") or die("Unable to open file!");
    $db = new SQLite3('/srv/http/tohorweb/tmp/website.db');
    $results = $db->query('SELECT * FROM lgdata;');
    $array = $results->fetchArray(); $str_var="";
    echo var_dump($array);
    for($i=0;$i<count($array);$i++){
    	$str_var = $str_var . $array[$i]; 
    }
	    
    fwrite($csvFile, $str_var);
    $csvFile = fopen('lgdata.csv', 'r');
    echo '<table>';
    while (($data = fgetcsv($csvFile, 1000, ",")) !== FALSE) {
      echo '<tr>';
      foreach ($data as $value) {
        echo '<td>' . htmlspecialchars($value) . '</td>';
      }
      echo '</tr>';
    }
    echo '</table>';

    fclose($csvFile);
	?>

		</div> <!--endOfPage-->
</div><!--endOfPageWrapper-->
</body>
</html>
