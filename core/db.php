<?php

$mysqli = new mysqli("phil1.ukdns.biz", "philg_ark", "Golding042012", "philg_ark", 3306);
if ($mysqli -> connect_errno) {
	echo "Failed to connect to MySQL: (" . $mysqli -> connect_errno . ") " . $mysqli -> connect_error;
}

// Anything past this line should not be edited //

?>