<?php

namespace Donurks\TypedArray;


class Exception extends \UnexpectedValueException
{
    public function __construct($expected, $value, $code = 0, \Throwable $previous = null)
    {
        $type = is_object($value) ? get_class($value) : gettype($value);
        parent::__construct('Type "' . $expected . '" expected, "' . $type . '" given.', $code, $previous);
    }
}