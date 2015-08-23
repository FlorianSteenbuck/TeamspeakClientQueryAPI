# [TeamspeakClientQueryAPI](https://github.com/BluscreamFanBoy/TeamspeakClientQueryAPI)

This is a php file with useful functions for using the Teamspeak Client Query


## Quick Start

Its simple like that you include the `api.php`

```php
//Include the api file for using the functions
include "api.php";
```
And then you can use all functions<br>
To start the a connection to the Teamspeak Client Query you simply can run the function `teamspeak_socket_init` and get the return variable
```php
//Include the api file for using the functions
include "api.php";

//Create a connection to the current client query
$ts3clientquery = teamspeak_socket_init();
```
In the next step you can use this variable to send and receive something from your clientquery data.<br>
In this example we change your nickname for that we need the `teamspeak_socket_send` function
```php
//Include the api file for using the functions
include "api.php";

//Create a connection to the current client query
$ts3clientquery = teamspeak_socket_init();

/*
Here we use the teamspeak_socket_send function with 
clientupdate command and set with parameter client_nickname
the nickname and escape this nickname
with the teamspeak_escape function
*/
echo teamspeak_socket_send($ts3clientquery,"clientupdate client_nickname=".teamspeak_escape("I am Stupid"));
```
After you send all what you want the best way to end your program is to use the `fclose` function
```php
//Include the api file for using the functions
include "api.php";

//Create a connection to the current client query
$ts3clientquery = teamspeak_socket_init();

/*
Here we use the teamspeak_socket_send function with 
clientupdate command and set with parameter client_nickname
the nickname and escape this nickname
with the teamspeak_escape function
*/
echo teamspeak_socket_send($ts3clientquery,"clientupdate client_nickname=".teamspeak_escape("I am Stupid"));

//Close the clientquery
fclose($ts3clientquery);
```
