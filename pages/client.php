<?php
require 'C:\xampp\htdocs\dropshipping-website\vendor';

use Ratchet\Client\WebSocket;
use React\EventLoop\Loop;

function connectWebSocket()
{
    $loop = Loop::get();

    $reactConnector = new \React\Socket\Connector($loop, [
        'dns' => '8.8.8.8',
        'timeout' => 10
    ]);

    $connector = new \Ratchet\Client\Connector($loop, $reactConnector);

    $connector('ws://localhost:8080')->then(function (WebSocket $conn) {
        $conn->on('message', function ($msg) use ($conn) {
            echo "Received: {$msg}\n";
            // Process the received message here
        });

        $conn->send('Hello WebSocket Server!');

        // You can send more messages or set up more event handlers here
    }, function ($e) {
        echo "Could not connect: {$e->getMessage()}\n";
    });

    $loop->run();
}

// You can call this function when you need to connect to the WebSocket server
// connectWebSocket();