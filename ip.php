<?php

function sendMessageToDiscord($url, $json){
    $ch = curl_init( $url );
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
    curl_setopt( $ch, CURLOPT_POST, 1);
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt( $ch, CURLOPT_HEADER, 0);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
    return curl_exec( $ch );
}

sendMessageToDiscord('https://discordapp.com/api/webhooks/705853739784732733/i6q306-OAoOpjIe-N8ehUjjYWRuvJKfVy8QjXQzqaeNryigbF0ReqWN3vQavzk5jfcpf', '{
    "embeds": [
      {
        "title": "Got New IP Request",
        "description": "Got a request from IP: '.$_SERVER['REMOTE_ADDR'].'",
        "fields": []
      }
    ],
    "username": "IP Resolver",
    "avatar_url": "https://dwglogo.com/wp-content/uploads/2016/08/PayPal_Logo_Icon.png"
  }');

echo "Hello";