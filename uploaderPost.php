<?php
include __DIR__ . '/templates/page_header.php';
include __DIR__ . '/templates/db.php'; // DB Verbindung -- Gibt pdo als $db

$target_dir = 'img/reference/';

$heelExists = false;
echo $_POST['userID'];
$heelName;
$heelID;
$postCreatorID = $_POST['userID'];


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
            if (in_array($_POST["heelTag1"], $existingHeelTags) && in_array($_POST["heelTag2"], $existingHeelTags) && in_array($_POST["heelTag3"], $existingHeelTags)){
                $heelExists = true;
                $heelID = $heels['heelID'];
                $heelName = $heels['heelName'];
                echo "heel wurde gefunden: " . $heelName;
                break;
            }
        }
        $db->commit();
    }
} catch (PDOException $e1) {
    echo "Error... " . $e1->getMessage();
    $db->rollBack();
    $heelExists = false;
} catch (Exception $e2) {
    echo "Error... " . $e2->getMessage();
    $heelExists = false;
    $db->rollBack();
}

if ($heelExists == true) {

    try {
        if (!empty($database) && !empty($db)) {
            $db->beginTransaction();

            $sql = $db->prepare("INSERT INTO post(postName, postContent, heelID, postCreatorID)
                 values (:postName, :postContent, :heelID, :postCreatorID)");

            $sql->bindParam(':postName', $_POST['postName']);
            $sql->bindParam(':postContent', $_POST["postContent"]);
            $sql->bindParam(':heelID', $heelID);
            $sql->bindParam(':postCreatorID', $postCreatorID);

            $sql->execute();

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
        echo "<script>window.setTimeout(function(){ window.location.href = 'postCreation.php'; }, 5000);</script>";
    } catch (Exception $e2) {
        echo "<h1>Error... " . $e2->getMessage() . "</h1>";
        $db->rollBack();
        echo "<script>window.setTimeout(function(){ window.location.href = 'postCreation.php'; }, 5000);</script>";
    }

} else {
    echo "<h1>Your post was not created.</h1>";
    echo "<script>window.setTimeout(function(){ window.location.href = 'postCreation.php'; }, 5000);</script>";
}
include 'templates/page_footer.php';
?>