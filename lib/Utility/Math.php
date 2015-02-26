<?php
/*
 * This file is part of the Scribe Foundation Bundle.
 *
 * (c) Scribe Inc. <source@scribe.software>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Scribe\Utility;

use Scribe\Utility\StaticClass\StaticClassTrait;
use Scribe\Exception\InvalidArgumentException;

/**
 * Class Math
 *
 * @package Scribe\Utility
 */
class Math
{
    /**
     * disallow instantiation
     */
    use StaticClassTrait;

    /**
     * Convert an integer from one base to another with optional prevision
     *
     * @param  int      $integer      Integer value to convert
     * @param  int      $base         Current base of integer
     * @param  int      $newBase      New base of integer
     * @param  int|null $precision    Optionally round converted integer to specified precision
     * @param  bool     $newBaseAsMax If set to true the converted integer will not be allowed to exceed the new base
     *
     * @throws InvalidArgumentException
     *
     * @return int
     */
    public static function toBase($integer, $base, $newBase, $precision = null, $newBaseAsMax = false)
    {
        if (0 === (int) $base) {
            throw new InvalidArgumentException('Cannot convert to a base of zero.');
        }

        $convertedInteger = $integer * $newBase / $base;

        if (null !== $precision) {
            $convertedInteger = round($convertedInteger, $precision);
        }

        if (true === $newBaseAsMax && $convertedInteger > $newBase) {
            $convertedInteger = $newBase;
        }

        return $convertedInteger;
    }
}
