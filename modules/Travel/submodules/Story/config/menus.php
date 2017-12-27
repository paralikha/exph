<?php

return [
    /**
     * -------------------------------------------------------------------------
     * Stories Menus
     * -------------------------------------------------------------------------
     * Specify here the menus to appear on the sidebar.
     *
     */
    'story' => [
        'name' => 'story',
        'order' => 51,
        'slug' => url(config('path.admin').'/stories'),
        'always_viewable' => false,
        'icon' => 'stars',
        'labels' => [
            'title' => __('Stories'),
            'description' => __('Manage stories'),
        ],
        'children' => [
            'view-story' => [
                'name' => 'view-story',
                'order' => 1,
                'slug' => url(config('path.admin').'/stories'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('All Stories'),
                    'description' => __('View the list of all stories'),
                ],
            ],
            'create-story' => [
                'name' => 'create-story',
                'order' => 2,
                'slug' => url(config('path.admin').'/stories/create'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('Create Story'),
                    'description' => __('Create a Story'),
                ],
            ],
            'trashed-story' => [
                'name' => 'trashed-story',
                'order' => 3,
                'slug' => url(config('path.admin').'/stories/trash'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('Trashed Stories'),
                    'description' => __('View list of all stories moved to trash'),
                ],
            ],
        ],
    ],
];
