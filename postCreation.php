<?php
$activePage = 'index';
include __DIR__ . '/templates/page_header.php';
?>

<div class="container postCreation col-md-6">
    <form action="uploaderPost.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for=postTitle">The Title of Your Post</label>
                    <input class="form-control" name="postName" type="text" placeholder="Epic Title" required>
                </div>
                <div class="form-group">
                    <label for="tags">Tags of Your desired heel</label>
                    <div class="input-group">
                        <input class="form-control" name="heelTag1" type="text" placeholder="Your" required>
                        <input class="form-control" name="heelTag2" type="text" placeholder="Tags" required>
                        <input class="form-control" name="heelTag3" type="text" placeholder="Here" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="desc">Post Input</label>
                    <textarea class="form-control" name="postContent" type="text" placeholder="Share your Story!" required></textarea>
                    <input type="hidden" value="<?=$_POST['userID']?>">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Post!</button>
                </div>
    </form>
</div>


<?php
include __DIR__ . '/templates/page_footer.php'; ?>

