<?php
if($_SESSION["tokenUser"]):
    get_users_infos();
    $playlistUser = get_users_playlist();
endif;
?>

<div class="hero">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="t1">Mon profil</div>
            </div>
            <div class="col-6 text-right">
                <div class="info-user">
                    <div class="user-name"><?= $_SESSION['display_name']; ?></div>
                    <div class="link-account">Mon compte</div>
                </div>
                <div class="img-user">
                    <img src="<?= $_SESSION['user_image'][0]->url; ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-search-form">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="t2">Devenez le DJ de la soirée</div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                <form action="/recherche">
                    <input type="text" placeholder="Que souhaitez-vous écouter ?" name="search">
                    <button type="submit">C'est parti !</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container-playlist">
    <div class="container">
        <div class="col-12">
            <div class="t2">Mes playlsits Spotify</div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, animi dolorem est eum ex illum nemo nostrum provident qui quis ratione</p>
        </div>
    </div>
</div>

<ul class="playlists">
    <?php
    if(isset($playlistUser->items) && $playlistUser->items):
        foreach ($playlistUser->items as $playlistUserItem):

            $imagesPlaylist = $playlistUserItem->images;
            $imagePlaylist = reset($imagesPlaylist);

            $imagePlaylistUrl = $imagePlaylist->url;

            $idPlaylist = $playlistUserItem->id;

            $titlePlaylist = $playlistUserItem->name;
            ?>

            <li>
                <div class="container-playlist">
                    <div class="container-image">
                        <img width="150px" src="<?= $imagePlaylistUrl; ?>" alt="">
                    </div>
                    <div class="name-playlist"><?= $titlePlaylist; ?></div>
                </div>
            </li>

        <?php
        endforeach;
    endif;
    ?>
</ul>