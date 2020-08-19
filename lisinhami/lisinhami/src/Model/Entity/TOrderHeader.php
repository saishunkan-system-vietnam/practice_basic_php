<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TOrderHeader Entity
 *
 * @property int $id
 * @property string|null $id_user
 * @property \Cake\I18n\FrozenDate $odr_date
 * @property string $paymnt_method
 * @property string $shipping_unit
 * @property string $fee
 * @property string $address
 * @property string $reciever
 * @property string $phone
 * @property string|null $note
 * @property string $status
 * @property string $odr_flg
 * @property \Cake\I18n\FrozenTime $create_datetime
 * @property \Cake\I18n\FrozenTime $update_datetime
 */
class TOrderHeader extends Entity
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
        'id_user' => true,
        'odr_date' => true,
        'paymnt_method' => true,
        'shipping_unit' => true,
        'fee' => true,
        'address' => true,
        'reciever' => true,
        'phone' => true,
        'note' => true,
        'status' => true,
        'odr_flg' => true,
        'create_datetime' => true,
        'update_datetime' => true,
    ];
}
