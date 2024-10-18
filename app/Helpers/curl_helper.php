<?php

function curl_get($debtor_name_array)
{
    [$LastName, $FirstName, $MiddleName] = $debtor_name_array;
    $referer_params = [
        'searchString' => "{$LastName} {$FirstName} {$MiddleName}",
        'group' => 'all',
        'period' => '{}',
        'additionalFnpSearch' => 'true',
        'limit' => '15',
        'offset' => '0'
    ];
    $referer = "https://fedresurs.ru/encumbrances?" . http_build_query($referer_params);
    $headers = [
        'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 YaBrowser/23.5.1.667 Yowser/2.5 Safari/537.36',
        'Accept: application/json, text/plain, */*',
        "Referer: {$referer}" ,
        'Host: fedresurs.ru',
    ];
    $params = [
        'LastName' => $LastName,
        'FirstName' => $FirstName,
        'MiddleName' => $MiddleName,
        'limit' => '15',
        'offset' => '0'
    ];
    $url = 'https://fedresurs.ru/backend/fnp-search/person?';
    $params = http_build_query($params) ?? '';
    $ch = curl_init($url . $params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    $html = curl_exec($ch);
    curl_close($ch);

    $guid = json_decode($html,true)['pageData'][0]['guid'] ?? "Отсутствующее значение";
    $url = 'https://www.reestr-zalogov.ru/search/notification//' . $guid;
    $headers = [
        'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 YaBrowser/23.5.1.667 Yowser/2.5 Safari/537.36',
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
        'Referer: https://fedresurs.ru/'
    ];
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    $html = curl_exec($ch);
    curl_close($ch);
    preg_match('/notification="({.*})"/', $html, $matshes);
    $decoded_data = json_decode(html_entity_decode($matshes[1]),true);
    return $decoded_data;
}