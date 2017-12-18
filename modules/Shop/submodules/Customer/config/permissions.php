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
     * Customer Permissions
     * -------------------------------------------------------------------------
     *
     */
    'view-customer' => [
        'name' =>  'customers.index',
        'code' => 'view-customer',
        'description' => 'Ability to view list of customers',
        'group' => 'customer',
    ],
    'show-customer' => [
        'name' => 'customers.show',
        'code' => 'show-customer',
        'description' => 'Ability to show a single customer',
        'group' => 'customer',
    ],
    'create-customer' => [
        'name' => 'customers.create',
        'code' => 'create-customer',
        'description' => 'Ability to show the form to create customer',
        'group' => 'customer',
    ],
    'store-customer' => [
        'name' => 'customers.store',
        'code' => 'store-customer',
        'description' => 'Ability to save the customer',
        'group' => 'customer',
    ],
    'edit-customer' => [
        'name' => 'customers.edit',
        'code' => 'edit-customer',
        'description' => 'Ability to show the form to edit customer',
        'group' => 'customer',
    ],
    'update-customer' => [
        'name' => 'customers.update',
        'code' => 'update-customer',
        'description' => 'Ability to update the customer',
        'group' => 'customer',
    ],
    'destroy-customer' => [
        'name' =>  'customers.destroy',
        'code' => 'destroy-customer',
        'description' => 'Ability to move the customer to trash',
        'group' => 'customer',
    ],
    'delete-customer' => [
        'name' =>  'customers.delete',
        'code' => 'delete-customer',
        'description' => 'Ability to permanently delete the customer',
        'group' => 'customer',
    ],
    'trash-customer' => [
        'name' =>  'customers.trash',
        'code' => 'trash-customer',
        'description' => 'Ability to view the list of all trashed customer',
        'group' => 'customer',
    ],
    'restore-customer' => [
        'name' => 'customers.restore',
        'code' => 'restore-customer',
        'description' => 'Ability to restore the customer',
        'group' => 'customer',
    ],

    // Many
    'destroy-many-customer' => [
        'name' =>  'customers.many.destroy',
        'code' => 'destroy-many-customer',
        'description' => 'Ability to destroy many customers',
        'group' => 'customer',
    ],
    'delete-many-customer' => [
        'name' =>  'customers.many.delete',
        'code' => 'delete-many-customer',
        'description' => 'Ability to permanently delete many customers',
        'group' => 'customer',
    ],
    'restore-many-customer' => [
        'name' => 'customers.many.restore',
        'code' => 'restore-many-customer',
        'description' => 'Ability to restore many customers',
        'group' => 'customer',
    ],

    //
];
