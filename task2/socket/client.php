<?php
  $address = 'localhost';
  $port = 1985; 
  if (($socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) < 0) {
    echo "Socket create error";
  }  else {
    echo "Socket was created\n";
  }

  $result = socket_connect($socket, $address, $port);
  if ($result === false) {
    echo "Connection error";
  } else {
    echo "Successful connection\n";
  }

  $out = socket_read($socket, 1024);
  echo "Server message: $out.\n";
  
  $msg = "hi mate";
  echo "Server message: $msg\n";
  socket_write($socket, $msg, strlen($msg));
  
  $out = socket_read($socket, 1024);
  echo "Server message: $out.\n";
  
  $msg = 'exit';
  echo "Server message: $msg\n";
  socket_write($socket, $msg, strlen($msg));
  echo "Connection completed\n";

  if (isset($socket)) {
    socket_close($socket);
    echo "Socket successfully closed";
  }
