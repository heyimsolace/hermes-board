<?php
$activePage = 'index';
include __DIR__ . '/templates/page_header.php';
?>

<div class="container postCreation">
    <form action="uploader.php" method="post" enctype="multipart/form-data">
        <div class="row align-items-center">
            <div class="col-md-6">
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
                    <input name="about" type="hidden">
                    <div id="editor-container">
                        <p id="heelDesc"></p>
                    </div>
                </div>
                <div class="form-group">

                    <button class="btn btn-primary" type="submit">Post!</button>
                </div>
            </div>
        </div>


    </form>
</div>

<script>
    var quill = new Quill('#editor-container', {
        modules: {
            toolbar: [
                ['bold', 'italic'],
                ['link', 'blockquote', 'code-block', 'image'],
                [{list: 'ordered'}, {list: 'bullet'}]
            ]
        },
        placeholder: 'Compose an epic...',
        theme: 'snow'
    });

    var form = document.querySelector('form');
    form.onsubmit = function () {
        // Populate hidden form on submit
        var about = document.querySelector('input[name=about]');
        about.value = JSON.stringify(quill.getContents());

        console.log("Submitted", $(form).serialize(), $(form).serializeArray());

        // No back end to actually submit to!
        alert('Open the console to see the submit data!')
        return false;
    };

    var myEditor = document.querySelector('#heelDesc')
    var html = myEditor.children[0].innerHTML
</script>


<?php
include __DIR__ . '/templates/page_footer.php'; ?>

