<?php

namespace Donurks\TypedArray;


class TypeBoolean extends \Donurks\AbstractTypedArray
{
    protected function assertType($value)
    {
        if (!is_bool($value)) {
            throw new Exception('boolean', $value);
        }
    }
}