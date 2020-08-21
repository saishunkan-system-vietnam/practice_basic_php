<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TShippingUnit Entity
 *
 * @property int $id
 * @property string $ship_cd
 * @property string $shipping_unit
 * @property string $fee
 * @property string $slug
 * @property bool $del_flg
 * @property \Cake\I18n\FrozenTime $create_datetime
 * @property \Cake\I18n\FrozenTime $update_datetime
 */
class TShippingUnit extends Entity
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
        'ship_cd' => true,
        'shipping_unit' => true,
        'fee' => true,
        'slug' => true,
        'del_flg' => true,
        'create_datetime' => true,
        'update_datetime' => true,
    ];
}
