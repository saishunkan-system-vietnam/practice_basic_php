<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TOrderDetailTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TOrderDetailTable Test Case
 */
class TOrderDetailTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TOrderDetailTable
     */
    protected $TOrderDetail;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TOrderDetail',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TOrderDetail') ? [] : ['className' => TOrderDetailTable::class];
        $this->TOrderDetail = $this->getTableLocator()->get('TOrderDetail', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TOrderDetail);

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
