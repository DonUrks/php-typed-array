<?php

namespace Donurks\TypedArray;

use PHPUnit\Framework\TestCase;

class TypeIntegerTest extends TestCase
{
    public function testConstructor()
    {
        $typedArray = new TypeInteger([
            1234,
            -123,
            0123,
            0x1A,
            0b11111111
        ]);
        self::assertCount(5, $typedArray);
    }

    public function testConstructorWrongType()
    {
        self::expectException(Exception::class);
        self::expectExceptionMessage('Type "integer" expected, "string" given.');

        new TypeInteger([
            'wrong-type'
        ]);
    }
}
