<?php

return [
    /**
     * -------------------------------------------------------------------------
     * Experiences Menus
     * -------------------------------------------------------------------------
     * Specify here the menus to appear on the sidebar.
     *
     */
    'experience' => [
        'name' => 'experience',
        'order' => 51,
        'slug' => url(config('path.admin').'/experiences'),
        'always_viewable' => false,
        'icon' => 'place',
        'labels' => [
            'title' => __('Experiences'),
            'description' => __('Manage experiences'),
        ],
        'children' => [
            'view-experience' => [
                'name' => 'view-experience',
                'order' => 1,
                'slug' => url(config('path.admin').'/experiences'),
                'always_viewable' => false,
                'routes' => [
                    'name' => 'experiences.index',
                    'children' => [
                        'experiences.edit',
                        'experiences.show',
                    ]
                ],
                'labels' => [
                    'title' => __('All Experiences'),
                    'description' => __('View the list of all experiences'),
                ],
            ],
            'create-experience' => [
                'name' => 'create-experience',
                'order' => 2,
                'slug' => url(config('path.admin').'/experiences/create'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('Create Experience'),
                    'description' => __('Create a Experience'),
                ],
            ],
            'trashed-experience' => [
                'name' => 'trashed-experience',
                'order' => 3,
                'slug' => url(config('path.admin').'/experiences/trashed'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('Trashed Experiences'),
                    'description' => __('View list of all experiences moved to trash'),
                ],
            ],

            'divider-expereince' => [
                'name' => 'divider-experience',
                'is_header' => true,
                'is_divider' => true,
                'parent' => 'library',
                'order' => 9,
            ],

            'view-experience-categories' => [
                'name' => 'view-experience-categories',
                'order' => 10,
                'slug' => route('experiences.categories.index'),
                'always_viewable' => false,
                'icon' => 'label',
                'parent' => 'experience',
                'routes' => [
                    'name' => 'categories.index',
                    'children' => [
                        'categories.create',
                        'categories.edit',
                        'categories.show',
                        'categories.trash',
                    ]
                ],
                'labels' => [
                    'title' => __('Categories'),
                    'description' => __("Manage all Experience's categories"),
                ],
            ],

            'view-amenities' => [
                'name' => 'view-amenities',
                'order' => 10,
                'slug' => route('amenities.index'),
                'always_viewable' => false,
                'icon' => 'fa-paperclip',
                'parent' => 'experience',
                'routes' => [
                    'name' => 'amenities.index',
                    'children' => [
                        'amenities.create',
                        'amenities.edit',
                        'amenities.show',
                        'amenities.trash',
                    ]
                ],
                'labels' => [
                    'title' => __('Amenities'),
                    'description' => __("Manage all Experience's amenities"),
                ],
            ],
        ],
    ],
];
