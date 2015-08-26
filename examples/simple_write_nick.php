<?php
include("../api.php");
//use the an_write function to create a animation like writing
$name = "I am Stupid";
$ts3query = teamspeak_socket_init();
for ($i=2; $i <= strlen($name); $i++) {
	echo teamspeak_socket_send($ts3query,"clientupdate client_nickname=".teamspeak_escape(an_write($i,$name)));
}
fclose($ts3query);
fgets(STDIN);
?>