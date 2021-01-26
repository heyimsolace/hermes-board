<?php
include __DIR__ . '/templates/page_header.php';
include __DIR__ . '/templates/db.php'; // DB Verbindung -- Gibt pdo als $db

$postExists = false;

$postID = $_POST['postID'];
$postCreatorID = $_POST['userID'];

// Check for duplicates
try {
    if (!empty($database) && !empty($db)) {
        $db->beginTransaction();

        $sql = $db->query("SELECT postID FROM post where postID=$postID");

        foreach ($sql->fetchAll() as $posts) {
            if (isset($posts[0])) {
                if ($postID == $posts[0]) {
                    $postExists = true;
                    break;
                }
            }
        }
        $db->commit();
    }
} catch (PDOException $e1) {
    echo "Error... " . $e1->getMessage();
    $db->rollBack();
    $postExists = false;
} catch (Exception $e2) {
    echo "Error... " . $e2->getMessage();
    $postExists = false;
    $db->rollBack();
}

if ($postExists == true) {
    try {
        if (!empty($database) && !empty($db)) {
            $db->beginTransaction();

            $sql = $db->prepare("INSERT INTO comment(commentContent, commentCreatorID, postID)
                 values (:commentContent, :commentCreatorID, :postID)");

            $sql->bindParam(':commentContent', $_POST['commentContent']);
            $sql->bindParam(':commentCreatorID', $postCreatorID);
            $sql->bindParam(':postID', $postID);

            $sql->execute();

            $db->commit();
            echo "<h1>Worked :)</h1>";
            echo "<script>window.setTimeout(function(){ window.location.href = 'postContentPage.php?id=$postID'; }, 5000);</script>";
        } else {
            echo "Datenbank Fehler!";
            throw new Exception('$db oder $database leer!');
        }
    } catch (PDOException $e1) {
        echo "<p>Error... " . $e1->getMessage() . "</p>";
        $db->rollBack();
        echo "<script>window.setTimeout(function(){ window.location.href = 'postCreation.php'; }, 5000);</script>";
    } catch (Exception $e2) {
        echo "<p>Error... " . $e2->getMessage() . "</p>";
        $db->rollBack();
        echo "<script>window.setTimeout(function(){ window.location.href = 'postCreation.php'; }, 5000);</script>";
    }

} else {
    echo "<h1>Your comment was not created.</h1>";
    echo "<script>window.setTimeout(function(){ window.location.href = 'postCreation.php'; }, 5000);</script>";
}
include 'templates/page_footer.php';
?>