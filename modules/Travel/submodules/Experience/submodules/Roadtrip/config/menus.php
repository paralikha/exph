<?php

return [
    /**
     * -------------------------------------------------------------------------
     * Roadtrips Menus
     * -------------------------------------------------------------------------
     * Specify here the menus to appear on the sidebar.
     *
     */
    'roadtrip' => [
        'name' => 'roadtrip',
        'order' => 51,
        'slug' => url(config('path.admin').'/roadtrips'),
        'always_viewable' => false,
        'icon' => 'directions_car',
        'labels' => [
            'title' => __('Roadtrips'),
            'description' => __('Manage roadtrips'),
        ],
        'children' => [
            'view-roadtrip' => [
                'name' => 'view-roadtrip',
                'order' => 1,
                'slug' => url(config('path.admin').'/roadtrips'),
                'always_viewable' => false,
                'routes' => [
                    'name' => 'roadtrips.index',
                    'children' => [
                        'roadtrips.edit',
                        'roadtrips.show',
                    ]
                ],
                'labels' => [
                    'title' => __('All Roadtrips'),
                    'description' => __('View the list of all roadtrips'),
                ],
            ],
            'create-roadtrip' => [
                'name' => 'create-roadtrip',
                'order' => 2,
                'slug' => url(config('path.admin').'/roadtrips/create'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('Create Roadtrip'),
                    'description' => __('Create a Roadtrip'),
                ],
            ],
            'trashed-roadtrip' => [
                'name' => 'trashed-roadtrip',
                'order' => 3,
                'icon' => 'delete',
                'slug' => route('roadtrips.trashed'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('Trashed Roadtrips'),
                    'description' => __('View list of all roadtrips moved to trash'),
                ],
            ],
        ],
    ],
];
