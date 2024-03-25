<?php
declare(strict_types=1);

$EM_CONF['psb_poems'] = [
    'author'           => 'Daniel Ablass',
    'author_email'     => 'dn@phantasie-schmiede.de',
    'category'         => 'plugin',
    'clearCacheOnLoad' => true,
    'constraints'      => [
        'conflicts' => [
        ],
        'depends'   => [
            'psb_foundation' => '^2',
        ],
        'suggests'  => [
        ],
    ],
    'description'      => 'Manage and display poems',
    'state'            => 'beta',
    'title'            => 'PSbits | Poems',
    'version'          => '0.0.0',
];
