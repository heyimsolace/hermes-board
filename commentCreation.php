<?php
$activePage = 'index';
include __DIR__ . '/templates/page_header.php';

if (!isset($_POST['login'])) {
    echo "<script>window.setTimeout(function(){ window.location.href = 'index.php'; },10);</script>";
}

$postID = $_POST['postID'];
?>
<div class="container commentCreation col-md-6">
    <form action="uploaderComment.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="desc">Comment:</label>
                    <textarea class="form-control" name="commentContent" type="text" placeholder="Share your Story!" required></textarea>
                    <input type="hidden" value="<?=$_POST['userID']?>" name="userID">
                    <input type="hidden" value="<?=$postID?>" name="postID">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Post!</button>
                </div>
            </div>
        </div>
    </form>
</div>
<?php
include __DIR__ . '/templates/page_footer.php'; ?>

