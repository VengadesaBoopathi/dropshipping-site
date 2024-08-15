<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebSocket Messages</title>
    <link rel="stylesheet" href="/dropshipping-website/assets/css/style.css">
</head>

<body>
    <h1>WebSocket Messages</h1>
    <div id="messages"></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            var socket = new WebSocket('ws://localhost:8080');

            socket.onopen = function (e) {
                $('#messages').append('<p>Connected to WebSocket server</p>');
                socket.send('Hello Server!');
            };

            socket.onmessage = function (event) {
                $('#messages').append('<p>Received: ' + event.data + '</p>');
            };

            socket.onclose = function (event) {
                $('#messages').append('<p>Disconnected from WebSocket server</p>');
            };

            socket.onerror = function (error) {
                $('#messages').append('<p>Error: ' + error.message + '</p>');
            };
        });
    </script>
</body>

</html>