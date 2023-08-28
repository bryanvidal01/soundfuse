<?php
/*
Template Name: Recherche
*/
get_header();

if(isset($_GET['search']) && $_GET['search']){
    $resultsSearch = get_search_result();
}
?>

<div class="on-load"></div>
<div class="track-add">
    <div class="content-track-add">
        <div class="t1">
            <img src="<?= get_template_directory_uri(); ?>/assets/img/bg/success.png" alt="">
            Musique ajoutée à la liste
        </div>
    </div>
</div>
<div class="hero search">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="/">
                    <img src="<?= get_template_directory_uri(); ?>/assets/img/bg/back.png" class="icon-back" alt="">
                </a>
                <form action="/recherche" class="search-fixed">
                    <input type="text" class="search-fixed-input" placeholder="<?= $_GET['search']; ?>" name="search">
                </form>
            </div>
        </div>
    </div>
</div>

<ul class="list-tracks">
    <?php
        $i = 1;
        foreach ($resultsSearch->tracks->items as $resultsSearchItem):

            $imagesAlbumItem = $resultsSearchItem->album->images;
            $imageAlbum = reset($imagesAlbumItem);
            $imageAlbumUrl = $imageAlbum->url;

            $artistsTrack = $resultsSearchItem->album->artists;
            $trackName = $resultsSearchItem->name;
            $trackID = $resultsSearchItem->id;

    ?>

        <li id="<?= $trackID; ?>">
            <a target="_blank" href="/play-music/?title=<?= $trackName; ?>&artiste=<?php
            foreach ($artistsTrack as $artistsTrackItem): echo $artistsTrackItem->name . ','; endforeach; ?>">
                <span class="counter"><?= $i; ?></span>
                <div class="container-image-list">
                    <img src="<?= $imageAlbumUrl; ?>" width="250px" alt="">
                </div>
                <span class="track-info">
                    <div class="title-track">
                        <?= $trackName; ?>
                    </div>
                    <div class="track-author">
                        <?php foreach ($artistsTrack as $artistsTrackItem): echo $artistsTrackItem->name . ' ';  endforeach;?>
                    </div>
                </span>
            </a>
        </li>


    <?php $i++; endforeach; ?>
</ul>


<?php
get_footer();
