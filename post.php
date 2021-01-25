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
if (isset($heelPost['postImgRef'])) {
    $postImgRef = $heelPost['postImgRef'];
}


//Selection of userName
$sqlUserName = "select u.username from user u join post p on u.userID=p.postCreatorID where postID=1337";
if (isset($db)) {
    $result2 = $db->query($sqlUserName);
}
if ($result2) {
    $sqlUserName = $result2->fetch();
} else {
    echo "fuck";
}

//creation of substring for better use on page
$postContentSmall = substr($postContent, 0, 100);
?>

<div class="posts card" onclick="window.location.href='/postContent.php?<?=$postID?>'">
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
