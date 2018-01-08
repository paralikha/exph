<?php

return [
    /**
     * -------------------------------------------------------------------------
     * Customers Menus
     * -------------------------------------------------------------------------
     * Specify here the menus to appear on the sidebar.
     *
     */
    'customer' => [
        'name' => 'customer',
        'order' => 51,
        'slug' => route('customers.index'),
        'always_viewable' => false,
<<<<<<< HEAD
        'icon' => 'perm_identity',
=======
        'icon' => '',
>>>>>>> master
        'labels' => [
            'title' => __('Customers'),
            'description' => __('Manage customers'),
        ],
        'children' => [
            'view-customer' => [
                'name' => 'view-customer',
                'order' => 1,
                'slug' => route('customers.index'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('All Customers'),
                    'description' => __('View the list of all customers'),
                ],
            ],
            'create-customer' => [
                'name' => 'create-customer',
                'order' => 2,
                'slug' => route('customers.create'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('Create Customer'),
                    'description' => __('Create a Customer'),
                ],
            ],
            // 'trash-customer' => [
            //     'name' => 'trash-customer',
            //     'order' => 3,
            //     'slug' => route('customers.trash'),
            //     'always_viewable' => false,
            //     'labels' => [
            //         'title' => __('Trashed Customers'),
            //         'description' => __('View list of all customers moved to trash'),
            //     ],
            // ],
        ],
    ],
];
