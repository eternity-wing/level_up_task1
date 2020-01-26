<?php
declare(strict_types=1);

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

/**
 * @author Wings
 */
class JsonPlaceHolder
{

    /**
     * @const string jsonplaceholder address
     */
    const BASE_URI = 'https://jsonplaceholder.typicode.com';

    /**
     * @var \GuzzleHttp\Client
     */
    private $client;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => self::BASE_URI]);
    }

    /**
     * @param string $text a sanitized text
     *
     * @return void
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
