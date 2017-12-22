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
];
