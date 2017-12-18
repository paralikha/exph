<?php

return [
    /**
     * -------------------------------------------------------------------------
     * Budgets Menus
     * -------------------------------------------------------------------------
     * Specify here the menus to appear on the sidebar.
     *
     */
    'budget' => [
        'name' => 'budget',
        'order' => 51,
        'slug' => url(config('path.admin').'/budgets'),
        'always_viewable' => false,
        'icon' => 'attach_money',
        'labels' => [
            'title' => __('Budgets'),
            'description' => __('Manage budgets'),
        ],
        'children' => [
            'view-budget' => [
                'name' => 'view-budget',
                'order' => 1,
                'slug' => url(config('path.admin').'/budgets'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('All Budgets'),
                    'description' => __('View the list of all budgets'),
                ],
            ],
            'create-budget' => [
                'name' => 'create-budget',
                'order' => 2,
                'slug' => url(config('path.admin').'/budgets/create'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('Create Budget'),
                    'description' => __('Create a Budget'),
                ],
            ],
            'trashed-budget' => [
                'name' => 'trashed-budget',
                'order' => 3,
                'slug' => url(config('path.admin').'/budgets/trashed'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('Trashed Budgets'),
                    'description' => __('View list of all budgets moved to trash'),
                ],
            ],
        ],
    ],
];
