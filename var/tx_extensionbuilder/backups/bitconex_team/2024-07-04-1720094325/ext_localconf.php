<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'BitconexTeam',
        'Members',
        [
            \Bitconex\BitconexTeam\Controller\MemberController::class => 'list, show, new, create, edit, update, delete'
        ],
        // non-cacheable actions
        [
            \Bitconex\BitconexTeam\Controller\MemberController::class => 'create, update, delete'
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    members {
                        iconIdentifier = bitconex_team-plugin-members
                        title = LLL:EXT:bitconex_team/Resources/Private/Language/locallang_db.xlf:tx_bitconex_team_members.name
                        description = LLL:EXT:bitconex_team/Resources/Private/Language/locallang_db.xlf:tx_bitconex_team_members.description
                        tt_content_defValues {
                            CType = list
                            list_type = bitconexteam_members
                        }
                    }
                }
                show = *
            }
       }'
    );
})();
