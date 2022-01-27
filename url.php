<?php

function extractUrlQueryParams(?string $url)
{
    $query = array();
    parse_str(parse_url((string) $url)['query'], $query);

    return $query;
}
