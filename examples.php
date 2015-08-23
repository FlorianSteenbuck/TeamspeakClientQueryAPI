<?php
include("api.php");
//Create a Connection and Change Your Nickname To "I am Stupid"
$ts3query = teamspeak_socket_init();
echo teamspeak_socket_send($ts3query,"clientupdate client_nickname=".teamspeak_escape("I am Stupid"));
fclose($ts3query);
?>