<?php

/************************************************************************
 * Extension Manager/Repository config file for ext "simplece".
 ************************************************************************/
$EM_CONF[$_EXTKEY] = [
    'title'            => 'Simple CE',
    'description'      => 'Very Simple example on how to content element',
    'category'         => 'templates',
    'constraints'      => [
        'depends'   => [
            'typo3'                => '7.6.2-8.99.99',
            'fluid_styled_content' => '*',
        ],
        'conflicts' => [
        ],
    ],
    'autoload'         => [
        'psr-4' => [
            'CedricZiel\\SimpleCe\\' => 'Classes',
        ],
    ],
    'state'            => 'stable',
    'uploadfolder'     => 0,
    'createDirs'       => '',
    'clearCacheOnLoad' => 1,
    'author'           => 'Cedric Ziel',
    'author_email'     => 'cedric@cedric-ziel.com',
    'author_company'   => 'private',
    'version'          => '1.0.0-dev',
];
