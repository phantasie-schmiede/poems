<?php
declare(strict_types=1);

$EM_CONF['poems'] = [
    'author'           => 'Daniel Ablass',
    'author_email'     => 'dn@phantasie-schmiede.de',
    'category'         => 'plugin',
    'clearCacheOnLoad' => true,
    'constraints'      => [
        'conflicts' => [],
        'depends'   => [
            'foundation' => '3.0',
        ],
        'suggests'  => [],
    ],
    'description'      => 'Manage and display poems',
    'state'            => 'beta',
    'title'            => 'PSBits | Poems',
    'version'          => '0.0.0',
];
