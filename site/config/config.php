<?php

/**
 * The config file is optional. It accepts a return array with config options
 * Note: Never include more than one return statement, all options go within this single return array
 * In this example, we set debugging to true, so that errors are displayed onscreen. 
 * This setting must be set to false in production.
 * All config options: https://getkirby.com/docs/reference/system/options
 */
return [
    'debug' => true,
    'panel' =>[
        'install' => true
    ],
    'cache' => [
        'type' => 'memcached',
        'pages' => [
            'active' => false
        ]
    ],
    'thumbs' => [
        'driver' => 'im',
        'autoOrient' => true,
        'quality' => '80',
        'interlace' => true
    ],
    'pedroborges.meta-tags.default' => function ($page, $site) {
        return [
            'title' => $site->title() . " | " . $page->title(),
            'meta' => [
                'description' => $site->description(),  
            ],
            'link' => [
                'icon' => [
                    ['href' => url('/assets/images/icons/favicon-16x16.png'), 'sizes' => '16x16', 'type' =>'image/png'],
                    ['href' => url('/assets/images/icons/favicon-32x32.png'), 'sizes' => '32x32', 'type' =>'image/png'],
                    ['href' => url('/assets/images/icons/favicon-96x96.png'), 'sizes' => '96x96', 'type' =>'image/png'],
                ],
            'canonical' => page()->Canonical()->isNotEmpty() ? $page->Canonical() : $page->url(), 
            ],
            'og' => [ 
                'title' => $site->title() . " | " . $page->title(),
                'type' => 'website',
                'description' => $site->description(),  
                'site_name' => $site->title(),
                'url' => $page->isHomePage() ? $site->url() : $page->url(),
                'namespace:image' => function($page, $site) {
                    $image =  $site->url() . "/assets/art-eaterpodcast.jpg";
                    if($image != null) {
                        return [
                            'image' => $image,
                            'height' =>  "1400",
                            'width' => "1400",
                            'type' => "image/jpeg"
                        ];
                    }
                }
            ],
            'twitter' => [
                'card' => 'summary_large_image',
                'site' => "@arteaterpodcast",
                'title' => $site->title() . " | " . $page->title(),
                'namespace:image' => function($page, $site) {
                    $image =  $site->url() . "/assets/art-eaterpodcast.jpg";
                        if($image != null) {

                        return [
                            'image' => $image,
                            'alt' => $site->title() . " | " . $page->title()
                        ];
                    }
                }
            ],
        ];
    },
    'pedroborges.meta-tags.templates' => function ($page, $site) {
        return [
            'article' => [
                'meta' => [
                    'description' => $page->text()->excerpt(140, true,'…'),    
                ],
                'og' => [
                    'type' => 'article',
                    'description' => $page->text()->excerpt(140, true,'…'),
                    'namespace:image' => function($page) {
                        $image = $page->coverimage()->toFile();
                        if($image != null) {
                            return [
                                'image' => $image->url(),
                                'height' => $image->height(),
                                'width' => $image->width(),
                                'type' => $image->mime()
                            ];
                        }
                    
                    }
                ],
                'twitter' => [
                        'creator' => function($page) { return $page->twitterauthor(); },
                        'namespace:image' => function($page, $site) {
                            $image = $page->coverimage()->toFile();
                            if($image != null) {

                            return [
                                'image' => $image->url(),
                                'alt' => $image->alt(),
                            ];
                        }
                    }
                ]
            ],
            'podcast' => [
                'meta' => [
                    'description' => $page->text()->excerpt(140, true,'…'),  
                ],
                'og' => [
                    'type' => 'article',
                    'description' => $page->text()->excerpt(140, true,'…'),
                    'namespace:image' => function($page, $site) {
                            $image = $page->coverimage()->toFile();
                            if($image != null) {

                            return [
                                'image' => $image->url(),
                                'alt' => $image->alt(),
                            ];
                        }
                    }
                ],
                'twitter' => [
                        'creator' => function($page) { return $page->twitterauthor(); },
                        'namespace:image' => function($page, $site) {
                            $image =  $site->url() . "/assets/art-eaterpodcast.jpg";
                                if($image != null) {

                                return [
                                    'image' => $image,
                                    'alt' => $site->title() . " | " . $page->title()
                                ];
                            }
                
                    }
                ]
            ],
        
        ];
    }
];

