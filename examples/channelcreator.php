<?php
include("api.php");
$ts3query = teamspeak_socket_init();
while(1){
	$rand = rand(100,99999999);
	teamspeak_socket_send($ts3query,"channelcreate channel_name=".$rand);
	sleep(10);
}
fclose($ts3query);
?>