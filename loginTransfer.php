<?php

include "templates/page_header.php";
try{
    $pdo = new PDO('mysql:host=hermes-board.tk;dbname=hermes_board', 'hermes', 'hermes',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}catch(PDOException $e){
    echo "Connection failed" . $e->getMessage();
}
    $username = strtolower($_POST['emailorusername']);
    $password = $_POST ['password'];
    $password = md5($password);
    $destination = $_POST['destination'];

    $search_user = $pdo->prepare ("SELECT * From user WHERE userName = :emailorusername OR userEMAIL =:emailorusername AND userPassword = :password");
    $search_user->bindParam('emailorusername',$username);
    $search_user->bindParam('password',$password);
    $search_user->execute();

    if($search_user->rowCount() == 1) {
        $search_objekt = $search_user->fetchAll();
        foreach ($search_objekt as $item) {
            if (($item['userName'] == $username || $item['userEmail'] == $username) && $password == $password){
                $_SESSION['user'] = $search_objekt->userID;
                $userID = $_SESSION['user'];
                echo "<form id='form' action='$destination'>
                         <input value='true' type='hidden' name='login'>
                         <input value='$userID'
                        </form>";
                echo "<script type='text/javascript''>
                        document.getElementById('form').submit();
                        </script>";
            } else {
                echo "<h1>Username or Password is wrong</h1>";
                echo "<script>window.setTimeout(function(){ window.location.href = 'index.php'; }, 5000);</script>";
            }
        }
    }
    else {
        echo "<h1>Username or Password is wrong</h1>";
        echo "<script>window.setTimeout(function(){ window.location.href = 'index.php'; }, 5000);</script>";
    }
    include "templates/page_footer.php";
?>
<script type="text/javascript">
    document.getElementById('form').submit();
</script>


