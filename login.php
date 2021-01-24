<form action="" method="post">
    Your Username:<br>
    <input type="text" name="username" placeholder="Username"><br>
    Your Passwort:<br>
    <input type="password" name="password" placeholder="Password"><br>
    <input type="submit" name="send" value="Send"><br>
</form>
<?php
try{
    $pdo = new PDO('mysql:host=hermes-board.tk;dbname=hermes_board', 'hermes', 'hermes',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}catch(PDOException $e){
    echo "Connection failed" . $e->getMessage();
}
echo '<a href="login_index.php?page=Login">Login</a>';

if(isset($_POST['send'])):
    $username = strtolower($_POST['username']);
    $password = $_POST ['password'];
    $password = md5($password);

    $search_user = $pdo->prepare ("SELECT userID From user WHERE userName = :username AND userPassword = :password");
    $search_user->bindParam('username',$username);
    $search_user->bindParam('password',$password);
    $search_user->execute();

    if($search_user->rowCount() == 1):
        $search_objekt = $search_user->fetchObject();
        $_SESSION['user'] = $search_objekt->userID;
        //header('Location:index.php');
        else:
        echo 'Username or Password is wrong';
        endif;

endif;

