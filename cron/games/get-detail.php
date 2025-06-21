<?php
require '../../mainconfig.php';
$games = addslashes(trim(htmlspecialchars($_POST['games'])));
    $target = addslashes(trim(htmlspecialchars($_POST['target'])));
    $server = addslashes(trim(htmlspecialchars($_POST['server'])));
    $CekId = $db->query("SELECT * FROM provider WHERE code='CekId'");
    $CK = $CekId->fetch_assoc();
    
    if ($games == 'valorant'){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $CK['link'].$games.'?id='.$target.'&key='.$CK['api_key'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            ));
            $result = curl_exec($curl);
            curl_close($curl);
    } 
    else if(!empty($target) AND !empty($server)){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $CK['link'].$games.'?id='.$target.'&zone='.$server.'&key='.$CK['api_key'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            ));
            $result = curl_exec($curl);
            curl_close($curl);
    }else if (!empty($target) AND empty($server)){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $CK['link'].$games.'?id='.$target.'&key='.$CK['api_key'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            ));
            $result = curl_exec($curl);
            curl_close($curl);
    }
    echo $result;
    