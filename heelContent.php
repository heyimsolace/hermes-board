<?php
include DIR . '/db.php'; //INCLUDE DER DATENBANK
// SPEICHERN DES AKTUELLEN HEELS ÜBER GET IN $heel
$sql = "select * from heel where heelname='" . $_REQUEST['id'] . "'";
if (isset($db)) {
    $result = $db->query($sql);
} if ($result) {
    $heel = $result->fetch();
} else {
    echo "fuck"; }

include DIR . '/page_header.php'
?>
<style>
    heelContentBody {

        background-image: url('<?=$heel['heelImgRef']?>');
        -webkit-filter: blur(1pt);
    }
</style>




<h1><?=$heel['heelName']?></h1>
<h1><?=$heel['heelTag1']?></h1>
<h1><?=$heel['heelTag2']?></h1>
<h1><?=$heel['heelTag3']?></h1>
<div heelContentBody>

</div>

<?php
include DIR . '/page_footer.php'
?>
