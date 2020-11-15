<?php

namespace App\Tests;

use App\Jurgis;
use PHPUnit\Framework\TestCase;

class JurgisTest extends TestCase
{
    protected $jurgis;

    protected function setUp(): void
    {
        $this->jurgis = new Jurgis();
    }

    public function testGreeting()
    {
        $this->assertEquals('Labas!', $this->jurgis->responds('Sveiki'));
        $this->assertEquals('Labas!', $this->jurgis->responds('LABAS'));
    }

    public function testStatingSomething()
    {
        $this->assertEquals("Aha gerai.", $this->jurgis->responds("Kaip šiandien smagu!"));
    }

    public function testShouting()
    {
        $this->assertEquals("Oi oi, atvėsk!", $this->jurgis->responds("KOKS TAVO VARDAS!"));
    }

    public function testShoutingNonsense()
    {
        $this->assertEquals("Oi oi, atvėsk!", $this->jurgis->responds("SKDHJFKAJSDHFP"));
    }

    public function testAskAQuestion()
    {
        $this->assertEquals("Okis.", $this->jurgis->responds("Ar šiandien antradienis?"));
    }

    public function testAskANumericQuestion()
    {
        $this->assertEquals("Okis.", $this->jurgis->responds("Ar dar nesibaigė 2020?"));
    }

    public function testAskNonsense()
    {
        $this->assertEquals("Okis.", $this->jurgis->responds("ajkshkljsdhfkj?"));
    }

    public function testTalkingForcefully()
    {
        $this->assertEquals("Aha gerai.", $this->jurgis->responds("Greičiau einam prie ežero!"));
    }

    public function testForcefulQuestion()
    {
        $this->assertEquals("Oi oi, atvėsk!", $this->jurgis->responds("KĄ TU SAU GALVOJAI TAIP DARANT?"));
    }

    public function testShoutingNumbers()
    {
        $this->assertEquals("Oi oi, atvėsk!", $this->jurgis->responds("1, 2, 3 STARTAS!"));
    }

    public function testOnlyNumbers()
    {
        $this->assertEquals("Aha gerai.", $this->jurgis->responds("1, 2, 3"));
    }

    public function testQuestionWithOnlyNumbers()
    {
        $this->assertEquals("Okis.", $this->jurgis->responds("4?"));
    }

    public function testShoutingWithSpecialCharacters()
    {
        $this->assertEquals("Oi oi, atvėsk!", $this->jurgis->responds("MANO PASSWORD YRA %^*@#$(*^ KENTAURA!!11!!1!"));
    }


    public function testShoutingWithNoExclamationMark()
    {
        $this->assertEquals("Oi oi, atvėsk!", $this->jurgis->responds("NEKENČIU TAVĘS"));
    }

    public function testStatementContainingQuestionMark()
    {
        $this->assertEquals("Aha gerai.", $this->jurgis->responds("Pabaiga su ? reiškia klausimą."));
    }

    public function testNonLettersWithQuestion()
    {
        $this->assertEquals("Okis.", $this->jurgis->responds(":) ?"));
    }

    public function testPrattlingOn()
    {
        $this->assertEquals("Okis.", $this->jurgis->responds("Palauk! Sustok. Ar viskas bus tau GERAI?"));
    }

    public function testSilence()
    {
        $this->assertEquals("Alio! Kuku?", $this->jurgis->responds(""));
    }

    public function testProlongedSilence()
    {
        $this->assertEquals("Alio! Kuku?", $this->jurgis->responds("         "));
    }

    public function testAlternateSilence()
    {
        $this->assertEquals("Alio! Kuku?", $this->jurgis->responds("\t\t\t\t\t\t\t\t\t\t"));
    }

    public function testMultipleLineQuestion()
    {
        $this->assertEquals("Aha gerai.", $this->jurgis->responds("\nAr nieko tokio jei eisiu namo?\nNe"));
    }

    public function testStartingWithWhitespace()
    {
        $this->assertEquals("Aha gerai.", $this->jurgis->responds("        olialia..."));
    }

    public function testEndingWithWhitespace()
    {
        $this->assertEquals("Okis.", $this->jurgis->responds("Pabaigoje šio klausimo tarpeliai?   "));
    }

    public function testNonQuestionEndingWithWhitespace()
    {
        $this->assertEquals("Aha gerai.", $this->jurgis->responds("This is a statement ending with whitespace      "));
    }
}
