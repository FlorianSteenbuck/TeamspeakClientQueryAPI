<?php
include("../api.php");
$ts3query = teamspeak_socket_init();
$time = 100000;
while(1){
	teamspeak_socket_send($ts3query,"clientupdate client_is_channel_commander=0\n");
	usleep($time);
	teamspeak_socket_send($ts3query,"clientupdate client_is_channel_commander=1\n");
	usleep($time);
}
fclose($ts3query);
?>