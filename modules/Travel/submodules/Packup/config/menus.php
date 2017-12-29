<?php

return [
    /**
     * -------------------------------------------------------------------------
     * Packups Menus
     * -------------------------------------------------------------------------
     * Specify here the menus to appear on the sidebar.
     *
     */
    'packup' => [
        'name' => 'packup',
        'order' => 51,
        'slug' => route('packups.index'),
        'always_viewable' => false,
        'icon' => 'shopping_basket',
        'labels' => [
            'title' => __('Packups'),
            'description' => __('Manage packups'),
        ],
        'children' => [
            'view-packup' => [
                'name' => 'view-packup',
                'order' => 1,
                'slug' => route('packups.index'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('All Packups'),
                    'description' => __('View the list of all packups'),
                ],
            ],
            'create-packup' => [
                'name' => 'create-packup',
                'order' => 2,
                'slug' => route('packups.create'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('Create Packup'),
                    'description' => __('Create a Packup'),
                ],
            ],
            // 'trash-packup' => [
            //     'name' => 'trash-packup',
            //     'order' => 3,
            //     'slug' => route('packups.trash'),
            //     'always_viewable' => false,
            //     'labels' => [
            //         'title' => __('Trashed Packups'),
            //         'description' => __('View list of all packups moved to trash'),
            //     ],
            // ],
        ],
    ],
];
