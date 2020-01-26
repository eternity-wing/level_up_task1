<?php
declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\JsonPlaceHolder;
use App\HtmlPurifier;

function main():void
{
    $rawHtml = readline("Enter text: ");
    readline_add_history($rawHtml);

    $htmlPurifier = new HtmlPurifier();
    $purifiedHtml = $htmlPurifier->purify($rawHtml);
    echo "purified html: {$purifiedHtml}\n";

    $jsonPlaceHolder = new JsonPlaceHolder();
    $result = $jsonPlaceHolder->store($purifiedHtml);

    echo "successfully stored:\n";
    print_r($result);
}

main();
