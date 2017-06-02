<?php

namespace Tests;

use Ant\Utilities\Strings;
use PHPUnit\Framework\TestCase;

class StringsTest extends TestCase
{
    /**
     * Testing the Strings::containsEmoji() function
     */
    public function testContainsEmoji()
    {
        $this->assertTrue(Strings::containsEmoji('☻'));
        $this->assertTrue(Strings::containsEmoji('☔'));
        $this->assertTrue(Strings::containsEmoji('⚉'));

        $this->assertFalse(Strings::containsEmoji('a'));
        $this->assertFalse(Strings::containsEmoji('ß'));
        $this->assertFalse(Strings::containsEmoji('漢'));
        $this->assertFalse(Strings::containsEmoji('1'));
        $this->assertFalse(Strings::containsEmoji('@'));
        $this->assertFalse(Strings::containsEmoji('æ'));
        $this->assertFalse(Strings::containsEmoji('ຈ'));
        $this->assertFalse(Strings::containsEmoji('ᄤ'));
        $this->assertFalse(Strings::containsEmoji('ከ'));
    }

    /**
     * Testing the Strings::containsHtml() function
     */
    public function testContainsHtml()
    {
        $this->assertTrue(Strings::containsHtml('<p><p/>'));

        $this->assertFalse(Strings::containsHtml('a'));
        $this->assertFalse(Strings::containsHtml('1'));
    }
}
