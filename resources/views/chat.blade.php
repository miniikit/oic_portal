<html lang="ja">
<head>
   <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>chatdemo</title>
   <link href="/css/app.css" rel="stylesheet">
</head>
    <body>
    <div id="app">
        <h1>Chatroom</h1>
          <p class="chatname">{{ $user->name }}</p>
            <span class="badge pull-right">@{{ usersInRoom.length }}</span>
                <chat-log :messages="messages"></chat-log>
                <chat-composer v-on:messagesent="addMessage"></chat-composer>
    </div>

    </body>
</html>