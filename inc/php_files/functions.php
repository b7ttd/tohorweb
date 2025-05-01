<?php
require 'instance-config.php';

/*
 *  Copyright (c) 2010-2013 Tinyboard Development Group
 */

/*
 * ========================
 *  General/misc functions
 * ========================
 */

function _syslog($priority, $message) {
	if (isset($_SERVER['REMOTE_ADDR'], $_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI'])) {
		// CGI
		syslog($priority, $message . ' - client: ' . $_SERVER['REMOTE_ADDR'] . ', request: "' . $_SERVER['REQUEST_METHOD'] . ' ' . $_SERVER['REQUEST_URI'] . '"');
	} else {
		syslog($priority, $message);
	}
}

function writetosys($staff){
	global $config;
	if (($handle = fopen($csvFile, 'r')) !== false) {
        	// Read CSV header
        	$header = fgetcsv($handle);

        	// Loop through rows to find the user
        	while (($data = fgetcsv($handle)) !== false) {
            	$storedUsername = $data[0];
            	$storedPasswordHash = $data[1];
		}
	}
	// Close that shit, no memory leak
	fclose($handle);
}
function checkMd5Exec(bool $can_exec) {
	$shell_out = shell_exec("pwd");
	$shell_out = shell_exec('echo "vichan" | md5sum');
	$shell_ok = $shell_out == "141225c362da02b5c359c45b665168de  -\n";
	$result = $can_exec && $shell_ok;
	return $result;
}

function checkGifsicle() {
	$shell_out = shell_exec('echo $PATH');
	$shell_out = shell_exec('gifsicle --help');
	$shell_out = shell_exec('which gifsicle');
	return $shell_out;
}

function buildIndex($global_api = "no") {
	global $config;


	$pages = null;
	$antibot = null;


	for ($page = 1; $page <= $config['max_pages']; $page++) {
		$filename = $board['dir'] . ($page == 1 ? $config['file_index'] : sprintf($config['file_page'], $page));
		$jsonFilename = $board['dir'] . ($page - 1) . '.json'; // pages should start from 0

		$wont_build_this_page = $config['try_smarter'] && isset($build_pages) && !empty($build_pages) && !in_array($page, $build_pages);

		if ((!$config['api']['enabled'] || $global_api == "skip") && $wont_build_this_page)
			continue;

		$action = generation_strategy('sb_board', array($board['uri'], $page));
		if ($action == 'rebuild' || $catalog_api_action == 'rebuild') {
			$content = index($page, false, $wont_build_this_page);
			if (!$content)
				break;

			// Tries to avoid rebuilding if the body is the same as the one in cache.
			if ($config['cache']['enabled']) {
				$contentHash = md5(json_encode($content['body']));
				$contentHashKey = '_index_hashed_'. $board['uri'] . '_' . $page;
				$cachedHash = cache::get($contentHashKey);
				if ($cachedHash == $contentHash){
					if ($config['api']['enabled']) {
						// this is needed for the thread.json and catalog.json rebuilding below, which includes all pages.
						$catalog[$page-1] = $content['threads'];
					}
					continue;
				}
				cache::set($contentHashKey, $contentHash, 3600);
			}

			// json api
			if ($config['api']['enabled']) {
				$threads = $content['threads'];
				$json = json_encode($api->translatePage($threads));
				file_write($jsonFilename, $json);

				$catalog[$page-1] = $threads;

				if ($wont_build_this_page) continue;
			}

			if ($config['try_smarter']) {
				$antibot = create_antibot($board['uri'], 0 - $page);
				$content['current_page'] = $page;
			}
			elseif (!$antibot) {
				$antibot = create_antibot($board['uri']);
			}
			$antibot->reset();
			if (!$pages) {
				$pages = getPages();
			}
			$content['pages'] = $pages;
			$content['pages'][$page-1]['selected'] = true;
			$content['btn'] = getPageButtons($content['pages']);
			$content['antibot'] = $antibot;

			file_write($filename, Element('index.html', $content));
		}
		elseif ($action == 'delete' || $catalog_api_action == 'delete') {
			file_unlink($filename);
			file_unlink($jsonFilename);
		}
	}

	// $action is an action for our last page
	if (($catalog_api_action == 'rebuild' || $action == 'rebuild' || $action == 'delete') && $page < $config['max_pages']) {
		for (;$page<=$config['max_pages'];$page++) {
			$filename = $board['dir'] . ($page==1 ? $config['file_index'] : sprintf($config['file_page'], $page));
			file_unlink($filename);

			if ($config['api']['enabled']) {
				$jsonFilename = $board['dir'] . ($page - 1) . '.json';
				file_unlink($jsonFilename);
			}
		}
	}

	// json api catalog
	if ($config['api']['enabled'] && $global_api != "skip") {
		if ($catalog_api_action == 'delete') {
			$jsonFilename = $board['dir'] . 'catalog.json';
			file_unlink($jsonFilename);
			$jsonFilename = $board['dir'] . 'threads.json';
			file_unlink($jsonFilename);
		}
		elseif ($catalog_api_action == 'rebuild') {
			$json = json_encode($api->translateCatalog($catalog));
			$jsonFilename = $board['dir'] . 'catalog.json';
			file_write($jsonFilename, $json);

			$json = json_encode($api->translateCatalog($catalog, true));
			$jsonFilename = $board['dir'] . 'threads.json';
			file_write($jsonFilename, $json);
		}
	}

	if ($config['try_smarter'])
		$build_pages = array();
}
/*
 * ======================
 * Math Funcs
 * ======================
 */
function hcf($a, $b){
	$gcd = 1;
	if ($a>$b) {
		$a = $a+$b;
		$b = $a-$b;
		$a = $a-$b;
	}
	if ($b==(round($b/$a))*$a) 
		$gcd=$a;
	else {
		for ($i=round($a/2);$i;$i--) {
			if ($a == round($a/$i)*$i && $b == round($b/$i)*$i) {
				$gcd = $i;
				$i = false;
			}
		}
	}
	return $gcd;
}

function fraction($numerator, $denominator, $sep) {
	$gcf = hcf($numerator, $denominator);
	$numerator = $numerator / $gcf;
	$denominator = $denominator / $gcf;

	return "{$numerator}{$sep}{$denominator}";
}

/*
 * =======================
 * Login related functions
 * =======================
 */

function makeuser($username, $password) {
	global $config;
	$salt = substr(base64_encode(sha1(rand() . time(), true) 
		. $config['cookies'] ['salt']), 0, 15);
	// generate salt, encodes random hash number and returns first 15 digits
	 
	$password = md5($password . $salt);
	// append it to db
	$csvFile = $config['dbpath'];
	
	// open it. do i need to make a new post? idk
	// if (($handle = fopen($csvFile,'w') 
}
function login($username, $password) {
    // very bad very basic login func i created to find whether or not 
    // the inputted username and pass r alid.
    global $config;	
    $csvFile = $config['dbpath'];
    // Hash the submitted password for comparison
    $hashedPassword = md5($password);

    // Open and read CSV file
    if (($handle = fopen($csvFile, "r")) !== false) {
        // Read CSV header
        $header = fgetcsv($handle);
        // assign func ggetcsv to data, while it isn't false, iterate and find details
        while (($data = fgetcsv($handle)) !== false) {
            $storedUsername = $data[0];
            $storedPasswordHash = $data[1];

            if ($storedUsername === $username && $storedPasswordHash === $hashedPassword) {
                // these two are the session cookies
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['authenticated'] = true;

                // Redirect to the dashboard
                header("Location: /templates/mod/dashboard.php");
                exit;
            }
        }
        fclose($handle);
    }

    // If no match, return false
    return false;
}

function destroyCookies() {
	// logout
	session_start();
	$_SESSION['authenticated'] = false;
	echo "get fucked";
	header("Location: /templates/index.php");
	exit;	
}
/*
 * =======================
 * Event Functions
 * =======================
 */
function event() {
	global $events;
	
	$args = func_get_args();
	
	$event = $args[0];
	
	$args = array_splice($args, 1);
	
	if (!isset($events[$event]))
		return false;
	
	foreach ($events[$event] as $callback) {
		if (!is_callable($callback))
			error('Event handler for ' . $event . ' is not callable!');
		if ($error = call_user_func_array($callback, $args))
			return $error;
	}
	
	return false;
}

function event_handler($event, $callback) {
	global $events;
	
	if (!isset($events[$event]))
		$events[$event] = array();
	
	$events[$event][] = $callback;
}

function reset_events() {
	global $events;
	
	$events = array();
}


