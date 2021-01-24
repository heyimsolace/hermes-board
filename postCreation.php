<?php
$activePage = 'index';
include __DIR__ . '/templates/page_header.php';
?>

<div class="container postCreation">
    <form action="/uploader.php">
        <div class="row">
            <div class="col-md-4">
                <div class="creationImgBox">
                    <img class="rounded postCreation-img"
                         src="https://hermes-board.tk/img/reference/1200px-Siemens-PC-D.jpg">

                </div>
                <a class="change-link" href='#'>Change</a>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="heelName">Heel Name</label>
                    <input class="form-control" name="heelName" type="text" placeholder="Epic HeelName">
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
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <button class="btn btn-primary float-right" type="submit">Post!</button>
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
</script>


<?php
include __DIR__ . '/templates/page_footer.php'; ?>

