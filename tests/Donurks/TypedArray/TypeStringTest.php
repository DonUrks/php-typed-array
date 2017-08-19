<?php

namespace Donurks\TypedArray;

use PHPUnit\Framework\TestCase;

class TypeStringTest extends TestCase
{
    public function testConstructor()
    {
        $typedArray = new TypeString([
            'some text',
            "some text"
        ]);
        self::assertCount(2, $typedArray);
    }

    public function testConstructorWrongType()
    {
        self::expectException(Exception::class);
        self::expectExceptionMessage('Type "string" expected, "integer" given.');

        new TypeString([
            1234
        ]);
    }
}
