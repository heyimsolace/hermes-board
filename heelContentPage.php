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
$heelID = $heel['heelID'];
$heelName = $heel['heelName'];
$heelTag1 = $heel['heelTag1'];
$heelTag2 = $heel['heelTag2'];
$heelTag3 = $heel['heelTag3'];
$heelImgRef = $heel['heelImgRef'];
$heelTitle = $heel['heelName'];
$heelDesc = $heel['heelDesc'];
?>

<div class="content">
    <div class="wrapper">
        <div class="flex-row">
            <div class="box col-4"> <!-- Sticky Box-->
                <?php include  __DIR__ . '/heelContent.php';?>
            </div>

        <?php
        $sql2 = "select postID from post where heelID=$heelID";
        if (isset($db)) {
            $result2 = $db->query($sql2);
        } if ($result2) {
            $posts = $result2->fetchAll();
        } else {
            echo "fuck"; }

        $a = 0;
        foreach($posts as $post){
            $b = $a % 3;
            $a += 1;
            $postID = $post[0];
            include __DIR__ . '/post.php';
            }
        //$postID = $post;
        //include __DIR__ . '/post.php';}
        ?>


        <div class="box col-4"> <!-- Position of Endbox -->
            <div class="col-4"></div>
        </div>



<?php
include __DIR__ . '/templates/page_footer.php'; ?>