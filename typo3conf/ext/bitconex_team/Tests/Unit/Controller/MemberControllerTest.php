<?php

declare(strict_types=1);

namespace Bitconex\BitconexTeam\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use TYPO3Fluid\Fluid\View\ViewInterface;

/**
 * Test case
 *
 * @author Mesud Mujanovic <mesud9494@gmail.com>
 */
class MemberControllerTest extends UnitTestCase
{
    /**
     * @var \Bitconex\BitconexTeam\Controller\MemberController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\Bitconex\BitconexTeam\Controller\MemberController::class))
            ->onlyMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllMembersFromRepositoryAndAssignsThemToView(): void
    {
        $allMembers = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $memberRepository = $this->getMockBuilder(\Bitconex\BitconexTeam\Domain\Repository\MemberRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $memberRepository->expects(self::once())->method('findAll')->will(self::returnValue($allMembers));
        $this->subject->_set('memberRepository', $memberRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('members', $allMembers);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenMemberToView(): void
    {
        $member = new \Bitconex\BitconexTeam\Domain\Model\Member();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('member', $member);

        $this->subject->showAction($member);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenMemberToMemberRepository(): void
    {
        $member = new \Bitconex\BitconexTeam\Domain\Model\Member();

        $memberRepository = $this->getMockBuilder(\Bitconex\BitconexTeam\Domain\Repository\MemberRepository::class)
            ->onlyMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $memberRepository->expects(self::once())->method('add')->with($member);
        $this->subject->_set('memberRepository', $memberRepository);

        $this->subject->createAction($member);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenMemberToView(): void
    {
        $member = new \Bitconex\BitconexTeam\Domain\Model\Member();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('member', $member);

        $this->subject->editAction($member);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenMemberInMemberRepository(): void
    {
        $member = new \Bitconex\BitconexTeam\Domain\Model\Member();

        $memberRepository = $this->getMockBuilder(\Bitconex\BitconexTeam\Domain\Repository\MemberRepository::class)
            ->onlyMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $memberRepository->expects(self::once())->method('update')->with($member);
        $this->subject->_set('memberRepository', $memberRepository);

        $this->subject->updateAction($member);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenMemberFromMemberRepository(): void
    {
        $member = new \Bitconex\BitconexTeam\Domain\Model\Member();

        $memberRepository = $this->getMockBuilder(\Bitconex\BitconexTeam\Domain\Repository\MemberRepository::class)
            ->onlyMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $memberRepository->expects(self::once())->method('remove')->with($member);
        $this->subject->_set('memberRepository', $memberRepository);

        $this->subject->deleteAction($member);
    }
}
