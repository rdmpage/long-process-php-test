<?php

// check status

require_once (dirname(__FILE__) . '/config.inc.php');

$taskid = null;

if (isset($_GET['id']))
{
	$taskid = $_GET['id'];
}

if (!$taskid)
{
	echo "<html><head><title>Error</title></head><body>';
	echo '<h1>No task id provided (use ?id=)</h1>";
	echo '</body></html>';
	exit();
}

$output_filename = $config['tmp'] . $taskid . '.json';

if (!file_exists($output_filename))
{
	echo "<html><head><title>Error</title></head><body>';
	echo '<h1>Status file $output_filename not found!";
	echo '</body></html>';
	exit();
}

$json = file_get_contents($output_filename);

$obj = json_decode($json);

if (!$obj)
{
	echo "<html><head><title>Error</title></head><body>';
	echo '<h1>Status file $output_filename can't be parsed.";
	echo $json;
	echo '</body></html>';
	exit();
}

if ($obj->done)
{
	// we are done so redirect to results page
	header('Location: done.php?id=' . $taskid);
}
else
{
	echo '<!DOCTYPE html>
	<html>
	<head>
	<title>Status</title>
	<meta http-equiv="refresh" content="3" > 
	</head>
	<body>';	
	echo '<h1>Task ' . $taskid . ' is still running</h1>';
	echo '<p>This page automatically refreshes.</p>';	
	echo '</body>
	</html>';
}

?>
