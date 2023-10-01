<div class="container-connexion">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="logo">
                    <img src="<?= get_template_directory_uri(); ?>/assets/img/v2/logo.svg" alt="">
                </div>
                <div class="t1">
                    J’ai un compte Soundfuse
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="container-login-extern">
                    <a class="button spotify" href="https://accounts.spotify.com/authorize?client_id=9b6f8bfb3ea64460aaa90aff0bbf7336&response_type=code&redirect_uri=<?= get_site_url() . '/'; ?>&scope=user-modify-playback-state,playlist-read-private,playlist-read-collaborative,user-read-private,user-read-email&state=132456">
                        <span>Se connecter avec Spotify</span>
                    </a>
                    <a class="button deezer" href="https://accounts.spotify.com/authorize?client_id=9b6f8bfb3ea64460aaa90aff0bbf7336&response_type=code&redirect_uri=<?= get_site_url() . '/'; ?>&scope=user-modify-playback-state,playlist-read-private,playlist-read-collaborative,user-read-private,user-read-email&state=132456">
                        <span>Se connecter avec Deezer</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form action="" class="login">
                    <label for="email">Adresse email</label>
                    <input type="email" id="email" placeholder="Adresse email"/>

                    <label for="password">Mot de passe</label>
                    <div class="container-password">
                        <input type="password" id="password" placeholder="Mot de passe"/>
                        <img src="<?= get_template_directory_uri(); ?>/assets/img/v2/oeil.svg" alt="">
                    </div>
                    <button type="submit">
                        Connexion
                    </button>
                    <p class="forget-password">
                        <a href="">Mot de passe oublié</a>
                    </p>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="container no-account">
                <div class="t1">
                    Je n'ai pas de compte
                </div>
                <p>Je n'ai pas encore de compte Soundfuse</p>
                <a href="">Je me créé un compte</a>
            </div>
        </div>
    </div>
</div>


