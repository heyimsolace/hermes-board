<?php
include __DIR__ . '/templates/db.php'; //INCLUDE DER DATENBANK
include __DIR__ . '/templates/page_header.php'; // HEADER


// Erhalten der PostID über Method=GET!
$postID = $_REQUEST['id'];

// Erhalten der Daten des Posts
$sqlPostData = "select * from post where postID=$postID";
if (isset($db)) {
    $resultPostData = $db->query($sqlPostData);
}
if ($resultPostData) {
    $post = $resultPostData->fetch();
} else {
    echo "fuck";
}

// Definieren der Daten des Posts
$postID = $post['postID'];
$postName = $post['postName'];
$postContent = $post['postContent'];
$postCreatorID = $post['postCreatorID'];
$postVotes = $post['postVotes'];
$heelID = $post['heelID'];


// Erhalten der Kommentare
$sqlAvailableComments = "select * from comment where postID=$postID";
if (isset($db)) {
    $resultAvailableComments = $db->query($sqlAvailableComments);
}
if ($resultAvailableComments) {
    $comments = $resultAvailableComments->fetchAll();
} else {
    echo "fuck";
}
?>

<div class="row justify-content-center">
            <div class="col-4 posts">
                <?php include  __DIR__ . '/postContent.php';?>
            </div>
</div>
        <div class="row justify-content-center">
            <?php
                //Ausgeben jedes Kommentars
                foreach($comments as $currentComment) {
                    $commentID = $currentComment[0];
                    include __DIR__ . '/comment.php';
                    }
            ?>
        </div>
<?php
include __DIR__ . '/templates/page_footer.php'; ?>