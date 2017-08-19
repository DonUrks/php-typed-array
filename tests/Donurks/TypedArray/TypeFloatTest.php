<?php

namespace Donurks\TypedArray;

use PHPUnit\Framework\TestCase;

class TypeFloatTest extends TestCase
{
    public function testConstructor()
    {
        $typedArray = new TypeFloat([
            1.234,
            1.2e3,
            7E-10,
        ]);
        self::assertCount(3, $typedArray);
    }

    public function testConstructorWrongType()
    {
        self::expectException(Exception::class);
        self::expectExceptionMessage('Type "float" expected, "string" given.');

        new TypeFloat([
            'wrong-type'
        ]);
    }
}
