<?php

/*
 * This file is part of the Scribe Mantle Bundle.
 *
 * (c) Scribe Inc. <source@scribe.software>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Scribe\MantleBundle\Doctrine\Behavior\Subscriber\Sluggable;

use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use Doctrine\ORM\Events;
use Scribe\MantleBundle\Doctrine\Behavior\Subscriber\AbstractSubscriber;

/**
 * Class SluggableSubscriber.
 */
class SluggableSubscriber extends AbstractSubscriber
{
    /**
     * @param LoadClassMetadataEventArgs $eventArgs
     */
    public function loadClassMetadata(LoadClassMetadataEventArgs $eventArgs)
    {
        list($classMetadata, $reflectionClass) = $this->getHelperObjectsForLoadClassMetadata($eventArgs);

        if (true !== $this->isSupported($reflectionClass, true)) {
            return;
        }

        foreach ($this->getSubscriberFields() as $field) {
            if ($classMetadata->hasField($field)) {
                continue;
            }

            $classMetadata->mapField([
                'fieldName' => $field,
                'type' => 'string',
                'length' => '512',
                'nullable' => false,
            ]);
        }

        foreach ($this->getSubscriberTriggers() as $trigger) {
            if ($this->classReflectionAnalyser->hasMethod($trigger, $reflectionClass)) {
                $classMetadata->addLifecycleCallback($trigger, Events::prePersist);
                $classMetadata->addLifecycleCallback($trigger, Events::preUpdate);
            }
        }
    }
}

/* EOF */
