<?php
/*
Template Name: Recherche
*/
get_header();

if(isset($_GET['search']) && $_GET['search']){
    $resultsSearch = get_search_result();
}
?>

<h2>Ajout d'un son</h2>
<form action="/recherche">
    <input type="text" name="search">
    <button type="submit">Envoyer</button>
</form>
<hr/>

<ul>
    <?php
        foreach ($resultsSearch->tracks->items as $resultsSearchItem):

            $imagesAlbumItem = $resultsSearchItem->album->images;
            $imageAlbum = reset($imagesAlbumItem);
            $imageAlbumUrl = $imageAlbum->url;

            $artistsTrack = $resultsSearchItem->album->artists;
            $trackName = $resultsSearchItem->name;
            $trackID = $resultsSearchItem->id;

            //var_dump($resultsSearchItem->id);
    ?>

        <li id="<?= $trackID; ?>">
            <a target="_blank" href="/play-music/?id=<?= $trackID; ?>">
                <img src="<?= $imageAlbumUrl; ?>" width="250px" alt="">
                <span>
                <?php foreach ($artistsTrack as $artistsTrackItem): echo $artistsTrackItem->name . ' ';  endforeach;?>- <?= $trackName; ?></span>
            </a>
        </li>


    <?php endforeach; ?>
</ul>


<?php
get_footer();
