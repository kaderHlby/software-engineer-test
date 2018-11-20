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
    public function can_find_corresponding_closing_parenthesis()
    {
        $string = "a (b c (d e (f) g) h) i (j k)";

        // test case one.
        $openParenthesisIndex = 2;

        $closeParenthesisIndex = $this->helpers->findCorrespondingClosingParenthesis($openParenthesisIndex, $string);

        $this->assertEquals($closeParenthesisIndex, 20);

        // test case two.
        $openParenthesisIndex = 7;

        $closeParenthesisIndex = $this->helpers->findCorrespondingClosingParenthesis($openParenthesisIndex, $string);

        $this->assertEquals($closeParenthesisIndex, 17);
        

        // test case three.
        $openParenthesisIndex = 12;

        $closeParenthesisIndex = $this->helpers->findCorrespondingClosingParenthesis($openParenthesisIndex, $string);

        $this->assertEquals($closeParenthesisIndex, 14);

        // test case four.
        $openParenthesisIndex = 24;

        $closeParenthesisIndex = $this->helpers->findCorrespondingClosingParenthesis($openParenthesisIndex, $string);

        $this->assertEquals($closeParenthesisIndex, 28);
    }

    /**
     * @test
     */
    public function should_throw_exception_when_giving_invalid_open_parenthesis_index()
    {
        $this->expectException(\Exception::class);

        $string = "a (b c (d e (f) g) h) i (j k)";

        $openParenthesisIndex = 0;

        $this->helpers->findCorrespondingClosingParenthesis($openParenthesisIndex, $string);
    }

    /** 
     * @test
     */
    public function should_throw_exception_when_giving_invalid_string()
    {
        $this->expectException(\Exception::class);

        $string = "a (b c (d e (f) g) h i (j k)";

        $openParenthesisIndex = 2;

        $this->helpers->findCorrespondingClosingParenthesis($openParenthesisIndex, $string);
    }

    /** 
     * @test
     */
    public function should_throw_exception_when_giving_open_parenthesis_index_greater_than_string_length()
    {
        $this->expectException(\Exception::class);

        $string = "a (b c (d e (f) g) h i (j k)";

        $openParenthesisIndex = 30;

        $this->helpers->findCorrespondingClosingParenthesis($openParenthesisIndex, $string);
    }

}