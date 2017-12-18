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
     * Transaction Permissions
     * -------------------------------------------------------------------------
     *
     */
    'view-transaction' => [
        'name' =>  'transactions.index',
        'code' => 'view-transaction',
        'description' => 'Ability to view list of transactions',
        'group' => 'transaction',
    ],
    'show-transaction' => [
        'name' => 'transactions.show',
        'code' => 'show-transaction',
        'description' => 'Ability to show a single transaction',
        'group' => 'transaction',
    ],
    'create-transaction' => [
        'name' => 'transactions.create',
        'code' => 'create-transaction',
        'description' => 'Ability to show the form to create transaction',
        'group' => 'transaction',
    ],
    'store-transaction' => [
        'name' => 'transactions.store',
        'code' => 'store-transaction',
        'description' => 'Ability to save the transaction',
        'group' => 'transaction',
    ],
    'edit-transaction' => [
        'name' => 'transactions.edit',
        'code' => 'edit-transaction',
        'description' => 'Ability to show the form to edit transaction',
        'group' => 'transaction',
    ],
    'update-transaction' => [
        'name' => 'transactions.update',
        'code' => 'update-transaction',
        'description' => 'Ability to update the transaction',
        'group' => 'transaction',
    ],
    'destroy-transaction' => [
        'name' =>  'transactions.destroy',
        'code' => 'destroy-transaction',
        'description' => 'Ability to move the transaction to trash',
        'group' => 'transaction',
    ],
    'delete-transaction' => [
        'name' =>  'transactions.delete',
        'code' => 'delete-transaction',
        'description' => 'Ability to permanently delete the transaction',
        'group' => 'transaction',
    ],
    'trash-transaction' => [
        'name' =>  'transactions.trash',
        'code' => 'trash-transaction',
        'description' => 'Ability to view the list of all trashed transaction',
        'group' => 'transaction',
    ],
    'restore-transaction' => [
        'name' => 'transactions.restore',
        'code' => 'restore-transaction',
        'description' => 'Ability to restore the transaction',
        'group' => 'transaction',
    ],

    // Many
    'destroy-many-transaction' => [
        'name' =>  'transactions.many.destroy',
        'code' => 'destroy-many-transaction',
        'description' => 'Ability to destroy many transactions',
        'group' => 'transaction',
    ],
    'delete-many-transaction' => [
        'name' =>  'transactions.many.delete',
        'code' => 'delete-many-transaction',
        'description' => 'Ability to permanently delete many transactions',
        'group' => 'transaction',
    ],
    'restore-many-transaction' => [
        'name' => 'transactions.many.restore',
        'code' => 'restore-many-transaction',
        'description' => 'Ability to restore many transactions',
        'group' => 'transaction',
    ],

    //
];
