<?php

$cnt = count($argv);

if($cnt > 1){
  $action = preg_replace('/[^\w]+/', '_', $argv[1]);
  switch($action){
    case 'add':
      if($cnt < 4){ echo 'missing arguments!'; break; }
      $username = preg_replace('/[^\w]+/', '_', $argv[2]);
      $password = preg_replace('/[^\w]+/', '_', $argv[3]);
      //echo "cmd: mosquitto_passwd -b /etc/mosquitto/passwd $username $password" . PHP_EOL;
      echo exec("mosquitto_passwd -b /etc/mosquitto/passwd $username $password") . PHP_EOL;
      break;
    case 'remove':
      if($cnt < 3){ echo 'missing argument!'; break; }
      $username = preg_replace('/[^\w]+/', '_', $argv[2]);
      //echo "cmd: mosquitto_passwd -D /etc/mosquitto/passwd $username" . PHP_EOL;
      echo exec("mosquitto_passwd -D /etc/mosquitto/passwd $username") . PHP_EOL;
      break;
    case 'list':
      exec("cat /etc/mosquitto/passwd", $out) . PHP_EOL;
      foreach($out as $line)
        echo $line . PHP_EOL;
      break;
    default:
      break;
  }
}

/*
$username = 'matija';
exec("mosquitto_passwd [ -c | -D ] /etc/mosquitt/passwd $username");
*/
