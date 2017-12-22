<?php

return [
    /**
     * -------------------------------------------------------------------------
     * Teams Menus
     * -------------------------------------------------------------------------
     * Specify here the menus to appear on the sidebar.
     *
     */
    'team' => [
        'name' => 'team',
        'order' => 51,
        'slug' => route('teams.index'),
        'always_viewable' => false,
        'icon' => '',
        'labels' => [
            'title' => __('Teams'),
            'description' => __('Manage teams'),
        ],
        'children' => [
            'view-team' => [
                'name' => 'view-team',
                'order' => 1,
                'slug' => route('teams.index'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('All Teams'),
                    'description' => __('View the list of all teams'),
                ],
            ],
            'create-team' => [
                'name' => 'create-team',
                'order' => 2,
                'slug' => route('teams.create'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('Create Team'),
                    'description' => __('Create a Team'),
                ],
            ],
            // 'trash-team' => [
            //     'name' => 'trash-team',
            //     'order' => 3,
            //     'slug' => route('teams.trash'),
            //     'always_viewable' => false,
            //     'labels' => [
            //         'title' => __('Trashed Teams'),
            //         'description' => __('View list of all teams moved to trash'),
            //     ],
            // ],
        ],
    ],
];
