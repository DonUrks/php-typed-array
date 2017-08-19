<?php

namespace Donurks\TypedArray;


class TypeString extends \Donurks\AbstractTypedArray
{
    protected function assertType($value)
    {
        if (!is_string($value)) {
            throw new Exception('string', $value);
        }
    }
}