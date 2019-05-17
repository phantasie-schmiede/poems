<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

return array(
    'ctrl'      => array(
        'title'                    => 'LLL:EXT:ps_poems/Resources/Private/Language/locallang_db.xml:tx_pspoems_domain_model_poem',
        'label'                    => 'title',
        'tstamp'                   => 'tstamp',
        'crdate'                   => 'crdate',
        'cruser_id'                => 'cruser_id',
        'sortby'                   => 'sorting',
        'default_sortby'           => 'ORDER BY sorting',
        'dividers2tabs'            => true,
        'versioningWS'             => 2,
        'versioning_followPages'   => true,
        'origUid'                  => 't3_origuid',
        'languageField'            => 'sys_language_uid',
        'transOrigPointerField'    => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete'                   => 'deleted',
        'enablecolumns'            => array(
            'disabled'  => 'hidden',
            'starttime' => 'starttime',
            'endtime'   => 'endtime',
        ),
        'searchFields'             => 'title,authors,categories,languages,text',
        'iconfile'                 => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('ps_poems') . 'Resources/Public/Icons/tx_pspoems_domain_model_poem.gif'
    ),
    'interface' => array(
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, authors, categories, languages, text',
    ),
    'types'     => array(
        '1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden, title, authors, categories, languages, text;;1,--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,starttime, endtime'),
    ),
    'palettes'  => array(
        '1' => array('showitem' => ''),
    ),
    'columns'   => array(
        'sys_language_uid' => array(
            'exclude' => 1,
            'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
            'config'  => array(
                'type'                => 'select',
                'foreign_table'       => 'sys_language',
                'foreign_table_where' => 'ORDER BY sys_language.title',
                'items'               => array(
                    array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
                    array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
                ),
            ),
        ),
        'l10n_parent'      => array(
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude'     => 1,
            'label'       => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
            'config'      => array(
                'type'                => 'select',
                'items'               => array(
                    array('', 0),
                ),
                'foreign_table'       => 'tx_pspoems_domain_model_poem',
                'foreign_table_where' => 'AND tx_pspoems_domain_model_poem.pid=###CURRENT_PID### AND tx_pspoems_domain_model_poem.sys_language_uid IN (-1,0)',
            ),
        ),
        'l10n_diffsource'  => array(
            'config' => array(
                'type' => 'passthrough',
            ),
        ),
        't3ver_label'      => array(
            'label'  => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'max'  => 255,
            )
        ),
        'hidden'           => array(
            'exclude' => 1,
            'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
            'config'  => array(
                'type' => 'check',
            ),
        ),
        'starttime'        => array(
            'exclude'   => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label'     => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
            'config'    => array(
                'type'     => 'input',
                'size'     => 13,
                'max'      => 20,
                'eval'     => 'datetime',
                'checkbox' => 0,
                'default'  => 0,
                'range'    => array(
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ),
            ),
        ),
        'endtime'          => array(
            'exclude'   => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label'     => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
            'config'    => array(
                'type'     => 'input',
                'size'     => 13,
                'max'      => 20,
                'eval'     => 'datetime',
                'checkbox' => 0,
                'default'  => 0,
                'range'    => array(
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ),
            ),
        ),
        'title'            => array(
            'exclude' => 0,
            'label'   => 'LLL:EXT:ps_poems/Resources/Private/Language/locallang_db.xml:tx_pspoems_domain_model_poem.title',
            'config'  => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ),
        ),
        'authors'          => array(
            'exclude' => 1,
            'label'   => 'LLL:EXT:ps_poems/Resources/Private/Language/locallang_db.xml:tx_pspoems_domain_model_poem.authors',
            'config'  => array(
                'type'          => 'select',
                'foreign_table' => 'tx_pspoems_domain_model_author',
                'MM'            => 'tx_pspoems_poem_author_mm',
                'size'          => 5,
                'autoSizeMax'   => 30,
                'maxitems'      => 9999,
                'multiple'      => 0,
                'appearance'    => array(
                    'useCombination' => 1,
                    'useSortable'    => 1,
                    'collapseAll'    => 1,
                    'expandSingle'   => 1,
                )
            )
        ),
        'categories'       => array(
            'exclude' => 1,
            'label'   => 'LLL:EXT:ps_poems/Resources/Private/Language/locallang_db.xml:tx_pspoems_domain_model_poem.categories',
            'config'  => array(
                'type'          => 'select',
                'foreign_table' => 'tx_pspoems_domain_model_category',
                'MM'            => 'tx_pspoems_poem_category_mm',
                'size'          => 10,
                'autoSizeMax'   => 30,
                'maxitems'      => 9999,
                'multiple'      => 0,
                'appearance'    => array(
                    'useCombination' => 1,
                    'useSortable'    => 1,
                    'collapseAll'    => 1,
                    'expandSingle'   => 1,
                )
            )
        ),
        'languages'        => array(
            'exclude' => 1,
            'label'   => 'LLL:EXT:ps_poems/Resources/Private/Language/locallang_db.xml:tx_pspoems_domain_model_poem.languages',
            'config'  => array(
                'type'          => 'select',
                'foreign_table' => 'tx_pspoems_domain_model_language',
                'MM'            => 'tx_pspoems_poem_language_mm',
                'size'          => 5,
                'autoSizeMax'   => 30,
                'maxitems'      => 9999,
                'multiple'      => 0,
                'appearance'    => array(
                    'useCombination' => 1,
                    'useSortable'    => 1,
                    'collapseAll'    => 1,
                    'expandSingle'   => 1,
                )
            )
        ),
        'text'             => array(
            'exclude'       => 0,
            'label'         => 'LLL:EXT:ps_poems/Resources/Private/Language/locallang_db.xml:tx_pspoems_domain_model_poem.text',
            'config'        => array(
                'type' => 'text',
                'cols' => 32,
                'rows' => 5,
                'eval' => 'trim'
            ),
            // enable RTE
            'defaultExtras' => 'richtext[*]:rte_transform[mode=ts_css]'
        ),
    ),
);
