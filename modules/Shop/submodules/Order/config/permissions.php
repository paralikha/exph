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
     * Order Permissions
     * -------------------------------------------------------------------------
     *
     */
    'view-order' => [
        'name' =>  'orders.index',
        'code' => 'view-order',
        'description' => 'Ability to view list of orders',
        'group' => 'order',
    ],
    'show-order' => [
        'name' => 'orders.show',
        'code' => 'show-order',
        'description' => 'Ability to show a single order',
        'group' => 'order',
    ],
    'create-order' => [
        'name' => 'orders.create',
        'code' => 'create-order',
        'description' => 'Ability to show the form to create order',
        'group' => 'order',
    ],
    'store-order' => [
        'name' => 'orders.store',
        'code' => 'store-order',
        'description' => 'Ability to save the order',
        'group' => 'order',
    ],
    'edit-order' => [
        'name' => 'orders.edit',
        'code' => 'edit-order',
        'description' => 'Ability to show the form to edit order',
        'group' => 'order',
    ],
    'update-order' => [
        'name' => 'orders.update',
        'code' => 'update-order',
        'description' => 'Ability to update the order',
        'group' => 'order',
    ],
    'destroy-order' => [
        'name' =>  'orders.destroy',
        'code' => 'destroy-order',
        'description' => 'Ability to move the order to trash',
        'group' => 'order',
    ],
    'delete-order' => [
        'name' =>  'orders.delete',
        'code' => 'delete-order',
        'description' => 'Ability to permanently delete the order',
        'group' => 'order',
    ],
    'trash-order' => [
        'name' =>  'orders.trash',
        'code' => 'trash-order',
        'description' => 'Ability to view the list of all trashed order',
        'group' => 'order',
    ],
    'restore-order' => [
        'name' => 'orders.restore',
        'code' => 'restore-order',
        'description' => 'Ability to restore the order',
        'group' => 'order',
    ],

    // Many
    'destroy-many-order' => [
        'name' =>  'orders.many.destroy',
        'code' => 'destroy-many-order',
        'description' => 'Ability to destroy many orders',
        'group' => 'order',
    ],
    'delete-many-order' => [
        'name' =>  'orders.many.delete',
        'code' => 'delete-many-order',
        'description' => 'Ability to permanently delete many orders',
        'group' => 'order',
    ],
    'restore-many-order' => [
        'name' => 'orders.many.restore',
        'code' => 'restore-many-order',
        'description' => 'Ability to restore many orders',
        'group' => 'order',
    ],

    //
];
