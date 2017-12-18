<?php
/**
 * -----------------------------------------------------------------------------
 * Permissions Array
 * -----------------------------------------------------------------------------
 *
 * Here we define our permissions that you can attach to roles.
 *
 * These permissions corresponds to a counterpart
 * route (found in <this module>/routes/<route-files>.php).
 * All permissionable routes should have a `name` (e.g. 'roles.store')
 * for the role authentication middleware to work.
 *
 */
return [
    /**
     * -------------------------------------------------------------------------
     * Invoice Permissions
     * -------------------------------------------------------------------------
     *
     */
    'view-invoice' => [
        'name' =>  'invoices.index',
        'code' => 'view-invoice',
        'description' => 'Ability to view list of invoices',
        'group' => 'invoice',
    ],
    'show-invoice' => [
        'name' => 'invoices.show',
        'code' => 'show-invoice',
        'description' => 'Ability to show a single invoice',
        'group' => 'invoice',
    ],
    'create-invoice' => [
        'name' => 'invoices.create',
        'code' => 'create-invoice',
        'description' => 'Ability to show the form to create invoice',
        'group' => 'invoice',
    ],
    'store-invoice' => [
        'name' => 'invoices.store',
        'code' => 'store-invoice',
        'description' => 'Ability to save the invoice',
        'group' => 'invoice',
    ],
    'edit-invoice' => [
        'name' => 'invoices.edit',
        'code' => 'edit-invoice',
        'description' => 'Ability to show the form to edit invoice',
        'group' => 'invoice',
    ],
    'update-invoice' => [
        'name' => 'invoices.update',
        'code' => 'update-invoice',
        'description' => 'Ability to update the invoice',
        'group' => 'invoice',
    ],
    'destroy-invoice' => [
        'name' =>  'invoices.destroy',
        'code' => 'destroy-invoice',
        'description' => 'Ability to move the invoice to trash',
        'group' => 'invoice',
    ],
    'delete-invoice' => [
        'name' =>  'invoices.delete',
        'code' => 'delete-invoice',
        'description' => 'Ability to permanently delete the invoice',
        'group' => 'invoice',
    ],
    'trash-invoice' => [
        'name' =>  'invoices.trash',
        'code' => 'trash-invoice',
        'description' => 'Ability to view the list of all trashed invoice',
        'group' => 'invoice',
    ],
    'restore-invoice' => [
        'name' => 'invoices.restore',
        'code' => 'restore-invoice',
        'description' => 'Ability to restore the invoice',
        'group' => 'invoice',
    ],

    // Many
    'destroy-many-invoice' => [
        'name' =>  'invoices.many.destroy',
        'code' => 'destroy-many-invoice',
        'description' => 'Ability to destroy many invoices',
        'group' => 'invoice',
    ],
    'delete-many-invoice' => [
        'name' =>  'invoices.many.delete',
        'code' => 'delete-many-invoice',
        'description' => 'Ability to permanently delete many invoices',
        'group' => 'invoice',
    ],
    'restore-many-invoice' => [
        'name' => 'invoices.many.restore',
        'code' => 'restore-many-invoice',
        'description' => 'Ability to restore many invoices',
        'group' => 'invoice',
    ],

    //
];
