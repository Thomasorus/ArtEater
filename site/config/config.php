<?php

/**
 * The config file is optional. It accepts a return array with config options
 * Note: Never include more than one return statement, all options go within this single return array
 * In this example, we set debugging to true, so that errors are displayed onscreen. 
 * This setting must be set to false in production.
 * All config options: https://getkirby.com/docs/reference/system/options
 */
return [
    'debug' => false,
    'panel' =>[
        'install' => true
    ],
    'cache' => [
        'type' => 'memcached',
        'pages' => [
            'active' => true
        ]
    ],
    'thumbs' => [
        'driver' => 'im',
        'autoOrient' => true,
        'quality' => '80',
        'interlace' => true
    ],
    'community.markdown-field.buttons'    => ['headlines' => ['h2', 'h3'], 'bold', 'italic', 'strikethrough', 'blockquote', 'ul', 'ol', 'divider',  'link', 'email', 'divider', 'image'],
    'community.markdown-field.font'       => [
        'family'  => 'sans-serif',
        'scaling' => true,
        'size'    => 'small',
    ],
    'community.markdown-field.blank'      => true,
];