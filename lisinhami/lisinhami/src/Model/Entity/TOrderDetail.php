<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TOrderDetail Entity
 *
 * @property int $id
 * @property int $id_odrh
 * @property int $id_product
 * @property int $amount
 * @property string $price
 * @property string $tax
 * @property bool $del_flg
 * @property \Cake\I18n\FrozenTime $create_datetime
 * @property \Cake\I18n\FrozenTime $update_datetime
 */
class TOrderDetail extends Entity
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
        'id_odrh' => true,
        'id_product' => true,
        'amount' => true,
        'price' => true,
        'tax' => true,
        'del_flg' => true,
        'create_datetime' => true,
        'update_datetime' => true,
    ];
}
