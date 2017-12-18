<?php

return [
    /**
     * -------------------------------------------------------------------------
     * Setting
     * -------------------------------------------------------------------------
     *
     */
    'settings' => [
        'name' => 'settings',
        'is_parent' => true,
        'order' => 1000,
        'slug' => url(config('path.admin').'/settings'),
        'routes' => [
            'name' => 'settings',
            'children' => [
                'settings.social',
            ]
        ],
        'always_viewable' => false,
        'icon' => 'settings',
        'labels' => [
            'title' => __('Settings'),
            'description' => __('Manage app settings')
        ],
        'children' => [
            'general-settings' => [
                'name' => 'general-settings',
                'slug' => route('settings.general'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('General'),
                    'description' => __('Manage General site settings'),
                ],
            ],
        ],
    ],
];
