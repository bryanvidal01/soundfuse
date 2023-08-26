<?php
    function soundtrack_get_user_infos(){
        $json='{"query": "query { me { ...on PublicAPIClient { accounts(first: 1) { edges { node { businessName locations(first: 1) { edges { node { name soundZones(first: 2) { edges { node { id name } } } } } } } } } } }}"}';

        $response = wp_remote_post('https://api.soundtrackyourbrand.com/v2/', array(
            'body' => $json,
            'headers' => array(
                'Authorization' => 'Basic NVNyYVR6MVBxenVNNW0wQkFCOXAzMnpOYlZkUDk4Y046Q2ppaFd1Rk9ISEhXN00xSHAyN2VvTENUWG5nSUZJcnROZXhXS2J5VnZEVHNIM0JNUVhFVHFsQ0JkOWwxVWtlbw==',
                'Content-Type' => 'application/json'
            ),
        ));

        $formattedDatas = json_decode($response['body']);
        return $formattedDatas;
    }

    function soundtrack_get_current_zone(){
        $json='{"query": "{ nowPlaying(soundZone: \"U291bmRab25lLCwxbXA0ZnJ3ZXkyby9Mb2NhdGlvbiwsMWlyNjF6dnJmMjgvQWNjb3VudCwsMWNzcXBldnJjb3cv\") { track { id album { image { url } } } }}"}';

        $response = wp_remote_post('https://api.soundtrackyourbrand.com/v2/', array(
            'body' => $json,
            'headers' => array(
                'Authorization' => 'Basic NVNyYVR6MVBxenVNNW0wQkFCOXAzMnpOYlZkUDk4Y046Q2ppaFd1Rk9ISEhXN00xSHAyN2VvTENUWG5nSUZJcnROZXhXS2J5VnZEVHNIM0JNUVhFVHFsQ0JkOWwxVWtlbw==',
                'Content-Type' => 'application/json'
            ),
        ));

        $formattedDatas = json_decode($response['body']);
        return $formattedDatas;
    }

    function SoundtrackSearchTrack($title, $artiste){
        $json='{"query": "query search { search(query: \"'. $title . ' '. $artiste .'\", type: track) { edges { node { ... on Track { id name artists { name } } } } }}"}';

        $response = wp_remote_post('https://api.soundtrackyourbrand.com/v2/', array(
            'body' => $json,
            'headers' => array(
                'Authorization' => 'Basic NVNyYVR6MVBxenVNNW0wQkFCOXAzMnpOYlZkUDk4Y046Q2ppaFd1Rk9ISEhXN00xSHAyN2VvTENUWG5nSUZJcnROZXhXS2J5VnZEVHNIM0JNUVhFVHFsQ0JkOWwxVWtlbw==',
                'Content-Type' => 'application/json'
            ),
        ));

        $formattedDatas = json_decode($response['body']);
        return $formattedDatas;
    }


    function update_waitlist($idTrack){
        $json='{"query": "mutation { __typename soundZoneQueueTracks(input: { soundZone: \"U291bmRab25lLCwxbXA0ZnJ3ZXkyby9Mb2NhdGlvbiwsMWlyNjF6dnJmMjgvQWNjb3VudCwsMWNzcXBldnJjb3cv\", tracks: [\"'. $idTrack .'\"] }){ status }}"}';

        $response = wp_remote_post('https://api.soundtrackyourbrand.com/v2/', array(
            'body' => $json,
            'headers' => array(
                'Authorization' => 'Basic NVNyYVR6MVBxenVNNW0wQkFCOXAzMnpOYlZkUDk4Y046Q2ppaFd1Rk9ISEhXN00xSHAyN2VvTENUWG5nSUZJcnROZXhXS2J5VnZEVHNIM0JNUVhFVHFsQ0JkOWwxVWtlbw==',
                'Content-Type' => 'application/json'
            ),
        ));

        //var_dump($response);

        $formattedDatas = json_decode($response['body']);
        return $formattedDatas;
    }

?>