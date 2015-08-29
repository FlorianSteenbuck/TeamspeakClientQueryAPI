<?php
include("api.php");
$ts3query = teamspeak_socket_init();
while(1){
	teamspeak_socket_send($ts3query,"clientupdate client_is_channel_commander=0\n");
	usleep(100000);
	teamspeak_socket_send($ts3query,"clientupdate client_is_channel_commander=1\n");
	usleep(100000);
}
fclose($ts3query);
?>