<?php
include __DIR__ . '/templates/page_header.php';
?>
<form action="" method="post">
    Your Emaill: <br>
    <input type ="email" name="email" placeholder="Email"><br>
    Repeat email please:<br>
    <input type="email" name="email_repeat" placeholder="Email"><br>
    Your Username:<br>
    <input type ="text" name="username" placeholder="Username"><br>
    Your Passwort:<br>
    <input type="password" name="password_hash" placeholder="Password"><br>
    Repeat passwort please:<br>
    <input type="password" name="password_repeat" placeholder="Password"><br>
    <input type="submit" name="send" value="Send">
</form>
<?php
try{
$pdo = new PDO('mysql:host=hermes-board.tk;dbname=hermes_board', 'hermes', 'hermes',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}catch(PDOException $e){
    echo "Connection failed" . $e->getMessage();
}

echo '<a href="login_index.php?page=Login">Back to Login or Register</a>';


    if(isset($_POST['send'])):
     $email =$_POST['email'];
      $email_repeat =$_POST['email_repeat'];
      $username =$_POST['username'];
      $password_hash =$_POST['password_hash'];
     $password_repeat =$_POST['password_repeat'];

     $search_user = $pdo->prepare("Select count(userID) as unTest FROM user WHERE userName= :username");
     $search_user->bindParam("username",$username);

     $search_email = $pdo->prepare("Select count(userID) as eTest FROM user WHERE userEmail= :email");
     $search_email->bindParam("email",$email);


     $search_user->execute();
     $search_result = $search_user->fetch(PDO::FETCH_ASSOC);
     $search_email->execute();
     $search_result2 = $search_email->fetch(PDO::FETCH_ASSOC);

     if($search_result["unTest"]==0 && $search_result2["eTest"]==0):

           if($password_hash == $password_repeat):
               $password_hash =md5($password_hash);
            $insert = $pdo->prepare("INSERT INTO user (userEmail,userName,userPassword) VALUES (:email,:username,:password_hash)");
                $insert->bindParam("email",$email);
                $insert->bindParam("username",$username);
                $insert->bindParam("password_hash",$password_hash);
         if($insert->execute()):
             echo 'Your account is now Registered';
            endif;
         else:
             echo 'Passwords are not equal!';
         endif;
         else:
                echo 'Username or Email is taken!';
         endif;
    endif;
    ?>
<?php
include __DIR__ . '/templates/page_footer.php';?>
