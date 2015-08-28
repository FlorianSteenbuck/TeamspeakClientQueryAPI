<?php
include("api.php");
$names = file_get_contents("../files/names.txt");
$names = str_replace(" ", "\\s", $names);
$names = str_replace("|", "│", $names);
$names = explode("\n",$names);
$ts3query = teamspeak_socket_init();
while(1){
    $i = rand(0,count($names)-1);
    while($i == $lasti){
        $i = rand(0,count($names)-1);
    }
    $name = $names[$i];
    teamspeak_socket_send($ts3query,"clientupdate client_nickname=".$name."\n");
    sleep(10);// usleep(50000);
    $lasti = $i;
}
fclose($ts3query);
?>