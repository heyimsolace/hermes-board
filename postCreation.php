<?php
$activePage = 'index';
include __DIR__ . '/page_header.php';
?>
<p></p>
<div class="container">
    <div class="align-middle">
        <div>
            <input type="text" class="postTitle" name="userId" placeholder="Post Title">
            <input type="text" class="postTags" name="userId" placeholder="Tags">
        </div>
    </div>
    <p></p>
    <div class=" align-middle">
            <div class="form-group">
                <textarea class="form-control postBox" id="exampleFormControlTextarea1" placeholder="Your Story!" rows="28"></textarea>
            </div>
    </div>
</div>

<?php
include __DIR__ . '/page_footer.php';?>

