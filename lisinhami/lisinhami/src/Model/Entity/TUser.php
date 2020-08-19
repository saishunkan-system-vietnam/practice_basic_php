<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TUser Entity
 *
 * @property string $uid
 * @property string $pass
 * @property string $full_name
 * @property bool $gender
 * @property string $phone
 * @property bool $admin_flg
 * @property bool $del_flg
 * @property \Cake\I18n\FrozenTime $create_datetime
 * @property \Cake\I18n\FrozenTime $update_datetime
 */
class TUser extends Entity
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
        'uid' => true,
        'pass' => true,
        'full_name' => true,
        'gender' => true,
        'phone' => true,
        'admin_flg' => true,
        'del_flg' => true,
        'create_datetime' => true,
        'update_datetime' => true,
    ];
}
