<?php

/*
 * This file is part of the Scribe Mantle Bundle.
 *
 * (c) Scribe Inc. <source@scribe.software>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Scribe\MantleBundle\Doctrine\Repository\Node;

use Doctrine\ORM\EntityRepository;
use Scribe\Doctrine\Behavior\Repository\Hierarchical\HierarchicalNodeTreeBehaviorTrait;

/**
 * NodeRepository.
 */
class NodeRepository extends EntityRepository
{
    use HierarchicalNodeTreeBehaviorTrait;
}