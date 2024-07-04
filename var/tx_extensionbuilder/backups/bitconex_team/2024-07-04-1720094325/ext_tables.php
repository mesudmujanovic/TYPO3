<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bitconexteam_domain_model_member', 'EXT:bitconex_team/Resources/Private/Language/locallang_csh_tx_bitconexteam_domain_model_member.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bitconexteam_domain_model_member');
})();
