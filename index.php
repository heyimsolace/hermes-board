<?php
$activePage = 'index';

include __DIR__ . '/templates/db.php'; // DB Verbindung -- Gibt pdo als $db

// DB FETCH HEELS
$sql = "select * from heel";
if (isset($db)) {
    $result = $db->query($sql);
}
if ($result) {
    $heels = $result->fetchAll();
} else {
    echo "fuck";
}

include __DIR__ . '/templates/page_header.php'; // HEADER
?>

<div class="container">
    <div class="row">
        <?php
        shuffle($heels);
        foreach ($heels as $heel) {
            $heelTitle = $heel['heelName']; $heelTag1 = $heel['heelTag1']; $heelTag2 = $heel['heelTag2']; $heelTag3 = $heel['heelTag3']; $heelImgRef = $heel['heelImgRef'];
            include  __DIR__ . '/heel.php';
        }?>
    </div>
</div>

<?php
include __DIR__ . '/templates/page_footer.php'; // FOOTER
