<?php
//session_destroy();
session_start();
add_action( 'template_redirect','check_user_connected' );
function check_user_connected() {
    if(isset($_GET['code'])):
        $code = $_GET['code'];
    endif;

    if(isset($code) && $code){
        $urlToken = 'https://accounts.spotify.com/api/token';
        $clientID = '9b6f8bfb3ea64460aaa90aff0bbf7336';
        $clientSecret = 'ed26639eff0f44c492e00e212f1a8fb9';

        $data = [
            'grant_type' => 'authorization_code',
            'code'       => $code,
            'redirect_uri' => 'https://soundfuse.code/'
        ];
        $response = wp_remote_post($urlToken, array(
            'body' => $data,
            'headers' => array(
                'Authorization' => 'Basic ' . base64_encode( $clientID . ':' . $clientSecret ),
            ),
        ));

        $response = json_decode($response['body'], true);

        $_SESSION["tokenUser"] = $response['access_token'];
        $_SESSION["tokenRefresh"] = $response['refresh_token'];

        wp_redirect(get_site_url());
    }
}

function get_users_infos(){
    $url = 'https://api.spotify.com/v1/me';

    $response = wp_remote_get($url, array(
        'body' => '',
        'headers' => array(
            'Authorization' => 'Bearer ' . $_SESSION['tokenUser'],
        ),
    ));

    $response = json_decode($response['body']);

    $_SESSION['display_name'] = $response->display_name;
    $_SESSION['user_image'] = $response->images;
    $_SESSION['email'] = $response->email;
    $_SESSION['email'] = $response->email;
    $_SESSION['user_id'] = $response->id;
}


function get_users_playlist(){
    $url = 'https://api.spotify.com/v1/users/'. $_SESSION['user_id'] .'/playlists';

    $response = wp_remote_get($url, array(
        'body' => '',
        'headers' => array(
            'Authorization' => 'Bearer ' . $_SESSION['tokenUser'],
        ),
    ));

    $responseBody = $response['body'];
    $responseBodyFormated = json_decode($responseBody);

    return $responseBodyFormated;
}

function get_search_result(){
    $url = 'https://api.spotify.com/v1/search';

    $data = [
        'q'     => $_GET['search'],
        'type'  => 'track'
    ];

    $response = wp_remote_get($url, array(
        'body' => $data,
        'headers' => array(
            'Authorization' => 'Bearer ' . $_SESSION['tokenUser'],
        ),
    ));

    $responseBody = $response['body'];
    $responseBodyFormated = json_decode($responseBody);

    return $responseBodyFormated;
}

function start_track($id){
    $url = 'https://api.spotify.com/v1/me/player/queue?uri=spotify:track:' . $id;

    $data = [
        'grant_type'     => 'client_credentials'
    ];

    $response = wp_remote_post($url, array(
        'body' => $data,
        'headers' => array(
            'Authorization' => 'Bearer ' . $_SESSION['tokenUser'],
        ),
    ));

    $responseBody = $response['body'];
    $responseBodyFormated = json_decode($responseBody);

    return $responseBodyFormated;
}