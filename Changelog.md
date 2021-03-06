# 2.1.1 #

## Changed ##

### Classes ###

* Changed the `Quorrax\Traits\Variable` trait's `getType()` method's exception message.

# 2.1.0 #

## Changed ##

### Classes ###

* Changed the `Quorrax\Classes\Boolean` class' `value` property's visibility from `private` to `protected`.
* Changed the `Quorrax\Classes\Character` class' `value` property's visibility from `private` to `protected`.
* Changed the `Quorrax\Classes\Collection` class' `value` property's visibility from `private` to `protected`.
* Changed the `Quorrax\Classes\Double` class' `value` property's visibility from `private` to `protected`.
* Changed the `Quorrax\Classes\Integer` class' `value` property's visibility from `private` to `protected`.

## Removed ##

### Interfaces ###

* Removed the `getValue()` method from the `Quorrax\Interfaces\Variable` interface.
* Removed the `setValue()` method from the `Quorrax\Interfaces\Variable` interface.

# 2.0.0 #

## Added ##

### Classes ###

* Added the `Quorrax\Classes\Boolean` class.
    * Added the `getValue()` public method.
    * Added the `setValue()` public method.
    * Added the `__construct()` public method.
    * Added the `value` private property.
* Added the `Quorrax\Classes\Character` class.
    * Added the `getValue()` public method.
    * Added the `setValue()` public method.
    * Added the `__construct()` public method.
    * Added the `value` private property.
* Added the `Quorrax\Classes\Collection` class.
    * Added the `cast()` private method.
    * Added the `getValue()` public method.
    * Added the `setValue()` public method.
    * Added the `__construct()` public method.
    * Added the `value` private property.
* Added the `Quorrax\Classes\Float` class.
    * Added the `getValue()` public method.
    * Added the `setValue()` public method.
    * Added the `__construct()` public method.
    * Added the `value` private property.
* Added the `Quorrax\Classes\Integer` class.
    * Added the `getValue()` public method.
    * Added the `setValue()` public method.
    * Added the `__construct()` public method.
    * Added the `value` private property.

### Interfaces ###

* Added the `Quorrax\Interfaces\Variables\Boolean` interface.
    * Added the `getValue()` public method.
    * Added the `setValue()` public method.
    * Added the `__construct()` public method.
* Added the `Quorrax\Interfaces\Variables\Character` interface.
    * Added the `getValue()` public method.
    * Added the `setValue()` public method.
    * Added the `__construct()` public method.
* Added the `Quorrax\Interfaces\Variables\Collection` interface.
    * Added the `getValue()` public method.
    * Added the `setValue()` public method.
    * Added the `__construct()` public method.
* Added the `Quorrax\Interfaces\Variables\Float` interface.
    * Added the `getValue()` public method.
    * Added the `setValue()` public method.
    * Added the `__construct()` public method.
* Added the `Quorrax\Interfaces\Variables\Integer` interface.
    * Added the `getValue()` public method.
    * Added the `setValue()` public method.
    * Added the `__construct()` public method.

### Traits ###

* Added the `\Quorrax\Traits\Variable` trait.
    * Added the `is()` private method.
    * Added the `getType()` public method.
    * Added the `isArray()` public method.
    * Added the `isBoolean()` public method.
    * Added the `isEmpty()` public method.
    * Added the `isFloat()` public method.
    * Added the `isInteger()` public method.
    * Added the `isNumeric()` public method.
    * Added the `isObject()` public method.
    * Added the `isResource()` public method.
    * Added the `isScalar()` public method.
    * Added the `isString()` public method.

## Removed ##

### Classes ###

* Removed the `Quorrax\Classes\Variable` class.
    * Removed the `is()` private method.
    * Removed the `getType()` public method.
    * Removed the `getValue()` public method.
    * Removed the `isArray()` public method.
    * Removed the `isBoolean()` public method.
    * Removed the `isEmpty()` public method.
    * Removed the `isFloat()` public method.
    * Removed the `isInteger()` public method.
    * Removed the `isNumeric()` public method.
    * Removed the `isObject()` public method.
    * Removed the `isResource()` public method.
    * Removed the `isScalar()` public method.
    * Removed the `isString()` public method.
    * Removed the `setValue()` public method.
    * Removed the `value` private property.

# 1.3.1 #

## Fixed ##

### Interfaces ###

* Fixed the `setValue()` public method's documentation comment in the `Quorrax\Interfaces\Variable` interface.

# 1.3.0 #

## Added ##

### Classes ###
* Added the `getType()` public method to the `Quorrax\Classes\Variable` class.

### Interfaces ###
* Added the `getType()` public method to the `Quorrax\Interfaces\Variable` interface.

# 1.2.0 #

## Added ##

### Classes ###
* Added the `isEmtpy()` public method to the `Quorrax\Classes\Variable` class.
* Added the `isNumeric()` public method to the `Quorrax\Classes\Variable` class.
* Added the `isObject()` public method to the `Quorrax\Classes\Variable` class.
* Added the `isResource()` public method to the `Quorrax\Classes\Variable` class.
* Added the `isScalar()` public method to the `Quorrax\Classes\Variable` class.

### Interfaces ###
* Added the `isEmtpy()` public method to the `Quorrax\Interfaces\Variable` interface.
* Added the `isNumeric()` public method to the `Quorrax\Interfaces\Variable` interface.
* Added the `isObject()` public method to the `Quorrax\Interfaces\Variable` interface.
* Added the `isResource()` public method to the `Quorrax\Interfaces\Variable` interface.
* Added the `isScalar()` public method to the `Quorrax\Interfaces\Variable` interface.

# 1.1.0 #

## Added ##

### Classes ###

* Added the `is()` private method to the `Quorrax\Classes\Variable` class.
* Added the `isArray()` public method to the `Quorrax\Classes\Variable` class.
* Added the `isBoolean()` public method to the `Quorrax\Classes\Variable` class.
* Added the `isFloat()` public method to the `Quorrax\Classes\Variable` class.
* Added the `isInteger()` public method to the `Quorrax\Classes\Variable` class.
* Added the `isString()` public method to the `Quorrax\Classes\Variable` class.

### Interfaces ###

* Added the `isArray()` public method to the `Quorrax\Interfaces\Variable` interface.
* Added the `isBoolean()` public method to the `Quorrax\Interfaces\Variable` interface.
* Added the `isFloat()` public method to the `Quorrax\Interfaces\Variable` interface.
* Added the `isInteger()` public method to the `Quorrax\Interfaces\Variable` interface.
* Added the `isString()` public method to the `Quorrax\Interfaces\Variable` interface.

# 1.0.0 #

## Added ##

### Classes ###

* Added the `Quorrax\Classes\Variable` class.
    * Added the `getValue()` public method.
    * Added the `setValue()` public method.
    * Added the `value` private property.

### Interfaces ###

* Added the `Quorrax\Interfaces\Variable` interface.
    * Added the `getValue()` public method.
    * Added the `setValue()` public method.
