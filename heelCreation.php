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

<script>
    tinymce.init({
        selector: 'textarea#formtextarea',
        height: 300,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic removeformat backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist | ' +
            '| link image | help',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });
</script>


<?php
include __DIR__ . '/templates/page_footer.php'; ?>

