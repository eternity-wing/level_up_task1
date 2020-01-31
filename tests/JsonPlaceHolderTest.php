<?php
/**
 * JsonPlaceHolder Unit Test
 *
 * PHP version 7.2
 *
 * @category JsonPlaceHolderTest
 * @package  Task1
 * @author   Wings <eternity.mr8@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://github.com/eternity-wing/level_up_task1
 */

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\JsonPlaceHolder;
use App\HtmlPurifier;
use GuzzleHttp\Client;

/**
 * HtmlPurifierTest Test Class
 *
 * @category UnitTest
 * @package  Task1
 * @author   Wings <eternity.mr8@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://github.com/eternity-wing/level_up_task1
 */
final class JsonPlaceHolderTest extends TestCase
{
    /**
     * Initializing propery and setting up test needles
     *
     * @return void
     */
    public function setUp():void
    {
        $this->jsonPlaceHolder = new JsonPlaceHolder();
        $this->client = new Client(['base_uri' => JsonPlaceHolder::BASE_URI]);
        $this->purifier = new HtmlPurifier();
    }

    /**
     * Destroying propery and setting down test needles
     *
     * @return void
     */
    public function tearDown():void
    {
        unset($this->jsonPlaceHolder);
    }

    /**
     * Test for connection
     *
     * @return void
     */
    public function testIfRemoteServerIsAccessible(): void
    {
        $response = $this->client->get('/todos/1');

        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * Test for connection
     *
     * @return void
     */
    public function testStoringOnRemoteStorage(): void
    {
        $rawHtml = file_get_contents('tests/fixtures/raw.html');
        $purifiedHtml = $this->purifier->purify($rawHtml);
        $result = $this->jsonPlaceHolder->store($purifiedHtml);

        $this->assertArrayHasKey('id', $result);
        $this->assertEquals($result['id'], 101);
    }
}
