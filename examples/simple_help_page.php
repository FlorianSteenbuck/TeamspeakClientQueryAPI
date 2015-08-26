<?php
include("../api.php");
//Create a Connection and Printout The Help Page
$ts3query = teamspeak_socket_init();
$line = teamspeak_socket_send($ts3query,"help");
while(get_teamspeak_status($line) == null){
	echo $line;
	$line = fgets($ts3query);
}
fclose($ts3query);
fgets(STDIN);
?>