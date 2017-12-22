<?php

return [
    /**
     * -------------------------------------------------------------------------
     * Comments Menus
     * -------------------------------------------------------------------------
     * Specify here the menus to appear on the sidebar.
     *
     */
    'comment' => [
        'name' => 'comment',
        'order' => 51,
        'slug' => route('comments.index'),
        'always_viewable' => false,
        'icon' => 'chat_bubble_outline',
        'labels' => [
            'title' => __('Comments'),
            'description' => __('Manage comments'),
        ],
        'children' => [
            'view-comment' => [
                'name' => 'view-comment',
                'order' => 1,
                'slug' => route('comments.index'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('All Comments'),
                    'description' => __('View the list of all comments'),
                ],
            ],
            'create-comment' => [
                'name' => 'create-comment',
                'order' => 2,
                'slug' => route('comments.create'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('Create Comment'),
                    'description' => __('Create a Comment'),
                ],
            ],
            // 'trash-comment' => [
            //     'name' => 'trash-comment',
            //     'order' => 3,
            //     'slug' => route('comments.trash'),
            //     'always_viewable' => false,
            //     'labels' => [
            //         'title' => __('Trashed Comments'),
            //         'description' => __('View list of all comments moved to trash'),
            //     ],
            // ],
        ],
    ],
];
