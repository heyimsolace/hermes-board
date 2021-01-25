<?php
include __DIR__ . '/db.php'; //INCLUDE DER DATENBANK
include __DIR__ . '/templates/page_header.php'; // HEADER


// SPEICHERN DES AKTUELLEN HEELS ÜBER GET IN $heel
$sql = "select * from post where postID='" . $_REQUEST['id'] . "'";
if (isset($db)) {
    $result = $db->query($sql);
} if ($result) {
    $post = $result->fetch();
} else {
    echo "fuck"; }


$postID = $post['postID'];
$postName = $post['postName'];
$postContent = $post['postContent'];
$postCreatorID = $post['postCreatorID'];
$postVotes = $post['postVotes'];
$heelID = $post['heelID'];

$sql2 = "select * from comment where postID=$postID";
if (isset($db)) {
    $result2 = $db->query($sql2);
} if ($result2) {
    $comments = $result2->fetchAll();
} else {
    echo "fuck"; }
?>
<div class="row">
    <div class="content">
        <div class="wrapper">
            <div class="col-4"> <!-- Sticky Box class=box-->
                <?php include  __DIR__ . '/heelContent.php';?>
            </div>
        </div>
    </div>
        <?php
        $a = 0;
        foreach($comments as $comment){
            $commentID = $comment[0];
            include __DIR__ . '/comment.php';
            }
        ?>
        <div class="box row"> <!-- Position of Endbox -->
            <div class="row"></div>
        </div>
<?php
include __DIR__ . '/templates/page_footer.php'; ?>