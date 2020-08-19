<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TOrderHeaderFixture
 */
class TOrderHeaderFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 't_order_header';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'id', 'autoIncrement' => true, 'precision' => null],
        'id_user' => ['type' => 'string', 'length' => 30, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'mã user', 'precision' => null],
        'odr_date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => 'current_timestamp()', 'comment' => 'Ngày tạo', 'precision' => null],
        'paymnt_method' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'phương thức thanh toán', 'precision' => null],
        'shipping_unit' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'đơn vị vận chuyển', 'precision' => null],
        'fee' => ['type' => 'decimal', 'length' => 10, 'precision' => 0, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => 'phí ship'],
        'address' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'Địa chỉ', 'precision' => null],
        'reciever' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'Tên người nhận hàng', 'precision' => null],
        'phone' => ['type' => 'string', 'length' => 10, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'Số điện thoại người nhận hàng', 'precision' => null],
        'note' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'Ghi chú đơn hàng', 'precision' => null],
        'status' => ['type' => 'string', 'length' => 1, 'null' => false, 'default' => '1', 'collate' => 'utf8_unicode_ci', 'comment' => 'Trạng thái đơn hàng (
1: chờ xử lý xác nhận đơn hàng
2: đã xử lý, chờ xuất hàng.
3: đã xuất hàng chờ vận chuyển
4: đang vận chuyển, chờ giao hàng
5: Đang giao hàng
6: Nhận hàng, hoàn thành đơn hàng
0: Hủy đơn hàng
)', 'precision' => null],
        'odr_flg' => ['type' => 'string', 'length' => 1, 'null' => false, 'default' => '0', 'collate' => 'utf8_unicode_ci', 'comment' => 'Cờ xác định đơn hàng (0: đơn hàng đã đăng nhập, 1 là đơn hàng không đăng nhập, 2 là đơn hàng sample)', 'precision' => null],
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
                'id_user' => 'Lorem ipsum dolor sit amet',
                'odr_date' => '2020-08-19',
                'paymnt_method' => 'Lorem ipsum dolor sit amet',
                'shipping_unit' => 'Lorem ipsum dolor sit amet',
                'fee' => 1.5,
                'address' => 'Lorem ipsum dolor sit amet',
                'reciever' => 'Lorem ipsum dolor sit amet',
                'phone' => 'Lorem ip',
                'note' => 'Lorem ipsum dolor sit amet',
                'status' => 'L',
                'odr_flg' => 'L',
                'create_datetime' => '2020-08-19 03:14:30',
                'update_datetime' => '2020-08-19 03:14:30',
            ],
        ];
        parent::init();
    }
}
