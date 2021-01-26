
<!-- Heel -->
<div class="card heel" onclick="location.href='heelContentPage.php?id=<?=$heelTitle?>';">
    <img class="card-img-top" src="<?=$heelImgRef?>" alt="Card image">
    <div class="card-img-overlay">
        <h4 class="card-title"><span><?=$heelTitle?></span></h4>
        <p class="card-text"><span><?=$heelTag1?>,<?=$heelTag2?>,<?=$heelTag3?></span></p>
    </div>
</div>
<!-- Description -->
<div class="card heelDesc">
    <h5 class="card-header heelDescHeader">Description</h5>
    <div class="card-body">
        <p class="card-text"><?=$heelDesc?></p>
    </div>
</div>