<?php
/** @noinspection PhpFullyQualifiedNameUsageInspection */
declare(strict_types=1);

$EM_CONF['psb_poems'] = [
    'author'       => 'Daniel Ablass',
    'author_email' => 'dn@phantasie-schmiede.de',
    'category'     => 'plugin',
    'constraints'  => [
        'depends' => [
            'psb_foundation' => '',
            'typo3'          => '9.5.7-9.5.99',
        ],
    ],
    'description'  => 'Manage and display poems',
    'state'        => 'beta',
    'title'        => 'PSbits | Poems',
    'version'      => '3.0.0',
];
