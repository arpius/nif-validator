<?php

namespace Arpius\NifValidator\Tests;


use Arpius\NifValidator\NifValidator;
use PHPUnit\Framework\TestCase;

class NifValidatorTest extends TestCase
{
    private $validator;

    public function setUp()
    {
        $this->validator = new NifValidator();
    }

    /** @test */
    public function it_should_be_in_the_right_format()
    {
        $nif = "12345678Z";

        $this->assertTrue($this->validator->validate($nif));
    }

    /** @test */
    public function it_length_should_be_nine()
    {
        $nif = "12345678Z";

        $this->assertTrue($this->validator->validate($nif));
    }

    /** @test */
    public function the_last_character_should_be_a_letter()
    {
        $nif = "12345678Z";

        $this->assertTrue($this->validator->validate($nif));
    }

    /** @test */
    public function the_digit_control_must_be_correct()
    {
        $nif = "12345678Z";

        $this->assertTrue($this->validator->validate($nif));
    }
}