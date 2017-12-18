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
     * Product Permissions
     * -------------------------------------------------------------------------
     *
     */
    'view-product' => [
        'name' =>  'products.index',
        'code' => 'view-product',
        'description' => 'Ability to view list of products',
        'group' => 'product',
    ],
    'show-product' => [
        'name' => 'products.show',
        'code' => 'show-product',
        'description' => 'Ability to show a single product',
        'group' => 'product',
    ],
    'create-product' => [
        'name' => 'products.create',
        'code' => 'create-product',
        'description' => 'Ability to show the form to create product',
        'group' => 'product',
    ],
    'store-product' => [
        'name' => 'products.store',
        'code' => 'store-product',
        'description' => 'Ability to save the product',
        'group' => 'product',
    ],
    'edit-product' => [
        'name' => 'products.edit',
        'code' => 'edit-product',
        'description' => 'Ability to show the form to edit product',
        'group' => 'product',
    ],
    'update-product' => [
        'name' => 'products.update',
        'code' => 'update-product',
        'description' => 'Ability to update the product',
        'group' => 'product',
    ],
    'destroy-product' => [
        'name' =>  'products.destroy',
        'code' => 'destroy-product',
        'description' => 'Ability to move the product to trash',
        'group' => 'product',
    ],
    'delete-product' => [
        'name' =>  'products.delete',
        'code' => 'delete-product',
        'description' => 'Ability to permanently delete the product',
        'group' => 'product',
    ],
    'trash-product' => [
        'name' =>  'products.trash',
        'code' => 'trash-product',
        'description' => 'Ability to view the list of all trashed product',
        'group' => 'product',
    ],
    'restore-product' => [
        'name' => 'products.restore',
        'code' => 'restore-product',
        'description' => 'Ability to restore the product',
        'group' => 'product',
    ],

    // Many
    'destroy-many-product' => [
        'name' =>  'products.many.destroy',
        'code' => 'destroy-many-product',
        'description' => 'Ability to destroy many products',
        'group' => 'product',
    ],
    'delete-many-product' => [
        'name' =>  'products.many.delete',
        'code' => 'delete-many-product',
        'description' => 'Ability to permanently delete many products',
        'group' => 'product',
    ],
    'restore-many-product' => [
        'name' => 'products.many.restore',
        'code' => 'restore-many-product',
        'description' => 'Ability to restore many products',
        'group' => 'product',
    ],

    //
];
