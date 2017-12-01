<?php

$address = 'localhost';
$port = 1985; 

if (($sock = socket_create (AF_INET, SOCK_STREAM, SOL_TCP)) < 0) {
  echo "Socket create error";
} else {
  echo "Socket was created\n";
}

if ((socket_bind($sock, $address, $port)) < 0) {
  echo "Connection error";
} else {
  echo "Successful connection\n";
}
if ((socket_listen($sock, 5)) < 0) {
  echo "Socket listen error";
} else {
  echo "Waiting for client connection\n";
}

do {
  if (($msgsock = socket_accept($sock)) < 0) {
    echo "Socket connection error";
  } else {
    echo "Socket is ready\n";
  }

  $msg = "Hello!"; 
  echo "Server message: $msg";
  socket_write($msgsock, $msg, strlen($msg)); 
  do {
    echo 'Client message: ';
    if (socket_read($msgsock, 1024) === false) {
      echo "Client message error";       
    } else {
      echo $buf."\n"; 
    }

    if ($buf == 'exit') {
      socket_close($msgsock);
      break 2;
    }
    
    $buf = "You said: " .$buf;
    socket_write($msgsock, $buf, strlen($buf));
  } while (true);
} while (true);

if (isset($sock)) {
  socket_close($sock);
  echo "Socket successfully closed";
}
