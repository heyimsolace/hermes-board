<?php
include __DIR__ . '/templates/page_header.php';
?>
<div class="container">
    <div class="row align-items-center">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="form-group">
                    <label for="emails">Your Email:</label>
                    <div class="input-group">
                        <input class="form-control" type="email" name="email" placeholder="Email">
                        <input class="form-control" type="email" name="email_repeat" placeholder="Email Repeat">
                    </div>
                </div>
                <div class="form-group">
                    <label for="username">Your Username:</label>
                    <input class="form-control" type="text" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="password">Your Password:</label>
                    <div class="input-group">
                        <input class="form-control" type="password" name="password_hash" placeholder="Password">
                        <input class="form-control" type="password" name="password_repeat" placeholder="Password Repeat">
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit" name="send" value="Send">Sign Up!</button>
                </div>
            </form>
            <div>
                <h3>Already Registered?</h3>
                <form action="index.php">
                    <button class="btn btn-primary">Go Back!</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
try {
    $pdo = new PDO('mysql:host=hermes-board.tk;dbname=hermes_board', 'hermes', 'hermes', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    echo "Connection failed" . $e->getMessage();
}
if (isset($_POST['send'])){
        $email = $_POST['email'];
    $email_repeat = $_POST['email_repeat'];
    $username = $_POST['username'];
    $password_hash = $_POST['password_hash'];
    $password_repeat = $_POST['password_repeat'];

    $search_user = $pdo->prepare("Select count(userID) as unTest FROM user WHERE userName= :username");
    $search_user->bindParam("username", $username);

    $search_email = $pdo->prepare("Select count(userID) as eTest FROM user WHERE userEmail= :email");
    $search_email->bindParam("email", $email);


    $search_user->execute();
    $search_result = $search_user->fetch(PDO::FETCH_ASSOC);
    $search_email->execute();
    $search_result2 = $search_email->fetch(PDO::FETCH_ASSOC);

    if ($search_result["unTest"] == 0 && $search_result2["eTest"] == 0):

        if ($password_hash == $password_repeat && $email == $email_repeat):
            $password_hash = md5($password_hash);
            $insert = $pdo->prepare("INSERT INTO user (userEmail,userName,userPassword) VALUES (:email,:username,:password_hash)");
            $insert->bindParam("email", $email);
            $insert->bindParam("username", $username);
            $insert->bindParam("password_hash", $password_hash);
            if ($insert->execute()):
                echo 'Your account is now Registered';
            endif;
        else:
            echo "<h2>Passwords are not equal!</h2>";
        endif;
    else:
        echo "<h2>Username or Email is taken!</h2>";
    endif;
}
?>
<?php
include __DIR__ . '/templates/page_footer.php'; ?>
