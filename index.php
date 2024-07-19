<?php

require_once (dirname(__FILE__) . '/config.inc.php');

echo '<!DOCTYPE html>
<html>
<head>
<title>Start</title>
</head>
<body>';

echo '<h1>Testing running a long process over the web</h1>';

$taskid = uniqid();

$path = dirname(__FILE__) . '/long.php';
$command = $config['php'] . " $path $taskid > /dev/null &";

// this should return straight away, leaving long process still running
exec($command);

echo '<p>Process ' . $taskid . ' is ruuning, <a href="status.php?id=' . $taskid . '" target="_new">check on its status</a></p>';

echo '</body>
</html>';

?>
