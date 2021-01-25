<?php
$activePage = 'index';
include __DIR__ . '/templates/page_header.php';
?>

<div class="container postCreation">
    <form action="uploaderPost.php" method="post" enctype="multipart/form-data">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="form-group">
                    <label for=postTitle">The Title of Your Post</label>
                    <input class="form-control" name="postTitle" type="text" placeholder="Epic Title" required>
                </div>
                <div class="form-group">
                    <label for="postImage" class="form-label">Post Image</label>
                    <input class="form-control" name="postImage" type="file" id="postImage" required>
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
                    <textarea class="form-control" id="formtextarea" name="postDesc" type="text" placeholder="Share your Story!" required></textarea>
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

