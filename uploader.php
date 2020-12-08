<?php

include __DIR__ . '/db.php'; // DB Verbindung -- Gibt pdo als $db

$target_dir = "img/reference/";
$target_file = $target_dir . basename($_FILES["file-1"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

echo $_FILES["file-1"]["name"];

$file = $_FILES["file-1"]["name"];

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file-1"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ". ";
        $uploadOk = 1;
    } else {
        echo "File is not an image. ";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists. ";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["file-1"]["size"] > 5000000000) {
    echo "Sorry, your file is too large. ";
    $uploadOk = 0;
}

// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed. ";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    // randomize name to avoid copies
    $tmp001 = explode(".", $_FILES["file-1"]["name"]);
    $filename = $_POST["name-1"] . "_" . round(microtime(true)) . "." . end($tmp001);
    $filepath = $target_dir . $filename;
    // upload
    if (move_uploaded_file($_FILES["file-1"]["tmp_name"], $filepath)) {
        //if image uploaded, put heel in db
        if (!empty($database) || !empty($db)) {
            try {
                $sql = $db->prepare("INSERT INTO heel(heelName, heelTag1, heelTag2, heelTag3, heelImgRef)
                 values (:heelName, :heelTag1, :heelTag2, :heelTag3, :heelImgRef)");

                $sql->bindParam(':heelName', $_POST["name-1"]);
                $sql->bindParam(':heelTag1', $_POST["heelTag1"]);
                $sql->bindParam(':heelTag2', $_POST["heelTag2"]);
                $sql->bindParam(':heelTag3', $_POST["heelTag3"]);
                $sql->bindParam(':heelImgRef', $filepath);

                if ($sql->execute()) {
                    echo "geschafft";
                }

            } catch (PDOException $e) {
                echo "Error... " . $e->getMessage();
            }

        }
        echo "The file " . htmlspecialchars(basename($_FILES["file-1"]["name"])) . " has been uploaded. ";
    } else {
        echo "There was an error uploading your file. ";
    }
}
?>