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
//use the an_write function to create a animation like writing
$name = "I am Stupid";
$ts3query = teamspeak_socket_init();
for ($i=2; $i <= strlen($name); $i++) {
	echo teamspeak_socket_send($ts3query,"clientupdate client_nickname=".teamspeak_escape(an_write($i,$name)));
}
fgets(STDIN);
fclose($ts3query);
?>