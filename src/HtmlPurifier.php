<?php
declare(strict_types=1);

namespace App;

use HtmlSanitizer\Sanitizer;

/**
 * @author Wings
 */
class HtmlPurifier {

    /**
     * @const array[] unwanted characters
     */
    const UNWANTED_CHARACTERS = ['!', '@', '#', '$', '%', '^', '&', '*'];

    /**
     * @var \HtmlSanitizer\Sanitizer
     */
    private $sanitizer;

    public function __construct(){
        $this->sanitizer = Sanitizer::create(['extensions' => ['basic']]);
    }

    /**
     * @param string $str
     * @return string
     */
    public function purify(String $str):String{
        return $this->sanitizer->sanitize($this->stripUnwantedCharacters($str));
    }

    /**
     * @param string $str
     * @return string
     */
    private function stripUnwantedCharacters(String $str):String{
        return str_replace(self::UNWANTED_CHARACTERS, '', $str);
    }

}
