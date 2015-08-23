<?php
function an_runboi($name,$i,$max=30,$asci="_",$replace_empty_space=false){
 $hidden_space = strlen($name);
 scriptlog($i."\n");
 $after_ascis = $max-$i+strlen($name);
 $before_ascis = $i;
 $full_length = $after_ascis+$before_ascis;
 if($i > $full_length){
  $i = $i-(explode(".",$i/$full_length."")[0]*$full_length)-1;
 }
 if($i < 1){
  $i = $i-(explode(".",$i/$full_length."")[0]*$full_length)+$full_length-1;
 }

 $after_ascis = $max-$i+strlen($name);
 $before_ascis = $i;
 if($replace_empty_space){
  $name = str_replace(" ", $asci, $name);
 }

 for ($n=0; $n <= $after_ascis; $n++) {
  $name .= $asci;
 }

 for ($n=0; $n <= $before_ascis; $n++) {
  $name = $asci.$name;
 }

 return substr($name, $hidden_space, $max);
}

function an_write($pos,$string,$asci="_"){
	return substr($string,0,$pos).$asci;
}

function teamspeak_unescape($str){
    return str_replace("│", "|",str_replace("\\s", " ",str_replace("↵", "\n", $str)));
}

function teamspeak_escape($str){
    return str_replace("|", "│",str_replace(" ", "\\s",str_replace("\n", "↵", $str)));
}

function get_teamspeak_param($name,$teamspeakreturn){
  if(is_int($name)){
    return explode("=",explode(" ",$teamspeakreturn)[$name])[1];
  }
  if(ctype_alpha($name)){
    $value = null;
    $args = explode(" ",$teamspeakreturn);
    foreach ($args as $arg) {
      $keyval = explode("=",$arg);
      if($keyval[0] == $name){
        $value = $keyval[1];
        break;
      }
    }
    return $value;
  }
  else{
    return null;
  }
}

function get_teamspeak_status($teamspeakreturn){
  if(substr($teamspeakreturn,0,5) == "error"){
    return get_teamspeak_param(1,$teamspeakreturn);
  }
  else{
    return null;
  }
}

function teamspeak_socket_init($clientquery_port=25639){
  $socket = fsockopen("localhost", $clientquery_port);
  echo fgets($socket);
  echo fgets($socket);
  echo fgets($socket);
  return $socket;
}

function teamspeak_socket_send($socket,$command){
  fputs($fp,$command."\n");
  return fgets($socket);
}

function teamspeak_getname($socket) {
    $tmp = teamspeak_socket_send($socket,"whoami");
    echo fgets($socket);
    $clid = get_teamspeak_param(0,$tmp);
    $tmp = teamspeak_socket_send($socket, "clientvariable clid=".$clid." client_nickname");
    echo fgets($socket);
    $name = teamspeak_unescape(get_teamspeak_param(1,$tmp));
    return $name;
}
?>