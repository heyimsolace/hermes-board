<?php
$activePage = 'index';

// DATABASE INTEGRATION

// DB INFO
$servername = "game.blur-group.eu";
$username = "hermes";
$password = "hermes";
$database = "hermes_board";

// DB CONNECT
try {
    $db = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// DB FETCH HEELS
$sql = "select * from heel";
$result = $db->query($sql);
if ($result) {
    $heels = $result->fetchAll();
} else {
    echo "fuck";
}
// DB END

include __DIR__ . '/page_header.php'; // HEADER
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
// FOOTER
include __DIR__ . '/page_footer.php';?>
