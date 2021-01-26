<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hermes Board</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>

    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/stickyBox.css"/>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="shortcut icon" type="image/x-icon" href="img/logo/logo_tiny.png">

</head>
<body>
<!-- Navigation Bar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <!-- Logo und Schriftzug -->
    <a href="index.php">
        <img class="navbar-brand header-logo" src="img/logo/logo_small.png">
    </a>
    <a class="navbar-brand" href="index.php">Hermes-Board</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Create heel -->
    <a href="login.php?dest=heel" class="float-right">
        <button type="button" class="btn btn-dark login">HEEL!</button>
    </a>
    <!-- Create Post -->
    <a href="login.php?dest=post" class="float-right">
        <button type="button" class="btn btn-dark login">POST!</button>
    </a>
</nav>

