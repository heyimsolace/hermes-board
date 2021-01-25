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

    <script src="https://cdn.tiny.cloud/1/zn90lnd2lspntbncar9avj072ocbaosr3p6bdxcxlfoku7qr/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


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
    <!-- Searchbar -->
    <div class="collapse navbar-collapse ml-5" id="navbarNav">
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="searchbar btn btn-outline-success my-2 my-sm-0 " type="submit">Search</button>
        </form>
    </div>
    <!-- Create Post -->
    <a href="postCreation.php">
        <button type="button" class="btn btn-dark login">POST!</button>
    </a>
    <!-- DropDown -->
    <div class="nav-item dropdown mr-5 ">
        <div class="nav-link dropdown-toggle login" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
             aria-haspopup="true" aria-expanded="false">
            Login
        </div>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <div>
                <input type="text" id="userId" name="userId" placeholder="User ID">
            </div>
            <div>
                <input type="password" id="userId" name="userId" placeholder="Passwort">
            </div>
        </div>
    </div>
</nav>

