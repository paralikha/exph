<?php

return [
    /**
     * -------------------------------------------------------------------------
     * Bookings Menus
     * -------------------------------------------------------------------------
     * Specify here the menus to appear on the sidebar.
     *
     */
    'booking' => [
        'name' => 'booking',
        'order' => 51,
        'slug' => route('bookings.index'),
        'always_viewable' => false,
        'icon' => 'shopping_basket',
        'labels' => [
            'title' => __('Bookings'),
            'description' => __('Manage bookings'),
        ],
        'children' => [
            'view-booking' => [
                'name' => 'view-booking',
                'order' => 1,
                'slug' => route('bookings.index'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('All Bookings'),
                    'description' => __('View the list of all bookings'),
                ],
            ],
            'create-booking' => [
                'name' => 'create-booking',
                'order' => 2,
                'slug' => route('bookings.create'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('Create Booking'),
                    'description' => __('Create a Booking'),
                ],
            ],
            // 'trash-booking' => [
            //     'name' => 'trash-booking',
            //     'order' => 3,
            //     'slug' => route('bookings.trash'),
            //     'always_viewable' => false,
            //     'labels' => [
            //         'title' => __('Trashed Bookings'),
            //         'description' => __('View list of all bookings moved to trash'),
            //     ],
            // ],
        ],
    ],
];
