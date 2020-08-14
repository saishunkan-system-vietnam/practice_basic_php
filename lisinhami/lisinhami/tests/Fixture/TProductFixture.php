<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TProductFixture
 */
class TProductFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 't_product';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'Id sản phẩm', 'autoIncrement' => true, 'precision' => null],
        'name' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'Tên sản phẩm', 'precision' => null],
        'category_cd' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '1', 'comment' => 'Mã thể loại(1:sản phẩm mỹ phẩm, 2: sản phẩm dùng thử, 3: sản phẩm quà tặng)', 'precision' => null],
        'price' => ['type' => 'decimal', 'length' => 10, 'precision' => 0, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => 'Giá sản phẩm'],
        'discount' => ['type' => 'decimal', 'length' => 10, 'precision' => 0, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => 'Giảm giá'],
        'tax' => ['type' => 'tinyinteger', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'Thuế ', 'precision' => null],
        'made_in' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'Xuất xứ', 'precision' => null],
        'info_gen' => ['type' => 'string', 'length' => 200, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'Mô tả', 'precision' => null],
        'info_dtl' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'Nội dung', 'precision' => null],
        'point' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => 'Điểm thưởng', 'precision' => null, 'autoIncrement' => null],
        'slug' => ['type' => 'string', 'length' => 60, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'link thân thiện', 'precision' => null],
        'del_flg' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => 'Cờ xóa (0: Không xóa,  1: xóa)', 'precision' => null],
        'create_datetime' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => false, 'default' => 'current_timestamp()', 'comment' => 'thời gian tạo'],
        'update_datetime' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => false, 'default' => 'current_timestamp()', 'comment' => 'Thời gian cập nhật'],
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
                'name' => 'Lorem ipsum dolor sit amet',
                'category_cd' => 1,
                'price' => 1.5,
                'discount' => 1.5,
                'tax' => 1,
                'made_in' => 'Lorem ipsum dolor sit amet',
                'info_gen' => 'Lorem ipsum dolor sit amet',
                'info_dtl' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'point' => 1,
                'slug' => 'Lorem ipsum dolor sit amet',
                'del_flg' => 1,
                'create_datetime' => '2020-08-14 09:42:35',
                'update_datetime' => '2020-08-14 09:42:35',
            ],
        ];
        parent::init();
    }
}
