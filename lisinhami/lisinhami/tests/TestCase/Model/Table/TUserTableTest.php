<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TUserTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TUserTable Test Case
 */
class TUserTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TUserTable
     */
    protected $TUser;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TUser',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TUser') ? [] : ['className' => TUserTable::class];
        $this->TUser = $this->getTableLocator()->get('TUser', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TUser);

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
