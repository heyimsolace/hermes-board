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
?>

<div class="content">
    <div class="wrapper">
        <div class="box"> <!-- Sticky Box-->
            <div class="col-sm">
                <div class="card heel" onclick="location.href='heelContent.php?id=<?=$heelName?>';">
                    <img class="card-img-top" src="<?=$heelImgRef?>" alt="Card image">
                    <div class="card-img-overlay">
                        <h4 class="card-title"><?=$heelName?></h4>
                        <p class="card-text"><?=$heelTag1?>,<?=$heelTag2?>,<?=$heelTag3?></p>
                    </div>
                </div>
            </div>
            <div class="col-sm"> <!-- Description -->
                <div class="card heelDesc">
                    <h2>Description</h2> <!-- 450 Zeichen -->
                    <p>Lorem iipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. </p>
                </div>
            </div>
        </div>
        <div class="box"> <!-- Position of Endbox -->
            <div class="col-sm">
            </div>
        </div>
    </div>
</div>

<?php
include __DIR__ . '/templates/page_footer.php'; ?>

