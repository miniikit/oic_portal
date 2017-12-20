@extends('template.master')
<html lang="ja">
<head>
   <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>chatdemo</title>
   <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/chat_other.css">
</head>
    <body>
    <div id="app">
        <h1>Chatroom</h1>
          <p class="chatname">{{ $user->name }}</p>
            <span class="badge pull-right">@{{ usersInRoom.length }}</span>
            <div id="">
                <chat-log :messages="messages"></chat-log>

            </div>
                <chat-composer v-on:messagesent="addMessage"></chat-composer>
    </div>
    <script src="/js/app.js"></script>
    </body>
</html>

