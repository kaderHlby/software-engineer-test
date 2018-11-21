<?php

namespace Tests;

use App\Types\TypesManger;
use App\TypesManager;
use App\Validator;
use PHPUnit\Framework\TestCase;


class ValidatorTest extends TestCase
{
    /** @var Validator */
    protected $validator;

    protected function setUp()
    {
        parent::setUp();

        $this->validator = new Validator;
    }

    /**
     * @test
     */
    public function should_throw_exception_if_type_dose_not_exist()
    {
        $this->expectException(\Exception::class);
        $filePath = '../Type_A.xlsx';
        $type = 'type_c';
        $this->validator->make($filePath, $type);
    }

    /**
     * @test
     */
    public function should_validate_data()
    {
        // test case one
        $filePath = '../Type_A.xlsx';
        $type = TypesManager::TYPE_A;
        $errors = $this->validator->make($filePath, $type);
        $this->assertEquals($errors[3],
            "Missing value in field_a,field_b should not contain any space,Missing value in field_d");
        $this->assertEquals($errors[4],
            "Missing value in field_a,Missing value in field_e");

        // test case two
        $filePath = '../Type_B.xlsx';
        $type = TypesManager::TYPE_B;
        $errors = $this->validator->make($filePath, $type);
        $this->assertEquals($errors[3],
            "Missing value in field_a,field_b should not contain any space");

    }

}