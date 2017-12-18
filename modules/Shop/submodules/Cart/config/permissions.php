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
     * Cart Permissions
     * -------------------------------------------------------------------------
     *
     */
    'view-cart' => [
        'name' =>  'carts.index',
        'code' => 'view-cart',
        'description' => 'Ability to view list of carts',
        'group' => 'cart',
    ],
    'show-cart' => [
        'name' => 'carts.show',
        'code' => 'show-cart',
        'description' => 'Ability to show a single cart',
        'group' => 'cart',
    ],
    'create-cart' => [
        'name' => 'carts.create',
        'code' => 'create-cart',
        'description' => 'Ability to show the form to create cart',
        'group' => 'cart',
    ],
    'store-cart' => [
        'name' => 'carts.store',
        'code' => 'store-cart',
        'description' => 'Ability to save the cart',
        'group' => 'cart',
    ],
    'edit-cart' => [
        'name' => 'carts.edit',
        'code' => 'edit-cart',
        'description' => 'Ability to show the form to edit cart',
        'group' => 'cart',
    ],
    'update-cart' => [
        'name' => 'carts.update',
        'code' => 'update-cart',
        'description' => 'Ability to update the cart',
        'group' => 'cart',
    ],
    'destroy-cart' => [
        'name' =>  'carts.destroy',
        'code' => 'destroy-cart',
        'description' => 'Ability to move the cart to trash',
        'group' => 'cart',
    ],
    'delete-cart' => [
        'name' =>  'carts.delete',
        'code' => 'delete-cart',
        'description' => 'Ability to permanently delete the cart',
        'group' => 'cart',
    ],
    'trash-cart' => [
        'name' =>  'carts.trash',
        'code' => 'trash-cart',
        'description' => 'Ability to view the list of all trashed cart',
        'group' => 'cart',
    ],
    'restore-cart' => [
        'name' => 'carts.restore',
        'code' => 'restore-cart',
        'description' => 'Ability to restore the cart',
        'group' => 'cart',
    ],

    // Many
    'destroy-many-cart' => [
        'name' =>  'carts.many.destroy',
        'code' => 'destroy-many-cart',
        'description' => 'Ability to destroy many carts',
        'group' => 'cart',
    ],
    'delete-many-cart' => [
        'name' =>  'carts.many.delete',
        'code' => 'delete-many-cart',
        'description' => 'Ability to permanently delete many carts',
        'group' => 'cart',
    ],
    'restore-many-cart' => [
        'name' => 'carts.many.restore',
        'code' => 'restore-many-cart',
        'description' => 'Ability to restore many carts',
        'group' => 'cart',
    ],

    //
];
