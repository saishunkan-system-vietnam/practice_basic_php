<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TOrderHeaderTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TOrderHeaderTable Test Case
 */
class TOrderHeaderTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TOrderHeaderTable
     */
    protected $TOrderHeader;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TOrderHeader',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TOrderHeader') ? [] : ['className' => TOrderHeaderTable::class];
        $this->TOrderHeader = $this->getTableLocator()->get('TOrderHeader', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TOrderHeader);

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
