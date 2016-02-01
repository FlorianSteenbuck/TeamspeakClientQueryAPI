<?php
include("../api.php");
//Get Names and change randomly this names after 10s
$names = explode("↵",teamspeak_escape(file_get_contents("conf_files/names.txt")));
$ts3query = teamspeak_socket_init();
$lasti = 0;
while(1){
    $i = rand(0,count($names)-1);
    while($i == $lasti){
        $i = rand(0,count($names)-1);
    }
    $name = $names[$i];
    teamspeak_socket_send($ts3query,"clientupdate client_nickname=".$name."\n");
    sleep(10);
    $lasti = $i;
}
fclose($ts3query);
?>