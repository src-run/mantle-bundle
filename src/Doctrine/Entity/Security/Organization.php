<?php

/*
 * This file is part of the Scribe Mantle Bundle.
 *
 * (c) Scribe Inc. <https://scribe.software>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Scribe\MantleBundle\Doctrine\Entity\Security;

use Doctrine\Common\Collections\ArrayCollection;
use Scribe\Doctrine\ORM\Mapping\IdEntity;
use Scribe\MantleBundle\Doctrine\Base\Model\Activity\HasActivityCollection;
use Scribe\MantleBundle\Doctrine\Base\Model\Address\HasAddressCollection;
use Scribe\MantleBundle\Doctrine\Base\Model\HasCode;
use Scribe\MantleBundle\Doctrine\Base\Model\Description\HasDescription;
use Scribe\MantleBundle\Doctrine\Base\Model\HasProperties;
use Scribe\MantleBundle\Doctrine\Base\Model\Name\HasName;
use Scribe\MantleBundle\Doctrine\Base\Model\Phone\HasPhoneCollection;
use Scribe\MantleBundle\Doctrine\Behavior\Model\Timestampable\TimestampableBehaviorTrait;
use Scribe\MantleBundle\Component\Security\Core\OrganizationInterface;
use Scribe\MantleBundle\Component\Security\Core\UserInterface;
use Scribe\MantleBundle\Doctrine\Base\Model\HasRolesOwningSide;
use Scribe\MantleBundle\Doctrine\Base\Model\HasUsersInverseSide;

/**
 * Class Organization.
 */
class Organization extends IdEntity implements OrganizationInterface
{
    use HasCode;
    use HasName;
    use HasDescription;
    use HasProperties;
    use HasAddressCollection;
    use HasPhoneCollection;
    use HasActivityCollection;
    use HasUsersInverseSide;
    use HasRolesOwningSide;
    use TimestampableBehaviorTrait;

    /**
     * @var string
     */
    const VERSION = '0.1.0';

    /**
     * @var ArrayCollection
     */
    protected $managers;

    /**
     * Support for casting from object type to string type.
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getName();
    }

    /**
     * Initialize manager as empty ArrayCollection.
     */
    public function initializeManagers()
    {
        $this->managers = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getManagers()
    {
        return $this->managers;
    }

    /**
     * @param ArrayCollection $managers
     *
     * @return $this
     */
    public function setManagers(ArrayCollection $managers)
    {
        $this->managers = $managers;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasManagers()
    {
        return (bool) (!$this->managers->isEmpty());
    }

    /**
     * @return $this
     */
    public function clearManagers()
    {
        $this->managers = new ArrayCollection();

        return $this;
    }

    /**
     * @param UserInterface $user
     *
     * @return bool
     */
    public function hasManager(UserInterface $user)
    {
        return (bool) ($this->managers->contains($user));
    }

    /**
     * @param UserInterface $user
     *
     * @return bool
     */
    public function isManager(UserInterface $user)
    {
        return $this->hasManager($user);
    }

    /**
     * @param UserInterface $user
     *
     * @return $this
     */
    public function addManager(UserInterface $user)
    {
        if (false === $this->hasManager($user)) {
            $this->managers->add($user);
        }

        return $this;
    }

    /**
     * @param UserInterface $user
     *
     * @return $this
     */
    public function removeManager(UserInterface $user)
    {
        $this->managers->removeElement($user);

        return $this;
    }
}

/* EOF */
