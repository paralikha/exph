<?php

return [
    'shop-settings' => [
        'name' => 'shop-settings',
        'parent' => 'settings',
        'icon' => 'payment',
        'slug' => route('settings.shop'),
        'always_viewable' => false,
        'order' => 20,
        'labels' => [
            'title' => __('Shop'),
            'description' => __('Manage General site settings'),
        ],
    ],

    'home-settings' => [
        'name' => 'home-settings',
        'parent' => 'settings',
        'icon' => 'home',
        'slug' => route('settings.home'),
        'always_viewable' => false,
        'order' => 20,
        'labels' => [
            'title' => __('Home Page Management'),
            'description' => __('Manage Home Settings')
        ]
    ]
];
