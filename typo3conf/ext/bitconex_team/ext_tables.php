<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
        'BitconexTeam',
        'web',
        'members',
        '',
        [
            \Bitconex\BitconexTeam\Controller\MemberController::class => 'list, show, new, create, edit, update, delete',
            
        ],
        [
            'access' => 'user,group',
            'icon'   => 'EXT:bitconex_team/Resources/Public/Icons/user_mod_members.svg',
            'labels' => 'LLL:EXT:bitconex_team/Resources/Private/Language/locallang_members.xlf',
        ]
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bitconexteam_domain_model_member', 'EXT:bitconex_team/Resources/Private/Language/locallang_csh_tx_bitconexteam_domain_model_member.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bitconexteam_domain_model_member');
})();
