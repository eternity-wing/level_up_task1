<?php
/**
 * Main app
 *
 * PHP version 7.2
 *
 * @category Index
 * @package  Task1
 * @author   Wings <eternity.mr8@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://github.com/eternity-wing/level_up_task1
 */

declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\JsonPlaceHolder;
use App\HtmlPurifier;

/**
 * Bootstrapping app
 *
 * @return void
 */
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
