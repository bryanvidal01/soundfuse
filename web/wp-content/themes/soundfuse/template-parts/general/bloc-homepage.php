<?php
if($_SESSION["tokenUser"]):
    get_users_infos();
    $playlistUser = get_users_playlist();
endif;
?>

<h1>Mon profil</h1>
<p><?= $_SESSION['display_name']; ?></p>
<p><?= $_SESSION['email']; ?></p>
<img src="<?= $_SESSION['user_image'][0]->url; ?>" alt="">

<hr />
<h2>Ajout d'un son</h2>
<form action="/recherche">
    <input type="text" name="search">
    <button type="submit">Envoyer</button>
</form>

<hr />
<h2>Playlists</h2>
<ul>
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
                <img width="150px" src="<?= $imagePlaylistUrl; ?>" alt="">
                <span><?= $titlePlaylist; ?></span>
            </li>

        <?php
        endforeach;
    endif;
    ?>
</ul>