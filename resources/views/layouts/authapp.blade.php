<!DOCTYPE html>
<html lang ="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-comatible"content="ie=edge">
        <title>{{ isset($page_title) ? $page_title : '' }} Admin-ARS-SHOPI </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="language" content="en">
        <meta name="robots" content="index,follow,all" />
        <meta name="Author" content="Shipu" />
        <meta name="HandheldFriendly" content="True">
        @include('AuthInc.headbody')
    </head>
    <body class="animsition">
        
        @yield('content')        
        @include('AuthInc.footer')
    </body>
</html>