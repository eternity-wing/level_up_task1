<?php
/**
 * HtmlPurifier Unit Test
 *
 * PHP version 7.2
 *
 * @category HtmlPurifierTest
 * @package  Task1
 * @author   Wings <eternity.mr8@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://github.com/eternity-wing/level_up_task1
 */

declare(strict_types=1);

namespace App\Test;

use PHPUnit\Framework\TestCase;
use App\HtmlPurifier;

/**
 * HtmlPurifierTest Test Class
 *
 * @category UnitTest
 * @package  Task1
 * @author   Wings <eternity.mr8@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://github.com/eternity-wing/level_up_task1
 */
final class HtmlPurifierTest extends TestCase
{
    const RAW_TEXT = "Alia bibendum explicatis! legendos mors! 2% Conscientiam detracta dicantur 1000$ gravida morbos,
     negat nominati sollicitudin ^& splendore? @Accedit * alteram atomis cillum perdiscere volumus! #";


    const PURIFING_MAX_EXECUTION_TIME = 20;


    /**
     * Initializing propery and setting up test needles
     *
     * @return void
     */
    public function setUp():void
    {
        $this->rawHtml = file_get_contents('tests/fixtures/raw.html');
        $this->purifier = new HtmlPurifier();
    }

    /**
     * Destroying propery and setting down test needles
     *
     * @return void
     */
    public function tearDown():void
    {
        unset($this->purifier);
    }

    /**
     * Test for removing unwanted characters
     *
     * @return void
     */
    public function testMustStripUnwantedCharacters(): void
    {
        $unwantedCharacters = implode('', HtmlPurifier::UNWANTED_CHARACTERS);
        $strippedString = $this->purifier->stripUnwantedCharacters(self::RAW_TEXT);
        $this->assertFalse(
            strpbrk($strippedString, $unwantedCharacters),
            "It couldn't remove special characters"
        );
    }


    /**
     * Test for purifing html content
     *
     * @return void
     */
    public function testMustPurifyHtmlFile(): void
    {
        $this->assertEquals(
            $this->purifier->purify($this->rawHtml),
            file_get_contents('tests/fixtures/purified.txt'),
            "Result must be equals to pre purified content."
        );
    }


    /**
     * Test for execution time
     *
     * @return void
     */
    public function testShouldBeImuuneOFRegexDenialOfServiceAttack(): void
    {
        $startTime = microtime(true);

        $purifiedHtml = $this->purifier->purify($this->rawHtml);

        $endTime = microtime(true);

        $executionTimeInSeconds = ($endTime - $startTime) * 1000;

        $this->assertGreaterThan(
            self::PURIFING_MAX_EXECUTION_TIME,
            $executionTimeInSeconds,
            "Result must be equals to pre purified content."
        );
    }
}
