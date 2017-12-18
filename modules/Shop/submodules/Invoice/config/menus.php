<?php

return [
    /**
     * -------------------------------------------------------------------------
     * Invoices Menus
     * -------------------------------------------------------------------------
     * Specify here the menus to appear on the sidebar.
     *
     */
    'invoice' => [
        'name' => 'invoice',
        'order' => 51,
        'slug' => route('invoices.index'),
        'always_viewable' => false,
        'icon' => 'credit_card',
        'labels' => [
            'title' => __('Billing'),
            'description' => __('Manage invoices, payment gateways'),
        ],
        'children' => [
            'view-invoice' => [
                'name' => 'view-invoice',
                'order' => 1,
                'slug' => route('invoices.index'),
                'always_viewable' => false,
                'labels' => [
                    'title' => __('Invoices'),
                    'description' => __('View and manage list of all invoices'),
                ],
            ],
        ],
    ],
];
