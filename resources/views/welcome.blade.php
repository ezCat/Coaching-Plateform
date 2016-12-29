<!DOCTYPE html>
<html lang="en">
<head>
    <script>window.Laravel = {csrfToken: '{{ csrf_token() }}'}</script>
    <meta name="_token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>One pager</title>
</head>
<body>
<div id="app" class="container">
    <navbar></navbar>
    <calendars></calendars>
    <players></players>
    <gyms></gyms>
    <clubs></clubs>
    <injuries></injuries>
    <reminders></reminders>
    <schedules></schedules>
    <documents></documents>
    <teams></teams>
</div>
<script src="/js/jquery.js"></script>
<script src="/js/foundation.js"></script>
<script src="/js/app.js"></script>
<script type="application/javascript">
    $(document).foundation();
</script>
</body>
</html>