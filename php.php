<?php

$url = 'https://app.metarri.io:300/explore?type=Arcade&category=Gaming#2';
$url_components = parse_url($url);

$_scheme = $url_components['scheme'];
$_host = $url_components['host'];
$_port = $url_components['port'];
$_path = $url_components['path'];
$_query = $url_components['query'];
$_fragment = $url_components['fragment'];

var_dump($url_components);

// array(5) {
//     ["scheme"]=>
//     string(5) "https"
//     ["host"]=>
//     string(14) "app.metarri.io"
//     ["path"]=>
//     string(8) "/explore"
//     ["query"]=>
//     string(15) "category=Gaming"
//     ["fragment"]=>
//     string(1) "2"
//   }

// parse_str($url_components['query'], $params);
// $key = $params['key'];
