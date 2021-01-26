<?php
//SQL Selection of Post

$sql1 = "select * from post where postID=$postID";
if (isset($db)) {
    $result1 = $db->query($sql1);
}
if ($result1) {
    $heelPost = $result1->fetch();
} else {
    echo "fuck";
}
//Definition of Variables
$postName = $heelPost['postName'];
$postContent = $heelPost['postContent'];
$postCreatorID = $heelPost['postCreatorID'];
$postVotes = $heelPost['postVotes'];
$postID = $heelPost['postID'];
if (isset($heelPost['postImgRef'])) {
    $postImgRef = $heelPost['postImgRef'];
}

//Selection of userName
$sql2 = "select userName from user where userID='$postCreatorID'";
if (isset($db)) {
    $result2 = $db->query($sql2);
}
if ($result2) {
    $sqlUserName = $result2->fetch();
} else {
    echo "fuck";
}

//creation of substring for better use on page
$postContentSmall = substr($postContent, 0, 100);
?>

<div class="posts card" onclick="location.href='postContentPage.php?id=<?=$postID?>';">
    <?php
    if (isset($postImgRef)) {
        echo "<img class='card-img-top' src='$postImgRef'>";
    } ?>
    <h5 class="card-title"><?= $postName?></h5>
    <div class="card-body">
        <p class="card-text"><?= $postContentSmall?> ...</p>
        <br/>
        <i> ~ <?=$sqlUserName[0]?></i>
    </div>
</div>
