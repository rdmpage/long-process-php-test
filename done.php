<?php

// task done

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

echo '<!DOCTYPE html>
<html>
<head>
</head>
<body>';

echo '<h1>Task ' . $taskid . ' is done!</h1>';

echo '<p>' . $output_filename . '</p>';

echo '<p>Here are the results.</p>';
echo '<pre>';
print_r($obj);
echo '</pre>';

echo '<p><a href=".">Try another task</a></p>';

echo '</body>
</html>';

?>
