<?php
include 'templates/page_header.php';
include '/templates/db.php'; // DB Verbindung -- Gibt pdo als $db

$postExists = false;

$postID = $_POST['postID'];
$postCreatorID = $_SESSION['user'];

// Check for duplicates
try{
    if (!empty($database) && !empty($db)) {
        $db->beginTransaction();

        $sql = $db->query("SELECT postID FROM post where postID=$postID");

        foreach ($sql->fetchAll() as $posts) {
            if(isset($posts[0])) {
                if ($postID == $posts[0]){
                    $postExists = true;
                    break;
                }
            }
            $db->commit();
            }
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

            $sql = $db->prepare("INSERT INTO post(commentContent, commentCreatorID, postID)
                 values (:commentContent, :commentCreatorID, :postID)");

            $sql->bindParam(':commentContent', $postID);
            $sql->bindParam(':commentCreatorID', $postCreatorID);
            $sql->bindParam(':postID', $postID);

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
    echo "<h1>Your comment was not created.</h1>";
    echo "<script>window.setTimeout(function(){ window.location.href = 'postCreation.php'; }, 5000);</script>";
}
include 'templates/page_footer.php';
?>