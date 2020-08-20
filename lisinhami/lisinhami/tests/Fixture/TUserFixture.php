<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TUserFixture
 */
class TUserFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 't_user';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'uid' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => ' Email người dùng', 'precision' => null],
        'pass' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'Mật khẩu đăng nhập', 'precision' => null],
        'full_name' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'Họ tên người dùng', 'precision' => null],
        'gender' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'Giới tính(0: Nữ, 1:Nam)', 'precision' => null],
        'phone' => ['type' => 'string', 'length' => 15, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'số điện thoại', 'precision' => null],
        'address1' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'Địa chỉ chính', 'precision' => null],
        'address2' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'Địa chỉ phụ', 'precision' => null],
        'admin_flg' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => 'Cờ admin(0: user, 1:admin)', 'precision' => null],
        'del_flg' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => 'Cờ xóa(0: Không xóa, 1:Xóa)', 'precision' => null],
        'create_datetime' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => false, 'default' => 'current_timestamp()', 'comment' => 'Thời gian tạo'],
        'update_datetime' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => false, 'default' => 'current_timestamp()', 'comment' => 'Thời gian cập nhật'],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['uid'], 'length' => []],
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
                'uid' => 'f2550fbe-2062-4b61-81e2-f43f7d2ea9bf',
                'pass' => 'Lorem ipsum dolor sit amet',
                'full_name' => 'Lorem ipsum dolor sit amet',
                'gender' => 1,
                'phone' => 'Lorem ipsum d',
                'address1' => 'Lorem ipsum dolor sit amet',
                'address2' => 'Lorem ipsum dolor sit amet',
                'admin_flg' => 1,
                'del_flg' => 1,
                'create_datetime' => '2020-08-20 02:18:24',
                'update_datetime' => '2020-08-20 02:18:24',
            ],
        ];
        parent::init();
    }
}
