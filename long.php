<?php

// do something for a while, update a file as we do so

// somewhere web server can write a log file too
require_once (dirname(__FILE__) . '/config.inc.php');

$taskid = null;

if ($argc < 2)
{
	echo "Usage: " . basename(__FILE__) . " <taskid>\n";
	exit(1);
}
else
{
	$taskid = $argv[1];
}

$output_filename = $config['tmp'] . '/' . $taskid . '.json';

// create status object at the start
$obj = new stdclass;
$obj->done = false;
$obj->results = array();

file_put_contents($output_filename, json_encode($obj));

// run process by counting down to 0
$count = 10;

while ($count > 0)
{
	// sleep to simulate doing something
	$rand = rand(1000000, 3000000);
	usleep($rand);
	
	$obj->results[] = $rand;
	 
	$count--;
	$obj->done = ($count == 0);

	file_put_contents($output_filename, json_encode($obj));
}

?>
