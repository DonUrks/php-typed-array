<?php

namespace Donurks;

use PHPUnit\Framework\TestCase;

class TypedArrayStdClass extends AbstractTypedArray
{
    protected $type = \stdClass::class;
}

class TypedArrayTest extends TestCase
{
    public function testConstructor()
    {
        $typedArray = new TypedArrayStdClass([
            new \stdClass(),
            new \stdClass()
        ]);

        self::assertInstanceOf(TypedArrayStdClass::class, $typedArray);
    }

    public function testConstructorWrongType()
    {
        self::expectException(TypedArray\Exception::class);
        self::expectExceptionMessage('Type "stdClass" expected, "string" given.');

        new TypedArrayStdClass([
            new \stdClass(),
            'this-is-not-a-stdClass-object'
        ]);
    }

    public function testAppend()
    {
        $typedArray = new TypedArrayStdClass([]);
        $typedArray->append(new \stdClass());
        $typedArray->append(new \stdClass());

        self::assertCount(2, $typedArray);
    }

    public function testAppendWrongType()
    {
        self::expectException(TypedArray\Exception::class);
        self::expectExceptionMessage('Type "stdClass" expected, "boolean" given.');

        $typedArray = new TypedArrayStdClass([]);
        $typedArray->append(false);
    }

    public function testOffsetSet()
    {
        $typedArray = new TypedArrayStdClass([]);
        $typedArray->offsetSet(0, new \stdClass());
        $typedArray->offsetSet(1, new \stdClass());

        self::assertCount(2, $typedArray);
    }

    public function testOffsetSetWrongType()
    {
        self::expectException(TypedArray\Exception::class);
        self::expectExceptionMessage('Type "stdClass" expected, "DateTime" given.');

        $typedArray = new TypedArrayStdClass([]);
        $typedArray->offsetSet(0, new \DateTime());
    }

    public function testExchangeArray()
    {
        $obj1 = new \stdClass();

        $typedArray = new TypedArrayStdClass([
            $obj1
        ]);

        $obj2 = new \stdClass();
        $obj3 = new \stdClass();

        $old = $typedArray->exchangeArray([
            $obj2,
            $obj3
        ]);

        self::assertCount(2, $typedArray);
        self::assertTrue(spl_object_hash($typedArray[0]) === spl_object_hash($obj2));
        self::assertTrue(spl_object_hash($typedArray[1]) === spl_object_hash($obj3));

        self::assertCount(1, $old);
        self::assertTrue(spl_object_hash($old[0]) === spl_object_hash($obj1));
    }

    public function testExchangeArrayWrongType()
    {
        $obj1 = new \stdClass();

        $typedArray = new TypedArrayStdClass([
            $obj1
        ]);

        $thrown = false;
        try {
            $typedArray->exchangeArray([
                'this-is-not-a-stdClass-object'
            ]);
        } catch(TypedArray\Exception $e) {
            $thrown = true;
        }

        self::assertTrue($thrown);
        self::assertCount(1, $typedArray);
        self::assertTrue(spl_object_hash($typedArray[0]) === spl_object_hash($obj1));
    }
}
