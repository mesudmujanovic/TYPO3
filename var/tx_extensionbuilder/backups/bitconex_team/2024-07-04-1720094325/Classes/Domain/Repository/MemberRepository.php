<?php

declare(strict_types=1);

namespace Bitconex\BitconexTeam\Domain\Repository;


/**
 * This file is part of the "Bitconex_team" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2024 Mesud Mujanovic <mesud9494@gmail.com>, Bitconex
 */


/**
 * The repository for Members
 */
class MemberRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * @var array
     */
    protected $defaultOrderings = ['sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING];
}
