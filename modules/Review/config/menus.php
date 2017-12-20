<?php

return [
    /**
     * -------------------------------------------------------------------------
     * Reviews Menus
     * -------------------------------------------------------------------------
     * Specify here the menus to appear on the sidebar.
     *
     */
    'review' => [
        'name' => 'review',
        'order' => 51,
        'slug' => route('reviews.index'),
        'always_viewable' => false,
        'icon' => 'chat_bubble_outline',
        'labels' => [
            'title' => __('Reviews'),
            'description' => __('Manage reviews'),
        ],
        'children' => [
            'view-review' => [
                'name' => 'view-review',
                'order' => 1,
                'slug' => route('reviews.index'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('All Reviews'),
                    'description' => __('View the list of all reviews'),
                ],
            ],
            'create-review' => [
                'name' => 'create-review',
                'order' => 2,
                'slug' => route('reviews.create'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('Create Review'),
                    'description' => __('Create a Review'),
                ],
            ],
            // 'trash-review' => [
            //     'name' => 'trash-review',
            //     'order' => 3,
            //     'slug' => route('reviews.trash'),
            //     'always_viewable' => false,
            //     'labels' => [
            //         'title' => __('Trashed Reviews'),
            //         'description' => __('View list of all reviews moved to trash'),
            //     ],
            // ],
        ],
    ],
];
