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

        $openParenthesisIndex = 0;

        $this->helpers->findCorrespondingClosingParenthesis($openParenthesisIndex, $string);
    }

    /**
     * @test
     */
    public function canfindCorrespondingClosingParenthesis()
    {
        $string = "a (b c (d e (f) g) h) i (j k)";

        // test case one.
        $openParenthesisIndex = 2;

        $closeParenIndex = $this->helpers->findCorrespondingClosingParenthesis($openParenthesisIndex, $string);

        $this->assertEquals($closeParenIndex, 20);

        // test case two.
        $openParenthesisIndex = 7;

        $closeParenIndex = $this->helpers->findCorrespondingClosingParenthesis($openParenthesisIndex, $string);

        $this->assertEquals($closeParenIndex, 17);
        

        // test case three.
        $openParenthesisIndex = 12;

        $closeParenIndex = $this->helpers->findCorrespondingClosingParenthesis($openParenthesisIndex, $string);

        $this->assertEquals($closeParenIndex, 14);

        // test case four.
        $openParenthesisIndex = 24;

        $closeParenIndex = $this->helpers->findCorrespondingClosingParenthesis($openParenthesisIndex, $string);

        $this->assertEquals($closeParenIndex, 28);
    }
}   
