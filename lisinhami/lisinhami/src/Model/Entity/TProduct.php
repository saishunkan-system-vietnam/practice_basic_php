<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TProduct Entity
 *
 * @property int $id
 * @property string $name
 * @property bool $category_cd
 * @property string $price
 * @property string $discount
 * @property int $tax
 * @property string $made_in
 * @property string $info_gen
 * @property string|null $info_dtl
 * @property int $point
 * @property string $slug
 * @property bool $del_flg
 * @property \Cake\I18n\FrozenTime $create_datetime
 * @property \Cake\I18n\FrozenTime $update_datetime
 */
class TProduct extends Entity
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
        'name' => true,
        'category_cd' => true,
        'price' => true,
        'discount' => true,
        'tax' => true,
        'made_in' => true,
        'info_gen' => true,
        'info_dtl' => true,
        'point' => true,
        'slug' => true,
        'del_flg' => true,
        'create_datetime' => true,
        'update_datetime' => true,
    ];
}
