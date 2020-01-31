<?php
/**
 * JsonPlaceHolder
 *
 * PHP version 7.2
 *
 * @category JsonPlaceHolder
 * @package  Task1
 * @author   Wings <eternity.mr8@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://github.com/eternity-wing/level_up_task1
 */

declare(strict_types=1);

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

/**
 * JsonPlaceHolder Class
 *
 * @category Class
 * @package  Task1
 * @author   Wings <eternity.mr8@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://github.com/eternity-wing/level_up_task1
 */
class JsonPlaceHolder
{

    /**
     * Remote storage's base path
     *
     * @const string jsonplaceholder address
     */
    const BASE_URI = 'https://jsonplaceholder.typicode.com';

    /**
     * Property of guzzle client type for http requests.
     *
     * @var \GuzzleHttp\Client
     */
    private $client;

    /**
     * Constructor for initializing properties and ...
     *
     * @return void
     */
    public function __construct()
    {
        $this->client = new Client(['base_uri' => self::BASE_URI]);
    }

    /**
     * Send data to remote storage
     *
     * @param string $text a sanitized text
     *
     * @return array
     */
    public function store(String $text):array
    {
        try {
            $response = $this->client->post(
                '/posts',
                [
                'body' => json_encode(['title' => 'sanitized string', 'body' => $text])
                ]
            );
            return json_decode($response->getBody()->getContents(), true);
        } catch (ClientException $e) {
            echo Psr7\str($e->getRequest());
            echo Psr7\str($e->getResponse());
        }
    }
}
