# php-typed-array

A PHP class for type safe arrays. This project is based on PHPs [ArrayObject](http://php.net/manual/en/arrayobject.construct.php).

## Features
- type safe arrays
- arrays for PHP language types
    - boolean
    - integer
    - string
    - float

## Installation (with [Composer](https://getcomposer.org))
### Command line
```sh
composer require donurks/php-typed-array
```

## Usage
### Classes
```php
<?php
chdir(dirname(__DIR__));
require_once "vendor/autoload.php";

class MyOwnType extends \Donurks\AbstractTypedArray
{
    protected $type = \stdClass::class;
}

$myOwnType = new MyOwnType([
    new \stdClass(),
    new \stdClass(),
    new \stdClass(),
]);
```

### PHP language types
```php
<?php
chdir(dirname(__DIR__));
require_once "vendor/autoload.php";

$strings = new \Donurks\TypedArray\TypeString([
    'string1',
    'string2',
    'string3'
]);

$booleans = new \Donurks\TypedArray\TypeBoolean([
    true,
    false,
    true
]);

$integers = new \Donurks\TypedArray\TypeInteger([
    1,
    124,
    3434
]);

$floats = new \Donurks\TypedArray\TypeFloat([
    1.234,
    1.2e3,
    7E-10
]);
```

## Exception
```php
<?php
chdir(dirname(__DIR__));
require_once "vendor/autoload.php";

$strings = new \Donurks\TypedArray\TypeString([
    'string1',
    'string2',
    'string3'
]);

$booleans = new \Donurks\TypedArray\TypeBoolean([]);
$booleans[] = true;

try {
    $booleans[] = 'not-a-boolean';    
} catch (\Donurks\TypedArray\Exception $e) {
    die($e->getMessage());
}
```
