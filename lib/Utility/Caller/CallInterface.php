<?php
/*
 * This file is part of the Scribe Mantle Bundle.
 *
 * (c) Scribe Inc. <source@scribe.software>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Scribe\Utility\Caller;


/**
 * CallInterface.
 */
interface CallInterface
{
    /**
     * Call a global function (if exists) with specified arguments.
     *
     * @param string   $function  A global function name
     * @param ...mixed $arguments Arguments to pass to the global function
     *
     * @return mixed
     */
    public static function func($function, ...$arguments);

    /**
     * Call an object method (if exists) with specified arguments.
     *
     * @param string|object $object    An object instance or a class name
     * @param string        $method    An accessible object method name
     * @param ...mixed      $arguments Arguments to pass to the object method
     *
     * @return mixed
     */
    public static function method($object, $method, ...$arguments);

    /**
     * Call an static object method (if exists) with specified arguments.
     *
     * @param string|object $object    An object instance or a class name
     * @param string        $method    An accessible object method name
     * @param ...mixed      $arguments Arguments to pass to the object method
     *
     * @return mixed
     */
    public static function staticMethod($object, $method, ...$arguments);
}

/* EOF */

/* EOF */
