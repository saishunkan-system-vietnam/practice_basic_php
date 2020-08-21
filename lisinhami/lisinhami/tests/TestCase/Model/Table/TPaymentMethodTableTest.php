<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TPaymentMethodTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TPaymentMethodTable Test Case
 */
class TPaymentMethodTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TPaymentMethodTable
     */
    protected $TPaymentMethod;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TPaymentMethod',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TPaymentMethod') ? [] : ['className' => TPaymentMethodTable::class];
        $this->TPaymentMethod = $this->getTableLocator()->get('TPaymentMethod', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TPaymentMethod);

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
