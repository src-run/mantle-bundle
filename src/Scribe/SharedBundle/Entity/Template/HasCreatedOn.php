<?php
/*
 * This file is part of the Scribe World Application.
 *
 * (c) Scribe Inc. <scribe@scribenet.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Scribe\SharedBundle\Entity\Template;

use Datetime;

/**
 * Class HasCreatedOn
 * @package Scribe\SharedBundle\Entity\Template
 */
trait HasCreatedOn
{
    /**
     * The entity created_on property
     * @type CreatedOn
     */
    protected $created_on;

    /**
     * Setter for created_on property
     * @param CreatedOn $created_on any datetime object instance
     * @return $this
     */
    public function setCreatedOn(Datetime $created_on = null)
    {
        $this->created_on = $created_on;

        return $this;
    }

    /**
     * Getter (or formatter) for created_on property
     * @param string|null $format optional string to format created_on
     * @return CreatedOn|string|null
     */
    public function getCreatedOn($format = null)
    {
        if ($format !== null) {
            return $this->created_on->format($format);
        }

        return $this->created_on;
    }

    /**
     * Checker for created_on property
     * @return bool
     */
    public function hasCreatedOn()
    {
        return (bool)$this->created_on instanceof Datetime;
    }

    /**
     * Nullify the created_on property
     * @return $this
     */
    public function clearCreatedOn()
    {
        $this->created_on = null;

        return $this;
    }
}
