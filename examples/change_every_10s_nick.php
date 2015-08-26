<?php
include("../api.php");
//change every 10 seconds your name to a random name
$names = array("I am Stupid","I am not Stupid","Whatever");
$lastname = "";
$ts3query = teamspeak_socket_init();
while (1) {
	$name = $names[rand(0,count($names)-1)];
	while ($lastname == $name) {
		$name = $names[rand(0,count($names)-1)];
	}
	echo teamspeak_socket_send($ts3query,"clientupdate client_nickname=".teamspeak_escape($name));
	$lastname = $name;
	sleep(10);
}
fclose($ts3query);
?>