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

    'account-profile' => [
        'name' => 'account-profile',
        'parent' => 'avatar',
        'icon' => 'vpn_key',
        'slug' => route('profile.account', user()->handlename),
        'always_viewable' => false,
        'order' => 2,
        'labels' => [
            'title' => __('Account Information'),
            'description' => __('Manage Account details'),
        ],
    ],
];
