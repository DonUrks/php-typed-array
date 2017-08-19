<?php

namespace Donurks\TypedArray;


class TypeInteger extends \Donurks\AbstractTypedArray
{
    protected function assertType($value)
    {
        if (!is_int($value)) {
            throw new Exception('integer', $value);
        }
    }
}