<?php

namespace Donurks\TypedArray;

use PHPUnit\Framework\TestCase;

class TypeBooleanTest extends TestCase
{
    public function testConstructor()
    {
        $typedArray = new TypeBoolean([
            true,
            false,
            true,
            True,
            TRUE,
        ]);
        self::assertCount(5, $typedArray);
    }

    public function testConstructorWrongType()
    {
        self::expectException(Exception::class);
        self::expectExceptionMessage('Type "boolean" expected, "string" given.');

        new TypeBoolean([
            'wrong-type'
        ]);
    }
}
