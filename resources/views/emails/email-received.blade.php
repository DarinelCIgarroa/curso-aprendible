<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Emails - Received</title>
</head>
<body>
    Recibiste un mensaje de: {{ $msg['name'] }} - {{ $msg['email'] }}
    <br>
    Asunto: {{ $msg['subject'] }}
    <br>
    Descripción: {{ $msg['text'] }}
</body>
</html>
