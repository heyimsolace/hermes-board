<?php
include __DIR__ . '/templates/page_header.php';
$destination;
if ($_REQUEST['dest'] == 'post') {
    $destination = 'postCreation.php';
} elseif ($_REQUEST['dest'] == 'heel') {
    $destination = 'heelCreation.php';
} elseif ($_REQUEST['dest'] == 'comment') {
    $destination = 'commentCreation.php';
}

?>
<div class="container">
    <div class="row align-items-center">
        <div class="col-md-6">
            <form action="loginTransfer.php" method="post">
                <div class="form-group">
                    <label for="emailorusername">Your Email or Username</label>
                    <input class="form-control" type="text" name="emailorusername" placeholder="Email or Username">
                </div>
                <div class="form-group">
                    <label for="password">Your Email or Username</label>
                    <input class="form-control" type="password" name="password" placeholder="Password">
                    <input type="hidden" value="<?= $destination ?>" name="destination">
                    <?php if (isset($_POST['postID']) && $destination == 'comment') {
                        $postID = $_POST['postID'];
                        echo "<input type='hidden' value='$postID' name='postID'>";
                    } ?>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Login!</button>
                </div>
            </form>

            <h3>Not Registed?</h3>
            <form action="register.php">
                <button class="btn btn-primary">Sign Up!</button>
            </form>

        </div>
    </div>
</div>

<?php
include __DIR__ . '/templates/page_footer.php'; ?>
