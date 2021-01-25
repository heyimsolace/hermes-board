<?php
$activePage = 'index';
include __DIR__ . '/templates/page_header.php';
?>

<div class="container postCreation">
    <form action="uploader.php" method="post" enctype="multipart/form-data">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="heelName">Heel Name</label>
                    <input class="form-control" name="heelName" type="text" placeholder="Epic HeelName">
                </div>
                <div class="form-group">
                    <label for="heelImage" class="form-label">Heel Image</label>
                    <input class="form-control" name="heelImage" type="file" id="heelImage">
                 </div>
                <div class="form-group">
                    <label for="tags">Tags</label>
                    <div class="input-group">
                        <input class="form-control" name="heelTag1" type="text" placeholder="Your">
                        <input class="form-control" name="heelTag2" type="text" placeholder="Tags">
                        <input class="form-control" name="heelTag3" type="text" placeholder="Here">
                    </div>
                </div>
                <div class="form-group">
                    <label for="desc">Heel Description</label>
                    <textarea class="form-control" id="formtextarea" name="heelDesc" type="text" placeholder="Your Heel Description"></textarea>
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

