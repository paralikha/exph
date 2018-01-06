<?php

return [
    /**
     * -------------------------------------------------------------------------
     * Products Menus
     * -------------------------------------------------------------------------
     * Specify here the menus to appear on the sidebar.
     *
     */
    'product' => [
        'name' => 'product',
        'order' => 51,
        'slug' => route('products.index'),
        'always_viewable' => false,
        'icon' => 'fa-glass',
        'labels' => [
            'title' => __('Products'),
            'description' => __('Manage products'),
        ],
        'children' => [
            'view-product' => [
                'name' => 'view-product',
                'order' => 1,
                'slug' => route('products.index'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('All Products'),
                    'description' => __('View the list of all products'),
                ],
            ],
            'create-product' => [
                'name' => 'create-product',
                'order' => 2,
                'slug' => route('products.create'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('New Product'),
                    'description' => __('Create a new Product'),
                ],
            ],
            'trash-product' => [
                'name' => 'trash-product',
                'order' => 3,
                'slug' => route('products.trash'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('Trashed Products'),
                    'description' => __('View list of all products moved to trash'),
                ],
            ],
        ],
    ],
];
