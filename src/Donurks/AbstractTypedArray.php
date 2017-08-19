<?php

namespace Donurks;

abstract class AbstractTypedArray extends \ArrayObject
{
    protected $type;

    public function __construct($input = [])
    {
        parent::__construct();
        $this->exchangeArray($input);
    }

    protected function assertType($value)
    {
        if (!$value instanceof $this->type) {
            throw new TypedArray\Exception($this->type, $value);
        }
    }

    public function append($value)
    {
        $this->assertType($value);
        parent::append($value);
    }

    public function offsetSet($index, $value)
    {
        $this->assertType($value);
        parent::offsetSet($index, $value);
    }

    public function exchangeArray($input)
    {
        $old = parent::exchangeArray([]);

        try {
            foreach ($input as $key => $value) {
                $this->offsetSet($key, $value);
            }
        } catch (\UnexpectedValueException $e) {
            parent::exchangeArray($old);
            throw $e;
        }

        return $old;
    }
}