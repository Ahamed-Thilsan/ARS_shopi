<!DOCTYPE html>
<html lang ="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-comatible"content="ie=edge">
        <title>{{ isset($page_title) ? $page_title : '' }} ARS-SHOPI </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="language" content="en">
        <meta name="robots" content="index,follow,all" />
        <meta name="Author" content="Shipu" />
        <meta name="HandheldFriendly" content="True">
        @include('Inc.headbody')
    </head>
    <body class="animsition">
        @include('Inc.navbar2')
        @yield('content')        
        @include('Inc.footer')
    </body>
</html>