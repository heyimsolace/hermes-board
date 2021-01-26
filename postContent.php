<?php
//Selection of userName
$sqlUserName = "select u.username from user u join post p on u.userID=p.postCreatorID where postID=$postID";
if (isset($db)) {
$result2 = $db->query($sqlUserName);
}
if ($result2) {
$sqlUserName = $result2->fetch();
} else {
echo "fuck";
}
?>

<div class="posts card highlighted" onclick="location.href='postContentPage.php?id=<?=$postID?>';">
    <?php
    if (isset($postImgRef)) {
        echo "<img class='card-img-top' src='$postImgRef'>";
    } ?>
    <h5 class="card-title"><?= $postName?></h5>
    <div class="card-body">
        <p class="card-text"><?= $postContent?></p>
        <br/>
        <i> ~ <?=$sqlUserName[0]?></i>
        <form action="login.php?dest=comment" method="post">
            <input type="hidden" value="<?=$postID?>" name="postID">
            <button type="submit" class="btn btn-dark commentBtn">Comment</button>
        </form>
    </div>
</div>
