<?php
/*
Template Name: Playlist
*/
get_header();

if(isset($_GET['playlist_id']) && $_GET['playlist_id']){
    $playlistCurrent = get_playlist_current();

    $tracks = $playlistCurrent->tracks;

    //var_dump($tracks);
    $images = $playlistCurrent->images;
    $image = $images[0];
    $imageUrl = $image->url;
    $namePlaylist = $playlistCurrent->name;
    $numberTracks = count($playlistCurrent->tracks->items);
    $collaborative = $playlistCurrent->collaborative;
}
?>

<div class="on-load">
    <div class="loading"></div>
</div>
<div class="track-add success">
    <div class="content-track-add">
        <div class="t1">
            <img src="<?= get_template_directory_uri(); ?>/assets/img/bg/success.png" alt="">
            Musique ajoutée à la liste
        </div>
    </div>
</div>
<div class="track-add error">
    <div class="content-track-add">
        <div class="t1">
            Un problème est survenu
        </div>
    </div>
</div>


<div class="hero search playlist">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <a href="/">
                    <img src="<?= get_template_directory_uri(); ?>/assets/img/bg/back.png" class="icon-back" alt="">
                </a>
            </div>
            <div class="col-8 text-center">
               <div class="t2">
                   Ma playlist
               </div>
            </div>
        </div>
    </div>
</div>

<div class="container-img-playlist" style="background-image: url('<?= $imageUrl; ?>');">
    <div class="container-info-playlist">
        <p><?= ($collaborative) ? 'Playlist public' : 'Playlist privé'; ?></p>
        <div class="t1">
            <?= $namePlaylist; ?>
        </div>
        <p><?= $numberTracks; ?> titres</p>
    </div>
</div>

<ul class="list-tracks playlist">
    <?php
        $i = 1;
        foreach ($tracks->items as $resultsSearchItem):
            $imagesAlbumItem = $resultsSearchItem->track->album->images;
            $imageAlbum = reset($imagesAlbumItem);
            $imageAlbumUrl = $imageAlbum->url;

            $artistsTrack = $resultsSearchItem->track->album->artists;
            $trackName = $resultsSearchItem->track->name;
            $trackID = $resultsSearchItem->track->id;

    ?>

        <li id="<?= $trackID; ?>">
            <a target="_blank" href="<?php echo admin_url( 'admin-ajax.php' ); ?>" data-title="<?= $trackName; ?>" data-artists="<?php
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
