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
     * Cashier Permissions
     * -------------------------------------------------------------------------
     *
     */
    'view-cashier' => [
        'name' =>  'cashiers.index',
        'code' => 'view-cashier',
        'description' => 'Ability to view list of cashiers',
        'group' => 'cashier',
    ],
    'show-cashier' => [
        'name' => 'cashiers.show',
        'code' => 'show-cashier',
        'description' => 'Ability to show a single cashier',
        'group' => 'cashier',
    ],
    'create-cashier' => [
        'name' => 'cashiers.create',
        'code' => 'create-cashier',
        'description' => 'Ability to show the form to create cashier',
        'group' => 'cashier',
    ],
    'store-cashier' => [
        'name' => 'cashiers.store',
        'code' => 'store-cashier',
        'description' => 'Ability to save the cashier',
        'group' => 'cashier',
    ],
    'edit-cashier' => [
        'name' => 'cashiers.edit',
        'code' => 'edit-cashier',
        'description' => 'Ability to show the form to edit cashier',
        'group' => 'cashier',
    ],
    'update-cashier' => [
        'name' => 'cashiers.update',
        'code' => 'update-cashier',
        'description' => 'Ability to update the cashier',
        'group' => 'cashier',
    ],
    'destroy-cashier' => [
        'name' =>  'cashiers.destroy',
        'code' => 'destroy-cashier',
        'description' => 'Ability to move the cashier to trash',
        'group' => 'cashier',
    ],
    'delete-cashier' => [
        'name' =>  'cashiers.delete',
        'code' => 'delete-cashier',
        'description' => 'Ability to permanently delete the cashier',
        'group' => 'cashier',
    ],
    'trash-cashier' => [
        'name' =>  'cashiers.trash',
        'code' => 'trash-cashier',
        'description' => 'Ability to view the list of all trashed cashier',
        'group' => 'cashier',
    ],
    'restore-cashier' => [
        'name' => 'cashiers.restore',
        'code' => 'restore-cashier',
        'description' => 'Ability to restore the cashier',
        'group' => 'cashier',
    ],

    // Many
    'destroy-many-cashier' => [
        'name' =>  'cashiers.many.destroy',
        'code' => 'destroy-many-cashier',
        'description' => 'Ability to destroy many cashiers',
        'group' => 'cashier',
    ],
    'delete-many-cashier' => [
        'name' =>  'cashiers.many.delete',
        'code' => 'delete-many-cashier',
        'description' => 'Ability to permanently delete many cashiers',
        'group' => 'cashier',
    ],
    'restore-many-cashier' => [
        'name' => 'cashiers.many.restore',
        'code' => 'restore-many-cashier',
        'description' => 'Ability to restore many cashiers',
        'group' => 'cashier',
    ],

    //
];
