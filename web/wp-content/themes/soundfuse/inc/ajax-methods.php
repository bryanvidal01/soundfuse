<?php
add_action('wp_ajax_example', 'example_callback');
add_action('wp_ajax_nopriv_example', 'example_callback');
function example_callback() {
    // Security
    checkNonce('exampleNonce');

    $var = isset($_POST['var']) ? filter_var($_POST['var'], FILTER_SANITIZE_STRING) : '';

    if (!empty($var)) {
        $response['status'] = 200;
        ob_start();
        ?>

        <!-- HTML -->
        
        <?php
        $response['content'] = ob_get_clean();
        $message = '';
    } else {
        $response['status'] = 300;
        $message = '';
    }

    $response['message'] = $message;
    wp_send_json($response);
}

add_action('wp_ajax_rgpd', 'rgpd_callback');
add_action('wp_ajax_nopriv_rgpd', 'rgpd_callback');


add_action( 'wp_ajax_nopriv_sync_tracks', 'sync_tracks' );
add_action( 'wp_ajax_sync_tracks', 'sync_tracks' );

function sync_tracks(){
    $title = stripslashes($_POST['title']);
    $artiste = stripslashes($_POST['artists']);

    $artisteArray = [];
    $artisteArray = explode(",", $artiste, -1);
    $artistsObject = [];
    $i= 0;

    foreach ($artisteArray as $artistItem){

        $artistsObject[$i] = (object) array('name' => $artistItem);
        $i++;
    }


    $soundTrackSync = SoundtrackSearchTrack($title, $artiste);

    $waitList = array();

    $artistsObjectJson = strtolower(json_encode($artistsObject));


    if(isset($soundTrackSync->data->search->edges) && $soundTrackSync->data->search->edges){
        $datas = $soundTrackSync->data->search->edges;

        foreach ($datas as $data){
            $titleTrack = $data->node->name;
            $idTrack = $data->node->id;
            $artists = $data->node->artists;
            $artistJson = strtolower(json_encode($artists));
            $market = $data->node->availableMarkets;

            if($artistJson == $artistsObjectJson && $titleTrack == $title && empty($waitList) && !empty($market)){
                $waitList['name'] = $titleTrack;
                $waitList['artists'] = $artists;
                $waitList['id'] = $idTrack;
            }
        }

        if(empty($waitList)){
            $related = true;
            foreach ($datas as $data){
                $titleTrack = $data->node->name;
                $idTrack = $data->node->id;
                $artists = $data->node->artists;
                $artistJson = strtolower(json_encode($artists));
                $market = $data->node->availableMarkets;

                if(empty($waitList)){

                    foreach ($artists as $artist){

                        $NameArtist = $artist->name;

                        foreach ($artisteArray as $artisteArraySearchItem){

                            if(strtolower($NameArtist) == strtolower($artisteArraySearchItem) && empty($waitList) && !empty($market)){
                                if(str_contains($titleTrack, $title) || str_contains($title, $titleTrack)){
                                    $waitList['name'] = $titleTrack;
                                    $waitList['artists'] = $artists;
                                    $waitList['id'] = $idTrack;
                                }
                            }
                        }

                    }
                }
            }
        }
    }


    if($waitList){
        update_waitlist($waitList['id']);
        $returnCode['status'] = 201;
    }else{
        $returnCode['status'] = 404;
    }


    wp_send_json($returnCode);

}