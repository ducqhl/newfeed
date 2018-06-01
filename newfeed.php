<?php
	$db = new PDO('mysql:host=localhost:3306;dbname=btcn06;charset=utf8', 'root', '');

	require_once 'functions.php';
	addFeeds();
?>