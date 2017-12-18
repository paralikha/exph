<?php

return [
    /**
     * -------------------------------------------------------------------------
     * Billings Menus
     * -------------------------------------------------------------------------
     * Specify here the menus to appear on the sidebar.
     *
     */
    'billing' => [
        'name' => 'billing',
        'order' => 51,
        'slug' => url(config('path.admin').'/billings'),
        'always_viewable' => false,
        'icon' => 'local_grocery_store',
        'labels' => [
            'title' => __('Billings'),
            'description' => __('Manage billings'),
        ],
        'children' => [
            'view-billing' => [
                'name' => 'view-billing',
                'order' => 1,
                'slug' => url(config('path.admin').'/billings'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('All Billings'),
                    'description' => __('View the list of all billings'),
                ],
            ],
            'create-billing' => [
                'name' => 'create-billing',
                'order' => 2,
                'slug' => url(config('path.admin').'/billings/create'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('Create Billing'),
                    'description' => __('Create a Billing'),
                ],
            ],
            'trashed-billing' => [
                'name' => 'trashed-billing',
                'order' => 3,
                'slug' => url(config('path.admin').'/billings/trashed'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('Trashed Billings'),
                    'description' => __('View list of all billings moved to trash'),
                ],
            ],
        ],
    ],
];
