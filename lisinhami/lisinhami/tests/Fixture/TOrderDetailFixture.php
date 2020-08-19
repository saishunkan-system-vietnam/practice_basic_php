<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TOrderDetailFixture
 */
class TOrderDetailFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 't_order_detail';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'id', 'autoIncrement' => true, 'precision' => null],
        'id_odrh' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'mã đơn hàng', 'precision' => null, 'autoIncrement' => null],
        'id_product' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'mã sản phẩm', 'precision' => null, 'autoIncrement' => null],
        'amount' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => 'Số lượng', 'precision' => null, 'autoIncrement' => null],
        'price' => ['type' => 'decimal', 'length' => 10, 'precision' => 0, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => 'Đơn giá'],
        'tax' => ['type' => 'decimal', 'length' => 10, 'precision' => 0, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => 'Thuế suất'],
        'del_flg' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => 'cờ xóa (0: không xóa, 1: xóa)', 'precision' => null],
        'create_datetime' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => false, 'default' => 'current_timestamp()', 'comment' => 'Thời gian tạo'],
        'update_datetime' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => false, 'default' => 'current_timestamp()', 'comment' => 'Thời gian update'],
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
                'id_odrh' => 1,
                'id_product' => 1,
                'amount' => 1,
                'price' => 1.5,
                'tax' => 1.5,
                'del_flg' => 1,
                'create_datetime' => '2020-08-19 03:15:47',
                'update_datetime' => '2020-08-19 03:15:47',
            ],
        ];
        parent::init();
    }
}
