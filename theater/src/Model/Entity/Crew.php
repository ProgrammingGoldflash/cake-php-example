<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Crew Entity
 *
 * @property int $drama_event_id
 * @property int $person_id
 *
 * @property \App\Model\Entity\DramaEvent $drama_event
 * @property \App\Model\Entity\Person $person
 */
class Crew extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'drama_event' => true,
        'person' => true,
    ];
}
