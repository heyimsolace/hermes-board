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
        <div class="box"> <!-- Sticky Box-->
            <?php include  __DIR__ . '/heelContent.php';?>
        </div>
        <div class="box"> <!-- Position of Endbox -->
            <div class="col-sm">
            </div>
        </div>
    </div>
    <div class="heelContainer">
        <div class="heelContent">
            <div class="col-sm">
                <div class="card heel" onclick="location.href='heelContent.php?id=<?=$heelTitle?>';"> <!--On Click Reference auf Forum -->
                    <img class="card-img-top" src="<?=$heelImgRef?>" alt="Card image"> <!-- Variabel der Referenz-->
                    <div class="card-img-overlay">
                        <h4 class="card-title"><?=$heelTitle?></h4> <!-- Variabel des Titels-->
                        <p class="card-text"><?=$heelTag1?>,<?=$heelTag2?>,<?=$heelTag3?></p> <!-- Variabel der Tags-->
                        <!-- <a href="#" class="btn btn-primary">See Profile</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include __DIR__ . '/templates/page_footer.php'; ?>

