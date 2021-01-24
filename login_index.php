<?php
$activePage = 'login_index';
include __DIR__ . '/templates/page_header.php';
?>
<html>
<head>
    <title>Login or Register</title>
</head>
<body>
<?php
$page = strtolower($_GET['page']);


//User is angemeldet
if(false):
    require_once('ui.php');
else:
    if($page == 'Login'):
        echo '<a href?"register.php?page=register">Register</a>?';
        require_once('login.php');
    elseif($page == 'Register'):
        echo '<a href="login.php?page=Login">Login</a>?';
        require_once ('Register.php');
    else:
        echo '<a href="login.php?page=Login">Login</a> or <a href="register.php?page=register">Register</a>?';
    endif;
endif;
?>
</body>
</html>
<?php
include __DIR__ . '/templates/page_footer.php';?>
