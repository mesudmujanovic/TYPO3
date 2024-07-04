<?php

declare(strict_types=1);

namespace Bitconex\BitconexTeam\Controller;


/**
 * This file is part of the "Bitconex_team" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2024 Mesud Mujanovic <mesud9494@gmail.com>, Bitconex
 */


/**
 * MemberController
 */
class MemberController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * memberRepository
     *
     * @var \Bitconex\BitconexTeam\Domain\Repository\MemberRepository
     */
    protected $memberRepository = null;

    /**
     * @param \Bitconex\BitconexTeam\Domain\Repository\MemberRepository $memberRepository
     */
    public function injectMemberRepository(\Bitconex\BitconexTeam\Domain\Repository\MemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $members = $this->memberRepository->findAll();
        $this->view->assign('members', $members);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \Bitconex\BitconexTeam\Domain\Model\Member $member
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\Bitconex\BitconexTeam\Domain\Model\Member $member): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('member', $member);
        return $this->htmlResponse();
    }

    /**
     * action new
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function newAction(): \Psr\Http\Message\ResponseInterface
    {
        return $this->htmlResponse();
    }

    /**
     * action create
     *
     * @param \Bitconex\BitconexTeam\Domain\Model\Member $newMember
     */
    public function createAction(\Bitconex\BitconexTeam\Domain\Model\Member $newMember)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->memberRepository->add($newMember);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \Bitconex\BitconexTeam\Domain\Model\Member $member
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("member")
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function editAction(\Bitconex\BitconexTeam\Domain\Model\Member $member): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('member', $member);
        return $this->htmlResponse();
    }

    /**
     * action update
     *
     * @param \Bitconex\BitconexTeam\Domain\Model\Member $member
     */
    public function updateAction(\Bitconex\BitconexTeam\Domain\Model\Member $member)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->memberRepository->update($member);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \Bitconex\BitconexTeam\Domain\Model\Member $member
     */
    public function deleteAction(\Bitconex\BitconexTeam\Domain\Model\Member $member)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->memberRepository->remove($member);
        $this->redirect('list');
    }
}
