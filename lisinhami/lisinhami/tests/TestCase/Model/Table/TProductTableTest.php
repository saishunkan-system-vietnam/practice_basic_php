<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TProductTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TProductTable Test Case
 */
class TProductTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TProductTable
     */
    protected $TProduct;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TProduct',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TProduct') ? [] : ['className' => TProductTable::class];
        $this->TProduct = $this->getTableLocator()->get('TProduct', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TProduct);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
