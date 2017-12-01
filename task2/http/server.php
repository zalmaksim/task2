<?php
set_time_limit(0);
ob_implicit_flush();

$address = '127.0.0.1';
$port = 7500;

$iy = '<!doctype html>
<html>
  <head>
    <title>Socket response</title>
  </head>
  <body>
    <h1>Socket response</h1>
  </body>
</html>';

$i = 1;

if (($sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) === false) {
    echo "Can't do socket_create(): reason: " . socket_strerror(socket_last_error()) . "\n";
} else {
    echo "Socket was created\n";
}

if (socket_bind($sock, $address, $port) === false) {
    echo "Can't do socket_bind(): reason: " . socket_strerror(socket_last_error($sock)) . "\n";
} else {
    echo "Successful binded\n";
}

if (socket_listen($sock, 5) === false) {
    echo "Can't do socket_listen(): reason: " . socket_strerror(socket_last_error($sock)) . "\n";
} else {
    echo "Waiting for client connection\n";
}

while (true) {
    $msgsock = socket_accept($sock);
    if ($msgsock === false) {
        echo "Can't do socket_accept(): reason: " . socket_strerror(socket_last_error($sock)) . "\n";
    }

    $buf = socket_read($msgsock, 1024);
     echo $buf;
    if ($buf === false) {
        echo "Can't do socket_read(): error " . "\n";
    }
   
    if ($res = stristr($buf,"favicon")) {
        socket_shutdown($msgsock);
    } else{
        if ($i % 2)  {
            socket_write($msgsock,"HTTP/1.1 200 OK \n" . "Content-Type: text/html \n" . "\n" .  $iy);
        } 
        else {
            socket_write($msgsock,"HTTP/1.1 200 OK \n" . "Content-Type: text/plain \n" . "\n" .  $iy);
        }
        $i++;
        socket_shutdown($msgsock);
    }
}
socket_close($sock);
