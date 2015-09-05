# [TeamspeakClientQueryAPI](https://github.com/BluscreamFanBoy/TeamspeakClientQueryAPI)

This is a php file with useful functions for using the Teamspeak Client Query


## Quick Start

Its simple like that you include the `api.php`

```php
//Include the api file for using the functions
include "api.php";
```
And then you can use all functions<br>
To start the a connection to the Teamspeak Client Query you simply can run the function [teamspeak_socket_init](#teamspeak_socket_init) and get the return variable
```php
//Include the api file for using the functions
include "api.php";

//Create a connection to the current client query
$ts3clientquery = teamspeak_socket_init();
```
In the next step you can use this variable to send and receive something from your clientquery data.<br>
In this example we change your nickname for that we need the [teamspeak_socket_send](#teamspeak_socket_send) function
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
After you send all what you want the best way to end your program is to use the [fclose](http://php.net/manual/en/function.fclose.php) function
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

## Functions

[teamspeak_socket_init](#teamspeak_socket_init)<br>
[teamspeak_socket_send](#teamspeak_socket_send)<br>
[get_teamspeak_param](#get_teamspeak_param)<br>
[get_teamspeak_status](#get_teamspeak_status)<br>
[teamspeak_getname](#teamspeak_getname)

### teamspeak_socket_init

#### Description
```php
teamspeak_socket_init($clientquery_port=25639)
```
This is a Function that initalize a local socket connection to the teamspeak client query and `gets` and `echo` the first 3 lines of the response.

#### Parameters
`clientquery_port`<br>
The Client Query must be a Integer. If not set it is using the default port for the clientquery(25639).

#### Return Values
This Function return a simple raw socket for a connection to the teamspeak client query.

#### Examples

```php
//Create a connection to the current client query
$ts3query = teamspeak_socket_init();
```

```php
//Create a connection to the current client query with a custom port
$ts3query = teamspeak_socket_init(12058);
```

#### Changelog

No Changes

### teamspeak_socket_send

#### Description
```php
teamspeak_socket_send($socket,$command)
```
This function use the pre initalized socket ([teamspeak_socket_init](#teamspeak_socket_init)) to send some command to the client query.

#### Parameters
`socket`<br>
The Client Query Socket must be a raw tcp socket connection. I recommend to use the [teamspeak_socket_init](#teamspeak_socket_init) function, because you maybe get trouble with getting data from the response stream.

`command`<br>
The Command must be a String without "\n". I recommend to use the [tool.php](https://github.com/BluscreamFanBoy/TeamspeakClientQueryAPI/blob/master/tool.php) to find out more about the commands.

#### Return Values
This Function return the next line of the response after sending the command.

#### Examples

```php
//Create a connection to the current client query
$ts3query = teamspeak_socket_init();

//Send the Command to Change the nickname to "IamStupid"
echo teamspeak_socket_send($ts3query,"clientupdate client_nickname=IamStupid");
```

#### Changelog

No Changes

### get_teamspeak_param

#### Description
```php
get_teamspeak_param($name,$teamspeakreturn)
```
This function is a parameter reader for the default teamspeak client query output.

#### Parameters
`name`<br>
This is the name of the parameter you can take here for a string or a int

`teamspeakreturn`<br>
This is a line of returned output.

#### Return Values
This Function return the value of the name or count of parameter.

#### Examples

```php
//Create a connection to the current client query
$ts3query = teamspeak_socket_init();
//Use the get_teamspeak_param to get the client id(clid) by the int 0(first parameter)
$clid = get_teamspeak_param(0,teamspeak_socket_send($ts3query,"whoami"));
```

```php
//Create a connection to the current client query
$ts3query = teamspeak_socket_init();
//Use the get_teamspeak_param to get the client id(clid) by the string "clid"
$clid = get_teamspeak_param("clid",teamspeak_socket_send($ts3query,"whoami"));
```

#### Changelog

No Changes

### get_teamspeak_status

#### Description
```php
get_teamspeak_status($teamspeakreturn)
```
This function is a status code reader from the status message output of teamspeak.

#### Parameters
`teamspeakreturn`<br>
This is a line of returned output.

#### Return Values
This function return the status code of the status message of `teamspeakreturn` or null if `teamspeakreturn` is not a status message the function return `null`.

#### Examples

```php
//Create a connection to the current client query
$ts3query = teamspeak_socket_init();
//Get a line of the help page
$line = teamspeak_socket_send($ts3query,"help");
//Echo the next line if the current line is not a status line loop
while(get_teamspeak_status($line) == null){
	echo $line;
	$line = fgets($ts3query);
}
//Close the connection of the ts3query
fclose($ts3query);
```

#### Changelog

No Changes

### teamspeak_getname

#### Description
```php
teamspeak_getname($socket)
```
This function read the current name of the client.

#### Parameters
`socket`<br>
The Client Query Socket must be a raw tcp socket connection. I recommend to use the [teamspeak_socket_init](#teamspeak_socket_init) function, because you maybe get trouble with getting data from the response stream.

#### Return Values
This function return the current name of the client.

#### Examples

```php
//Create a connection to the current client query
$ts3query = teamspeak_socket_init();
//Echo the current name of the clientquery
echo teamspeak_getname($ts3query,"help");
```

#### Changelog

No Changes
