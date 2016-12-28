<!DOCTYPE html>
<html lang="en">
<head>
    <script>window.Laravel = {csrfToken: '{{ csrf_token() }}'}</script>
    <meta name="_token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Laravel 5.3 with Vuejs</title>
</head>
<body>
<div id="app" class="container">
    <navbar></navbar>
    <teams></teams>
</div>
<script src="/js/app.js"></script>
</body>
</html>