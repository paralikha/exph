<?php

return [
    /**
     * -------------------------------------------------------------------------
     * Tests Menus
     * -------------------------------------------------------------------------
     * Specify here the menus to appear on the sidebar.
     *
     */
    'test' => [
        'name' => 'test',
        'order' => 51,
        'slug' => url(config('path.admin').'/tests'),
        'always_viewable' => false,
        'icon' => 'mood',
        'labels' => [
            'title' => __('Tests'),
            'description' => __('Manage tests'),
        ],
        'children' => [
            'view-tests' => [
                'name' => 'view-tests',
                'order' => 1,
                'slug' => url(config('path.admin').'/tests'),
                'always_viewable' => false,
                'routes' => [
                    'name' => 'tests.index',
                    'children' => [
                        'tests.edit',
                        'tests.show',
                    ]
                ],
                'labels' => [
                    'title' => __('All Tests'),
                    'description' => __('View the list of all tests'),
                ],
            ],
            'create-test' => [
                'name' => 'create-test',
                'order' => 2,
                'slug' => url(config('path.admin').'/tests/create'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('Create'),
                    'description' => __('Create a Test'),
                ],
            ],
            'trashed-tests' => [
                'name' => 'trashed-tests',
                'order' => 3,
                'slug' => url(config('path.admin').'/tests/trash'),
                'always_viewable' => false,
                'icon' => 'delete',
                'labels' => [
                    'title' => __('Trashed'),
                    'description' => __('View list of all tests moved to trash'),
                ],
            ],
        ],
    ],
];
