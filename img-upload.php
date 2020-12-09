<?php


include __DIR__ . '/page_header.php'; // HEADER
?>
    <body>

    <form action="uploader.php" method="POST"  enctype="multipart/form-data">

        <div>
            <input type="text" name="name-1" id="name-1">
            <label for="name-1">Name</label>
        </div>

        <div>

            <input type="text" name="heelTag1" id="heelTag1">
            <input type="text" name="heelTag2" id="heelTag2">
            <input type="text" name="heelTag3" id="heelTag3">
            <label for="heeltags">Tags</label>
        </div>

        <div>
            <input type="file" name="file-1" id="file-1">
            <div class="input-images-1" style="padding-top: .5rem;"></div>
        </div>

        <div>
            <input type="submit" name="submit" value="Bild Hochladen!">
        </div>

    </form>



        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="js/image-uploader.js"></script>
    </body>
</html>
