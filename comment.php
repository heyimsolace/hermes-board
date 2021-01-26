<?php
// Erhalten der Daten des Comments
$sqlCommentData = "select * from comment where commentID=$commentID";

//Definition of Variables
$commentContent = $currentComment['commentContent'];
$commentCreatorID = $currentComment['commentCreatorID'];
$commentVotes = $currentComment['commentVotes'];

//Selection of userName
$sql2 = "select userName from user where userID='$commentCreatorID'";
if (isset($db)) {
    $result2 = $db->query($sql2);
}
if ($result2) {
    $sqlUserName = $result2->fetch();

} else {
    echo "fuck";
}

?><div class="comment col-3 card">
    <div class="card-body posts">
        <p class="card-text"><?= $commentContent?></p>
        <br/>
        <i> ~ <?=$sqlUserName['userName']?></i>
    </div>
</div>