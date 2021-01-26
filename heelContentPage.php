<?php
include __DIR__ . '/templates/page_header.php';
include __DIR__ . '/templates/db.php'; // DB Verbindung -- Gibt pdo als $db


// SPEICHERN DES AKTUELLEN HEELS ÜBER GET IN $heel
$sql = "select * from heel where heelname='" . $_REQUEST['id'] . "'";
if (isset($db)) {
    $result = $db->query($sql);
} if ($result) {
    $heel = $result->fetch();
} else {
    echo "fuck"; }


$heelID = $heel['heelID'];
$heelName = $heel['heelName'];
$heelTag1 = $heel['heelTag1'];
$heelTag2 = $heel['heelTag2'];
$heelTag3 = $heel['heelTag3'];
$heelImgRef = $heel['heelImgRef'];
$heelTitle = $heel['heelName'];
$heelDesc = $heel['heelDesc'];

$sql2 = "select postID from post where heelID=$heelID";
if (isset($db)) {
    $result2 = $db->query($sql2);
} if ($result2) {
    $posts = $result2->fetchAll();
} else {
    echo "fuck"; }
?>
<div class="row posts justify-content-center">
                <?php include  __DIR__ . '/heelContent.php';?>
    </div>
<div class="row posts justify-content-center">
        <?php
        $a = 0;
        foreach($posts as $post){
            $postID = $post[0];
            include __DIR__ . '/post.php';
            }
        ?>
</div>
<?php
include __DIR__ . '/templates/page_footer.php'; ?>