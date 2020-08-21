<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TShippingUnitTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TShippingUnitTable Test Case
 */
class TShippingUnitTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TShippingUnitTable
     */
    protected $TShippingUnit;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TShippingUnit',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TShippingUnit') ? [] : ['className' => TShippingUnitTable::class];
        $this->TShippingUnit = $this->getTableLocator()->get('TShippingUnit', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TShippingUnit);

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
