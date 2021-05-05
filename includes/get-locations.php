<?php

require 'dbhandler.php';

try {

	$db = new PDO("mysql:host=$servename;dbname=$DBname", $DBuname, $DBPass);

	$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

	$sth = $db->query("SELECT * FROM activities");

	$activities = $sth->fetchAll();

	echo json_encode( $activities );

} catch (Exception $e) {
echo $e->getMessage();
}
