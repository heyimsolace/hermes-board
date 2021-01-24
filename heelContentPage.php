<?php
include __DIR__ . '/db.php'; //INCLUDE DER DATENBANK
// SPEICHERN DES AKTUELLEN HEELS ÜBER GET IN $heel
$sql = "select * from heel where heelname='" . $_REQUEST['id'] . "'";
if (isset($db)) {
    $result = $db->query($sql);
} if ($result) {
    $heel = $result->fetch();
} else {
    echo "fuck"; }
include __DIR__ . '/templates/page_header.php'; // HEADER
$heelName = $heel['heelName'];
$heelTag1 = $heel['heelTag1'];
$heelTag2 = $heel['heelTag2'];
$heelTag3 = $heel['heelTag3'];
$heelImgRef = $heel['heelImgRef'];
$heelTitle = $heel['heelName'];
$heelDesc = $heel['heelDesc'];



$sql1 = "select * from post where postID=1337";
if (isset($db)) {
    $result1 = $db->query($sql1);
} if ($result1) {
    $heelPost = $result1->fetch();
} else {
    echo "fuck"; }

$postName = $heelPost['postName'];
$postContent = $heelPost['postContent'];
$postCreatorID = $heelPost['postCreatorID'];
$postVotes = $heelPost['postVotes']

?>

<div class="content">
    <div class="wrapper">
            <div class="box flex-column"> <!-- Sticky Box-->
                <?php include  __DIR__ . '/heelContent.php';?>
            </div>

        <p class="posts container flex-column border">
                <?=$postContent?> ⁓ <?=$postCreatorID?>
        </p>


        <div class="box col-4"> <!-- Position of Endbox -->
            <div class="col-4"></div>
        </div>



<?php
include __DIR__ . '/templates/page_footer.php'; ?>

