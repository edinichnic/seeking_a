<html>
<head>
    <title>Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="assets/script.js"></script>
    <link href="assets/style.css" rel="stylesheet">
</head>
<body>
<div class="left">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
    aliqua.
    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
</div>
<div class="right">
    <a id="follow" class="<?= $status; ?>">  <div id="count-follow" ><?= $count; ?></div> <span id="status-follow"></span></a>
</div>
</body>
</html>