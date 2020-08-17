<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TImageTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TImageTable Test Case
 */
class TImageTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TImageTable
     */
    protected $TImage;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TImage',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TImage') ? [] : ['className' => TImageTable::class];
        $this->TImage = $this->getTableLocator()->get('TImage', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TImage);

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
