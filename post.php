<?php
//SQL Selection of Post

$sql1 = "select * from post where postID=$postID";
if (isset($db)) {
    $result1 = $db->query($sql1);
} if ($result1) {
    $heelPost = $result1->fetch();
} else {
    echo "fuck"; }

//Definition of Variables
$postName = $heelPost['postName'];
$postContent = $heelPost['postContent'];
$postCreatorID = $heelPost['postCreatorID'];
$postVotes = $heelPost['postVotes'];

//Selection of userName
$sqlUserName = "select u.username from user u join post p on u.userID=p.postCreatorID where postID=1337";
if (isset($db)) {
    $result2 = $db->query($sqlUserName);
} if ($result2) {
    $sqlUserName = $result2->fetch();
} else {
    echo "fuck"; }

//creation of substring for better use on page
$postContentSmall = substr($postContent, 0, 100);

switch ($b) {
    case 0:
        $c = 4;
        break;
    case 1:
        $c = 5;
        break;
    case 2:
        $c = 6;
        break;
}
?>


    <div class="row no-gutters justify-content-md-center">
        <div class=" col-5 posts border">
            <b><?=$postName?><br></b>
            <?=$postContentSmall?>...<br>
            <i>⁓ <?=$sqlUserName[0]?></i>
            <?=$postID?>
        </div>
        <div class=" col-5 posts border">
            <b><?=$postName?><br></b>
            <?=$postContentSmall?>...<br>
            <i>⁓ <?=$sqlUserName[0]?></i>
            <?=$postID?>
        </div>
        <div class=" col-5 posts border">
            <b><?=$postName?><br></b>
            <?=$postContentSmall?>...<br>
            <i>⁓ <?=$sqlUserName[0]?></i>
            <?=$postID?>
        </div>
    </div>
