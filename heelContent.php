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
include __DIR__ . '/page_header.php';
$heelName = $heel['heelName'];
$heelTag1 = $heel['heelTag1'];
$heelTag2 = $heel['heelTag2'];
$heelTag3 = $heel['heelTag3'];
$heelImgRef = $heel['heelImgRef'];
?>
<div class="heelContainer">
    <div class="heelContent" id="sticky-sidebar">
        <div class="sticky-top">
            <div class="col-sm">
                <div class="card heel" onclick="location.href='heelContent.php?id=<?=$heelName?>';"> <!--On Click Reference auf Forum -->
                    <img class="card-img-top" src="<?=$heelImgRef?>" alt="Card image"> <!-- Variabel der Referenz-->
                    <div class="card-img-overlay">
                        <h4 class="card-title"><?=$heelName?></h4> <!-- Variabel des Titels-->
                        <p class="card-text"><?=$heelTag1?>,<?=$heelTag2?>,<?=$heelTag3?></p> <!-- Variabel der Tags-->
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
    </div>
</div>
    <div class="heelContainer">
        <div class="heelContent">
            <div class="card post position-sticky">
                <h2>Welcome Message</h2>
                <p></p>
            </div>
        </div>
    </div>
<br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>



<?php
include __DIR__ . '/page_footer.php';
?>