<?php
if($_SESSION["tokenUser"]):
    get_users_infos();
    $playlistUser = get_users_playlist();
endif;

//print_r($_SESSION)
?>

<div class="page-accout page" id="account">
    <div class="hero">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="t1">Mon profil</div>
                </div>
                <div class="col-6 text-right">
                    <a href="" class="button-follow account-modify-cta">
                        Mon compte
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="page-account visible">
        <div class="container hero-user">
            <div class="row">
                <div class="col-12">
                    <div class="name-user">
                        <?= $_SESSION['display_name']; ?>
                    </div>
                    <div class="classement">
                        <img src="<?= get_template_directory_uri(); ?>/assets/img/v2/badge-100.svg" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="grid-user">
            <div class="container-image-user">
                <img src="<?= $_SESSION['user_image'][1]->url; ?>" alt="">
            </div>
            <div class="container-score-user">
                <div class="container-followers">
                    <div class="content">
                        <p>
                            <strong>110</strong>
                            abonnés
                        </p>
                        <p>
                            <strong>120</strong>
                            abonnement
                        </p>
                    </div>
                </div>
                <div class="container-score">
                    <div class="content">
                        <p>
                            Score
                            <strong>11230</strong>
                        </p>
                        <p>
                            Participations
                            <strong>120</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="intro-section">
                        <div class="row">
                            <div class="col-8">
                                <div class="title-section">Abonnés</div>
                            </div>
                            <div class="col-4 text-right">
                                <a href="">Voir tout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="list-abonned">
            <ul>
                <li>
                    <div class="container-image">
                        <img src="https://fakeimg.pl/50x50/" alt="">
                    </div>
                </li>
                <li>
                    <div class="container-image">
                        <img src="https://fakeimg.pl/50x50/" alt="">
                    </div>
                </li>
                <li>
                    <div class="container-image">
                        <img src="https://fakeimg.pl/50x50/" alt="">
                    </div>
                </li>
                <li>
                    <div class="container-image">
                        <img src="https://fakeimg.pl/50x50/" alt="">
                    </div>
                </li>
                <li>
                    <div class="container-image">
                        <img src="https://fakeimg.pl/50x50/" alt="">
                    </div>
                </li>
                <li>
                    <div class="container-image">
                        <img src="https://fakeimg.pl/50x50/" alt="">
                    </div>
                </li>
                <li>
                    <div class="container-image">
                        <img src="https://fakeimg.pl/50x50/" alt="">
                    </div>
                </li>
                <li>
                    <div class="container-image">
                        <img src="https://fakeimg.pl/50x50/" alt="">
                    </div>
                </li>
                <li>
                    <div class="container-image">
                        <img src="https://fakeimg.pl/50x50/" alt="">
                    </div>
                </li>
                <li>
                    <div class="container-image">
                        <img src="https://fakeimg.pl/50x50/" alt="">
                    </div>
                </li>
                <li>
                    <div class="container-image">
                        <img src="https://fakeimg.pl/50x50/" alt="">
                    </div>
                </li>
                <li>
                    <div class="container-image">
                        <img src="https://fakeimg.pl/50x50/" alt="">
                    </div>
                </li>
            </ul>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="intro-section">
                        <div class="row">
                            <div class="col-8">
                                <div class="title-section">Dernières participations</div>
                            </div>
                            <div class="col-4 text-right">
                                <a href="">Voir tout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container container-list-song">
            <div class="row">
                <div class="col-12">
                    <ul>
                        <li class="row song-in-list">
                            <div class="col-3">
                                <div class="img-list">
                                    <img src="https://fakeimg.pl/90x90/" alt="">
                                </div>
                            </div>
                            <div class="col-9">
                                <p>
                                    <strong>
                                        Perfect
                                    </strong>
                                    One direction
                                </p>
                            </div>
                        </li>
                        <li class="row song-in-list">
                            <div class="col-3">
                                <div class="img-list">
                                    <img src="https://fakeimg.pl/90x90/" alt="">
                                </div>
                            </div>
                            <div class="col-9">
                                <p>
                                    <strong>
                                        Perfect
                                    </strong>
                                    One direction
                                </p>
                            </div>
                        </li>
                        <li class="row song-in-list">
                            <div class="col-3">
                                <div class="img-list">
                                    <img src="https://fakeimg.pl/90x90/" alt="">
                                </div>
                            </div>
                            <div class="col-9">
                                <p>
                                    <strong>
                                        Perfect
                                    </strong>
                                    One direction
                                </p>
                            </div>
                        </li>
                        <li class="row song-in-list">
                            <div class="col-3">
                                <div class="img-list">
                                    <img src="https://fakeimg.pl/90x90/" alt="">
                                </div>
                            </div>
                            <div class="col-9">
                                <p>
                                    <strong>
                                        Perfect
                                    </strong>
                                    One direction
                                </p>
                            </div>
                        </li><li class="row song-in-list">
                            <div class="col-3">
                                <div class="img-list">
                                    <img src="https://fakeimg.pl/90x90/" alt="">
                                </div>
                            </div>
                            <div class="col-9">
                                <p>
                                    <strong>
                                        Perfect
                                    </strong>
                                    One direction
                                </p>
                            </div>
                        </li>
                        <li class="row song-in-list">
                            <div class="col-3">
                                <div class="img-list">
                                    <img src="https://fakeimg.pl/90x90/" alt="">
                                </div>
                            </div>
                            <div class="col-9">
                                <p>
                                    <strong>
                                        Perfect
                                    </strong>
                                    One direction
                                </p>
                            </div>
                        </li>
                        <li class="row song-in-list">
                            <div class="col-3">
                                <div class="img-list">
                                    <img src="https://fakeimg.pl/90x90/" alt="">
                                </div>
                            </div>
                            <div class="col-9">
                                <p>
                                    <strong>
                                        Perfect
                                    </strong>
                                    One direction
                                </p>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="modify-account hide">
        <div class="container-image">
            <img src="<?= $_SESSION['user_image'][1]->url; ?>" alt="">
            <div class="modify-image">
                <div class="modify-image-link">
                    Modifier ma photo
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="" class="modify-account-form">
                        <label for="">
                            Changer le nom d'utilisateur
                            <input type="text" class="border-b-only" value="<?= $_SESSION['display_name']; ?>">
                        </label>
                        <button type="submit">Apporter les modifications</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="t1">
                        Confidentialité
                    </div>
                    <p>
                        Un compte public permet aux autres
                        de suivre votre compte ainsi que vos activitées
                    </p>
                    <div class="form-group">
                        <input type="checkbox" id="html">
                        <label for="html">Mode privé</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="participate page" id="participer" style="display:none;">
    <div class="hero">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="t1">Participer</div>
                </div>
            </div>
        </div>
    </div>

    <div class="geolocation vue-geolocation hide">
        <div class="loader-location">
            <img src="<?= get_template_directory_uri(); ?>/assets/img/v2/menu/participer.svg" alt="">
        </div>
        <div class="text-loader">
            Localisation en cours
        </div>
    </div>


    <div class="vue-bar">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="container-bar">
                        <div class="image-bar">
                            <img src="https://images.pexels.com/photos/1850592/pexels-photo-1850592.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="background-bar" alt="">

                            <div class="logo-bar">
                                <img src="https://logos-marques.com/wp-content/uploads/2020/04/logo-Louis-Vuitton.jpg" alt="">
                            </div>
                        </div>
                        <div class="info-bar">
                            <p>
                                Restaurant et bar
                            </p>
                            <div class="t1">
                                Le Klay Saint Sauveur
                            </div>
                            <p>
                                4bis Rue Saint-Sauveur, 75002 Paris
                            </p>
                            <a href="" class="button white">
                                C'est parti !
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="container-qr-code">
                    <div class="col-12">
                        <div class="qrcode">
                            <div class="t2">
                                Ce n'est pas le bon bar
                            </div>

                            <div class="row">
                                <div class="col-2">
                                    <img src="<?= get_template_directory_uri(); ?>/assets/img/v2/qrcode.svg" class="img-qrcode" alt="">
                                </div>
                                <div class="col-10">
                                    <p>
                                        Vous ne trouvez pas le bar
                                    </p>
                                    <a href="" class="link">
                                        Flasher le QRcode
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

