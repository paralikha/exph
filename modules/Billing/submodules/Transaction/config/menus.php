<?php

return [
    /**
     * -------------------------------------------------------------------------
     * Transactions Menus
     * -------------------------------------------------------------------------
     * Specify here the menus to appear on the sidebar.
     *
     */
    'transaction' => [
        'name' => 'transaction',
        'order' => 51,
        'slug' => url(config('path.admin').'/transactions'),
        'always_viewable' => false,
        'icon' => 'credit_card',
        'labels' => [
            'title' => __('Transactions'),
            'description' => __('Manage transactions'),
        ],
        'children' => [
            'view-transaction' => [
                'name' => 'view-transaction',
                'order' => 1,
                'slug' => url(config('path.admin').'/transactions'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('All Transactions'),
                    'description' => __('View the list of all transactions'),
                ],
            ],
            'create-transaction' => [
                'name' => 'create-transaction',
                'order' => 2,
                'slug' => url(config('path.admin').'/transactions/create'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('Create Transaction'),
                    'description' => __('Create a Transaction'),
                ],
            ],
            'trashed-transaction' => [
                'name' => 'trashed-transaction',
                'order' => 3,
                'slug' => url(config('path.admin').'/transactions/trashed'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('Trashed Transactions'),
                    'description' => __('View list of all transactions moved to trash'),
                ],
            ],
        ],
    ],
];
