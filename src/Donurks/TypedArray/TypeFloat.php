<?php

namespace Donurks\TypedArray;


class TypeFloat extends \Donurks\AbstractTypedArray
{
    protected function assertType($value)
    {
        if (!is_float($value)) {
            throw new Exception('float', $value);
        }
    }
}