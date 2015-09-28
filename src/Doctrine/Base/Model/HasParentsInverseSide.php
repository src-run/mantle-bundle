<?php

/*
 * This file is part of the Scribe Mantle Bundle.
 *
 * (c) Scribe Inc. <source@scribe.software>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Scribe\MantleBundle\Doctrine\Base\Model;

use Scribe\MantleBundle\Doctrine\Base\Entity\AbstractEntity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class HasParentsInverseSide.
 */
trait HasParentsInverseSide
{
    /**
     * Parents entity.
     *
     * @var ArrayCollection
     */
    protected $parents;

    /**
     * init trait.
     */
    public function initializeParents()
    {
        $this->parents = null;
    }

    /**
     * Getter for parents.
     *
     * @return AbstractEntity
     */
    public function getParents()
    {
        return $this->parents;
    }

    /**
     * Checker for parents.
     *
     * @return bool
     */
    public function hasParents()
    {
        return (bool) ($this->getParents() !== null);
    }

    public function hasParent(AbstractEntity $parent)
    {
        return (bool) ($this->parents->contains($parent));
    }
}

/* EOF */
