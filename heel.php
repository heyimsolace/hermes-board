<div class="col-sm">
    <div class="card heel" onclick="location.href='index.php';"> <!--On Click Reference auf Forum -->
        <img class="card-img-top" src="<?=$heelImgRef?>" alt="Card image"> <!-- Variabel der Referenz-->
        <div class="card-img-overlay">
            <h4 class="card-title"><?=$heelTitle?></h4> <!-- Variabel des Titels-->
            <p class="card-text"><?=$heelTags?></p> <!-- Variabel der Tags-->
            <!-- <a href="#" class="btn btn-primary">See Profile</a> -->
        </div>
    </div>
</div>

<!-- Benutzen Variablen-->
<?php
$heelTitle = "";
$heelTags = "";
$heelImgRef = "";
?>