<?php

defined('TYPO3_MODE') or die();

call_user_func(
    function () {

        // We use the standard fluid_styled_content language references
        $frontendLanguageFilePrefix = 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:';

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
            'tt_content',
            'CType',
            [
                'Simple CE: DoubleText',
                'simplece_doubletext',
                'content-textpic',
            ],
            'header',
            'after'
        );

        // Add the second bodytext column to the TCA of 'tt_content'
        $additionalColumns = [
            'bodytext2' => [
                'l10n_cat' => 'text',
                'exclude'  => true,
                'label'    => 'Bodytext 2',
                'type'     => 'text',
                'config'   => [
                    'type'    => 'text',
                    'cols'    => '80',
                    'rows'    => '15',
                    'wizards' => [
                        'RTE'   => [
                            'notNewRecords' => 1,
                            'RTEonly'       => 1,
                            'type'          => 'script',
                            'title'         => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:bodytext.W.RTE',
                            'icon'          => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_rte.gif',
                            'module'        => [
                                'name' => 'wizard_rte',
                            ],
                        ],
                        'table' => [
                            'notNewRecords'      => 1,
                            'enableByTypeConfig' => 1,
                            'type'               => 'script',
                            'title'              => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:bodytext.W.table',
                            'icon'               => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_table.gif',
                            'module'             => [
                                'name' => 'wizard_table',
                            ],
                            'params'             => [
                                'xmlOutput' => 0,
                            ],
                        ],
                    ],
                    'softref' => 'typolink_tag,images,email[subst],url',
                    'search'  => [
                        'andWhere' => 'CType=\'text\' OR CType=\'textpic\'',
                    ],
                ],
            ],
        ];
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $additionalColumns);

        // Tell the TCA, what field should be available in the new content element
        $GLOBALS['TCA']['tt_content']['types']['simplece_doubletext'] = [
            'showitem'         => '
				--palette--;' . $frontendLanguageFilePrefix . 'palette.general;general,
				--palette--;' . $frontendLanguageFilePrefix . 'palette.header;header,
				bodytext;Text 1,
				bodytext2;Text 2,
			--div--;' . $frontendLanguageFilePrefix . 'tabs.appearance,
				layout;' . $frontendLanguageFilePrefix . 'layout_formlabel,
				--palette--;' . $frontendLanguageFilePrefix . 'palette.appearanceLinks;appearanceLinks,
			--div--;' . $frontendLanguageFilePrefix . 'tabs.access,
				hidden;' . $frontendLanguageFilePrefix . 'field.default.hidden,
				--palette--;' . $frontendLanguageFilePrefix . 'palette.access;access,
		',
            // Add rich text editors to both bodytext columns
            'columnsOverrides' => [
                'bodytext'  => ['defaultExtras' => 'richtext:rte_transform'],
                'bodytext2' => ['defaultExtras' => 'richtext:rte_transform'],
            ],
        ];
    }
);
