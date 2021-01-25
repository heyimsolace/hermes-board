<?php
// Erhalten der Daten des Comments
$sqlCommentData = "select * from comment where commentID=$commentID";

//Definition of Variables
$commentContent = $currentComment['commentContent'];
$commentCreatorID = $currentComment['commentCreatorID'];
$commentVotes = $currentComment['commentVotes'];

//Selection of userName
$sqlUserName = "select u.username from user u join comment c on u.userID=c.commentCreatorID where commentID=$commentID";
if (isset($db)) {
    $result2 = $db->query($sqlUserName);
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
        <i> ~ <?=$sqlUserName[0]?></i>
    </div>
</div>