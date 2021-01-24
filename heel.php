<div class="col-sm">
    <div class="card heel" onclick="location.href='heelContentPage.php?id=<?=$heelTitle?>';"> <!--On Click Reference auf Forum -->
        <img class="card-img-top" src="<?=$heelImgRef?>" alt="Card image"> <!-- Variabel der Referenz-->
        <div class="card-img-overlay">
            <h4 class="card-title"><?=$heelTitle?></h4> <!-- Variabel des Titels-->
            <p class="card-text"><?=$heelTag1?>,<?=$heelTag2?>,<?=$heelTag3?></p> <!-- Variabel der Tags-->
            <!-- <a href="#" class="btn btn-primary">See Profile</a> -->
        </div>
    </div>
</div>

<!-- Benutzen Variablen-->
<?php
$heelTitle = "";
$heelTag1 = "";
$heelTag2 = "";
$heelTag3 = "";
$heelImgRef = "";
?>