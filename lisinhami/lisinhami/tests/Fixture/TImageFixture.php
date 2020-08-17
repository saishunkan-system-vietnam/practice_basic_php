<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TImageFixture
 */
class TImageFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 't_image';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'id', 'autoIncrement' => true, 'precision' => null],
        'id_prd' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'id Sản phẩm', 'precision' => null, 'autoIncrement' => null],
        'img_url' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'Link hình ảnh', 'precision' => null],
        'top_flg' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => 'Cờ set hình ảnh mặc định (0: không set, 1: set default)', 'precision' => null],
        'banner_flg' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => 'Cờ set hình ảnh banner (0: không set, 1: set)', 'precision' => null],
        'del_flg' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => 'Cờ xóa (0: không xóa, 1: xóa)', 'precision' => null],
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
                'id_prd' => 1,
                'img_url' => 'Lorem ipsum dolor sit amet',
                'top_flg' => 1,
                'banner_flg' => 1,
                'del_flg' => 1,
                'create_datetime' => '2020-08-17 07:07:33',
                'update_datetime' => '2020-08-17 07:07:33',
            ],
        ];
        parent::init();
    }
}
