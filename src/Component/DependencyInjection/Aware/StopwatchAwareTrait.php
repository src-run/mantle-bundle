<?php

/*
 * This file is part of the Scribe Mantle Bundle.
 *
 * (c) Scribe Inc. <source@scribe.software>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Scribe\MantleBundle\Component\DependencyInjection\Aware;

use Symfony\Component\Stopwatch\Stopwatch;

/**
 * Trait StopwatchAwareTrait.
 */
trait StopwatchAwareTrait
{
    /**
     * @var Stopwatch|null
     */
    private $stopwatch;

    /**
     * @return null|Stopwatch
     */
    public function getStopwatch()
    {
        return $this->stopwatch;
    }

    /**
     * @param Stopwatch $stopwatch
     *
     * @return $this
     */
    public function setStopwatch(Stopwatch $stopwatch = null)
    {
        $this->stopwatch = $stopwatch;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasStopwatch()
    {
        return (bool) ($this->stopwatch instanceof Stopwatch);
    }
}

/* EOF */
