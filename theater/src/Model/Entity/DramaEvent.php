<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DramaEvent Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $date
 * @property int $drama_id
 *
 * @property \App\Model\Entity\Drama $drama
 * @property \App\Model\Entity\Crew[] $crews
 */
class DramaEvent extends Entity
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
        'date' => true,
        'drama_id' => true,
        'drama' => true,
        'crews' => true,
    ];
}
