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
        /*$json='{"query":"query search {\\n  search(query: \\"rihanna\\", type: track) {\\n    edges {\\n      node {\\n        ... on Track {\\n          id\\n          name\\n        }\\n      }\\n    }\\n  }\\n}","variables":{}}';

        $response = wp_remote_post('https://api.soundtrackyourbrand.com/v2/', array(
            'body' => $json,
            'headers' => array(
                'Authorization' => 'Basic NVNyYVR6MVBxenVNNW0wQkFCOXAzMnpOYlZkUDk4Y046Q2ppaFd1Rk9ISEhXN00xSHAyN2VvTENUWG5nSUZJcnROZXhXS2J5VnZEVHNIM0JNUVhFVHFsQ0JkOWwxVWtlbw==',
                'Content-Type' => 'application/json'
            ),
        ));

        var_dump($response); die;

        $formattedDatas = json_decode($response['body']);*/

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.soundtrackyourbrand.com/v2',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{"query":"query search {\\n  search(query: \\"'. $title .'\\", type: track) {\\n    edges {\\n      node {\\n        ... on Track {\\n          id\\n          name\\n          availableMarkets\\n      artists {\\n            name\\n          }\\n        }\\n      }\\n    }\\n  }\\n}","variables":{}}',
            //CURLOPT_POSTFIELDS =>'{"query":"query search {\\n  search(query: \\"Man%20Down\\", type: track) {\\n    edges {\\n      node {\\n        ... on Track {\\n          id\\n          name\\n          artists {\\n            name\\n          }\\n        }\\n      }\\n    }\\n  }\\n}","variables":{}}',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic NVNyYVR6MVBxenVNNW0wQkFCOXAzMnpOYlZkUDk4Y046Q2ppaFd1Rk9ISEhXN00xSHAyN2VvTENUWG5nSUZJcnROZXhXS2J5VnZEVHNIM0JNUVhFVHFsQ0JkOWwxVWtlbw==',
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        $formattedDatas = json_decode($response);

        //var_dump($formattedDatas);

        return $formattedDatas;
    }


    function update_waitlist($idTrack){

        //var_dump($idTrack);
        /*$json='{"query": "mutation { __typename soundZoneQueueTracks(input: { soundZone: \"U291bmRab25lLCwxbXA0ZnJ3ZXkyby9Mb2NhdGlvbiwsMWlyNjF6dnJmMjgvQWNjb3VudCwsMWNzcXBldnJjb3cv\", tracks: [\"'. $idTrack .'\"] }){ status }}"}';

        $response = wp_remote_post('https://api.soundtrackyourbrand.com/v2/', array(
            'body' => $json,
            'headers' => array(
                'Authorization' => 'Basic NVNyYVR6MVBxenVNNW0wQkFCOXAzMnpOYlZkUDk4Y046Q2ppaFd1Rk9ISEhXN00xSHAyN2VvTENUWG5nSUZJcnROZXhXS2J5VnZEVHNIM0JNUVhFVHFsQ0JkOWwxVWtlbw==',
                'Content-Type' => 'application/json'
            ),
        ));

        //var_dump($response);

        $formattedDatas = json_decode($response['body']);
        return $formattedDatas;*/

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.soundtrackyourbrand.com/v2',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{"query":"mutation {\\n  __typename\\n  soundZoneQueueTracks(input: {\\n    soundZone: \\"U291bmRab25lLCwxbXA0ZnJ3ZXkyby9Mb2NhdGlvbiwsMWlyNjF6dnJmMjgvQWNjb3VudCwsMWNzcXBldnJjb3cv\\",\\n    tracks: [\\"'. $idTrack .'\\"]\\n  }){\\n    status\\n  }\\n}","variables":{}}',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic NVNyYVR6MVBxenVNNW0wQkFCOXAzMnpOYlZkUDk4Y046Q2ppaFd1Rk9ISEhXN00xSHAyN2VvTENUWG5nSUZJcnROZXhXS2J5VnZEVHNIM0JNUVhFVHFsQ0JkOWwxVWtlbw==',
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        //var_dump($response);
    }

?>