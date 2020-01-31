<?php
/**
 * HtmlPurifier
 *
 * PHP version 7.2
 *
 * @category HtmlPurifier
 * @package  Task1
 * @author   Wings <eternity.mr8@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://github.com/eternity-wing/level_up_task1
 */

declare(strict_types = 1);

namespace App;

use HtmlSanitizer\Sanitizer;

/**
 * HtmlPurifier Class
 *
 * @category Class
 * @package  Task1
 * @author   Wings <eternity.mr8@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://github.com/eternity-wing/level_up_task1
 */
class HtmlPurifier
{

    /**
     * Unwanted characters
     *
     * @const array[] unwanted characters
     */
    const UNWANTED_CHARACTERS = ['!', '@', '#', '$', '%', '^', '&', '*'];

    /**
     * Property of external package for sanitizing html
     *
     * @var \HtmlSanitizer\Sanitizer
     */
    private $sanitizer;

    /**
     * Initializing sanitizer property
     */
    public function __construct()
    {
        $this->sanitizer = Sanitizer::create(['extensions' => ['basic']]);
    }

    /**
     * Removing Unwanted character then sanitize them.
     *
     * @param string $str raw string which contains html tags or special characters.
     *
     * @return string
     */
    public function purify(String $str): String
    {
        return $this->sanitizer->sanitize($this->stripUnwantedCharacters($str));
    }

    /**
     * Stripping Unwanted character.
     *
     * @param string $str raw string which contains html tags or special characters.
     *
     * @return string
     */
    public function stripUnwantedCharacters(String $str): String
    {
        return str_replace(self::UNWANTED_CHARACTERS, '', $str);
    }
}
