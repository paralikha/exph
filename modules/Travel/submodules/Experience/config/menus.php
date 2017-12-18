<?php

return [
    /**
     * -------------------------------------------------------------------------
     * Experiences Menus
     * -------------------------------------------------------------------------
     * Specify here the menus to appear on the sidebar.
     *
     */
    'experience' => [
        'name' => 'experience',
        'order' => 51,
        'slug' => url(config('path.admin').'/experiences'),
        'always_viewable' => false,
        'icon' => 'place',
        'labels' => [
            'title' => __('Experiences'),
            'description' => __('Manage experiences'),
        ],
        'children' => [
            'view-experience' => [
                'name' => 'view-experience',
                'order' => 1,
                'slug' => url(config('path.admin').'/experiences'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('All Experiences'),
                    'description' => __('View the list of all experiences'),
                ],
            ],
            'create-experience' => [
                'name' => 'create-experience',
                'order' => 2,
                'slug' => url(config('path.admin').'/experiences/create'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('Create Experience'),
                    'description' => __('Create a Experience'),
                ],
            ],
            'trashed-experience' => [
                'name' => 'trashed-experience',
                'order' => 3,
                'slug' => url(config('path.admin').'/experiences/trashed'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('Trashed Experiences'),
                    'description' => __('View list of all experiences moved to trash'),
                ],
            ],
        ],
    ],
];
