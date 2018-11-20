<?php

namespace Tests;

use App\Helpers;
use PHPUnit\Framework\TestCase;

class HelpersTest extends TestCase
{
    /** @var Helpers */
    protected $helpers;

    protected function setUp()
    {
        parent::setUp();

        $this->helpers = new Helpers;
    }

    /**
     * @test
     */
    public function shouldThrowExceptionWhenGivingInvalidOpenParanIndex()
    {
        $this->expectException(\Exception::class);

        $string = "a (b c (d e (f) g) h) i (j k)";

        $openParenIndex = 0;

        $this->helpers->findCorrespondingClosingParen($openParenIndex, $string);
    }

    /**
     * @test
     */
    public function canFindCorrespondingClosingParen()
    {
        $string = "a (b c (d e (f) g) h) i (j k)";

        // test case one.
        $openParenIndex = 2;

        $closeParenIndex = $this->helpers->findCorrespondingClosingParen($openParenIndex, $string);

        $this->assertEquals($closeParenIndex, 20);

        // test case two.
        $openParenIndex = 7;

        $closeParenIndex = $this->helpers->findCorrespondingClosingParen($openParenIndex, $string);

        $this->assertEquals($closeParenIndex, 17);
        

        // test case three.
        $openParenIndex = 12;

        $closeParenIndex = $this->helpers->findCorrespondingClosingParen($openParenIndex, $string);

        $this->assertEquals($closeParenIndex, 14);

        // test case four.
        $openParenIndex = 24;

        $closeParenIndex = $this->helpers->findCorrespondingClosingParen($openParenIndex, $string);

        $this->assertEquals($closeParenIndex, 28);
    }
}   
