<?php

return [
    /**
     * -------------------------------------------------------------------------
     * Orders Menus
     * -------------------------------------------------------------------------
     * Specify here the menus to appear on the sidebar.
     *
     */
    'order' => [
        'name' => 'order',
        'order' => 51,
        'slug' => route('orders.index'),
        'always_viewable' => false,
        'icon' => 'shopping_cart',
        'labels' => [
            'title' => __('Orders'),
            'description' => __('Manage orders'),
        ],
        'children' => [
            'view-order' => [
                'name' => 'view-order',
                'order' => 1,
                'slug' => route('orders.index'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('All Orders'),
                    'description' => __('View the list of all orders'),
                ],
            ],
            'create-order' => [
                'name' => 'create-order',
                'order' => 2,
                'slug' => route('orders.create'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('Create Order'),
                    'description' => __('Create a Order'),
                ],
            ],
            // 'trash-order' => [
            //     'name' => 'trash-order',
            //     'order' => 3,
            //     'slug' => route('orders.trash'),
            //     'always_viewable' => false,
            //     'labels' => [
            //         'title' => __('Trashed Orders'),
            //         'description' => __('View list of all orders moved to trash'),
            //     ],
            // ],
        ],
    ],
];
