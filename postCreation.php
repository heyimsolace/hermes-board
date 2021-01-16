<?php
$activePage = 'index';
include __DIR__ . '/templates/page_header.php';
?>

<div class="container postCreation">
    <form>
        <div class="row">
            <div class="col-md-4">
                <div class="creationImgBox">
                    <img class="rounded postCreation-img" src="https://hermes-board.tk/img/reference/1200px-Siemens-PC-D.jpg">

                </div>
                <a class="change-link" href='#'>Change</a>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="display_name">Display name</label>
                    <input class="form-control" name="display_name" type="text" value="Wall-E">
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input class="form-control"  name="location" type="text" value="Earth">
                </div>
                <div class="form-group">
                    <input name="about" type="hidden">
                    <div id="editor-container">
                        <p>Your Text!.</p>
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
                [{ list: 'ordered' }, { list: 'bullet' }]
            ]
        },
        placeholder: 'Compose an epic...',
        theme: 'snow'
    });

    var form = document.querySelector('form');
    form.onsubmit = function() {
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

