<?php

declare(strict_types=1);

namespace Bitconex\BitconexTeam\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Mesud Mujanovic <mesud9494@gmail.com>
 */
class MemberTest extends UnitTestCase
{
    /**
     * @var \Bitconex\BitconexTeam\Domain\Model\Member|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Bitconex\BitconexTeam\Domain\Model\Member::class,
            ['dummy']
        );
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getNameReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameForStringSetsName(): void
    {
        $this->subject->setName('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('name'));
    }

    /**
     * @test
     */
    public function getLastnameReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getLastname()
        );
    }

    /**
     * @test
     */
    public function setLastnameForStringSetsLastname(): void
    {
        $this->subject->setLastname('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('lastname'));
    }
}
