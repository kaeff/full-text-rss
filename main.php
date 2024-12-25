<?php

require 'cloudRunWrapper.php';

function makeFullTextFeedFunction($request) {
    $url = $request['url'] ?? null;
    if ($url) {
        return callMakeFullTextFeed($url);
    } else {
        return json_encode(array('error' => 'No URL provided'));
    }
}