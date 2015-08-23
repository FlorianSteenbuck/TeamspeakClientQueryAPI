<?php
include("api.php");
error_reporting(E_ERROR);
/*
This is a simple ClientQuery Tool
*/
$ts3query = teamspeak_socket_init();
while(1){
	$cmd = trim(fgets(STDIN));
	if($cmd == "close"){
		break;
	}
	$line = teamspeak_socket_send($ts3query,$cmd);
	while(get_teamspeak_status($line) == null){
		echo $line;
		$line = fgets($ts3query);
	}
	echo $line;
}
fclose($ts3query);
?>