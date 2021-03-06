<?php
include __DIR__ . '/templates/page_header.php';
include __DIR__ . '/templates/db.php'; // DB Verbindung -- Gibt pdo als $db

$tmp001 = explode(".", $_FILES["heelImage"]["name"]);
$filename = "h_" . $_POST["heelName"] . "." . end($tmp001);

$target_dir = 'img/reference/';
$target_file = $target_dir . $filename;
$uploadOk = true;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$heeltag1 = strtolower($_POST['heelTag1']);
$heeltag2 = strtolower($_POST['heelTag2']);
$heeltag3 = strtolower($_POST['heelTag3']);

$file = $_FILES["heelImage"]["name"];

$heelName = "h/" . $_POST["heelName"];

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["heelImage"]["name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ". ";
        $uploadOk = false;
    } else {
        echo "File is not an image. ";
        $uploadOk = false;
    }
}
// Check file size
if ($_FILES["heelImage"]["size"] > 70000000) {
    echo "Sorry, your file is too large. ";
    $uploadOk = false;
}

// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed. ";
    $uploadOk = false;
}


// Check for duplicates
try{
    if (!empty($database) && !empty($db)) {
        $db->beginTransaction();

        $sql = $db->query("SELECT * FROM heel");

        foreach ($sql->fetchAll() as $heels) {


            $existingHeelTags = array(
                "tag1" => $heels["heelTag1"],
                "tag2" => $heels["heelTag2"],
                "tag3" => $heels["heelTag3"]
            );
            if ($heels["heelName"] == $heelName){
                $uploadOk = false;
                echo "Heelname already Exists.";
                break;
            }
            if (in_array($heelTag1, $existingHeelTags) && in_array($heelTag2, $existingHeelTags) && in_arra($heelTag3, $existingHeelTags)){
                $uploadOk = false;
                echo "Combination of tags already Taken.";
                break;
            }
        }
        $db->commit();
    }
} catch (PDOException $e1) {
    echo "Error... " . $e1->getMessage();
    $db->rollBack();
    $uploadOk = false;
} catch (Exception $e2) {
    echo "Error... " . $e2->getMessage();
    $uploadOk = false;
    $db->rollBack();
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == true) {
    try {
        if (!empty($database) && !empty($db)) {
            $db->beginTransaction();

            $sql = $db->prepare("INSERT INTO heel(heelName, heelTag1, heelTag2, heelTag3, heelImgRef, heelDesc)
                 values (:heelName, :heelTag1, :heelTag2, :heelTag3, :heelImgRef, :heelDesc)");

            $sql->bindParam(':heelName', $heelName);
            $sql->bindParam(':heelTag1', strtolower($_POST["heelTag1"]));
            $sql->bindParam(':heelTag2', strtolower($_POST["heelTag2"]));
            $sql->bindParam(':heelTag3', strtolower($_POST["heelTag3"]));
            $sql->bindParam(':heelImgRef', $target_file);
            $sql->bindParam(':heelDesc', $_POST["heelDesc"]);

            $sql->execute();

            if (move_uploaded_file($_FILES["heelImage"]["tmp_name"], $target_file)) {
                //if image uploaded, put heel in db
            } else {
                echo "There was an error uploading your file. ";
                throw new Exception("Datei konnte nicht Hochgeladen werden!");
            }

            $db->commit();
            echo "<h1>Worked :)</h1>";
            echo "<script>window.setTimeout(function(){ window.location.href = 'heelContentPage.php?id=$heelName'; }, 5000);</script>";
        } else {
            echo "Datenbank Fehler!";
            throw new Exception('$db oder $database leer!');
        }
    } catch (PDOException $e1) {
        echo "<h1>Error... " . $e1->getMessage() . "</h1>";
        $db->rollBack();
        $uploadOk = false;
        echo "<script>window.setTimeout(function(){ window.location.href = 'heelCreation.php'; }, 5000);</script>";
    } catch (Exception $e2) {
        echo "<h1>Error... " . $e2->getMessage() . "</h1>";
        $db->rollBack();
        $uploadOk = false;
        echo "<script>window.setTimeout(function(){ window.location.href = 'heelCreation.php'; }, 5000);</script>";
    }


} else {
    echo "<h1>Your Heel was not created.</h1>";
    echo "<script>window.setTimeout(function(){ window.location.href = 'heelCreation.php'; }, 5000);</script>";
}



include 'templates/page_footer.php';
?>