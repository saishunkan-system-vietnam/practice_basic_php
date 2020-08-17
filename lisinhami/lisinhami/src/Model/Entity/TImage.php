<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TImage Entity
 *
 * @property int $id
 * @property int $id_prd
 * @property string $img_url
 * @property bool $top_flg
 * @property bool $banner_flg
 * @property bool $del_flg
 * @property \Cake\I18n\FrozenTime $create_datetime
 * @property \Cake\I18n\FrozenTime $update_datetime
 */
class TImage extends Entity
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
        'id_prd' => true,
        'img_url' => true,
        'top_flg' => true,
        'banner_flg' => true,
        'del_flg' => true,
        'create_datetime' => true,
        'update_datetime' => true,
    ];
}
