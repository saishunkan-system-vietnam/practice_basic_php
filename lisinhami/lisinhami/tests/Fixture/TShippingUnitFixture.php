<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TShippingUnitFixture
 */
class TShippingUnitFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 't_shipping_unit';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'id', 'autoIncrement' => true, 'precision' => null],
        'ship_cd' => ['type' => 'string', 'length' => 3, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'mã đơn vị vận chuyển', 'precision' => null],
        'shipping_unit' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'đơn vị vận chuyển', 'precision' => null],
        'fee' => ['type' => 'decimal', 'length' => 10, 'precision' => 0, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => 'phí vận chuyển'],
        'slug' => ['type' => 'string', 'length' => 60, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'Link thân thiện', 'precision' => null],
        'del_flg' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => 'Cờ xóa(0: không xóa, 1: xóa)', 'precision' => null],
        'create_datetime' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => false, 'default' => 'current_timestamp()', 'comment' => 'thời gian tạo'],
        'update_datetime' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => false, 'default' => 'current_timestamp()', 'comment' => 'thời gian update'],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_unicode_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'ship_cd' => 'L',
                'shipping_unit' => 'Lorem ipsum dolor sit amet',
                'fee' => 1.5,
                'slug' => 'Lorem ipsum dolor sit amet',
                'del_flg' => 1,
                'create_datetime' => '2020-08-21 02:30:25',
                'update_datetime' => '2020-08-21 02:30:25',
            ],
        ];
        parent::init();
    }
}
