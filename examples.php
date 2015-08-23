<?php
include("api.php");
//Create a Connection and Change Your Nickname To "I am Stupid"
$ts3query = teamspeak_socket_init();
echo teamspeak_socket_send($ts3query,"clientupdate client_nickname=".teamspeak_escape("I am Stupid"));
fclose($ts3query);

//Create a Connection and Printout The Help Page
$ts3query = teamspeak_socket_init();
$line = teamspeak_socket_send($ts3query,"help");
while(get_teamspeak_status($line) == null){
	echo $line;
	$line = fgets($ts3query);
}
fclose($ts3query);
?>