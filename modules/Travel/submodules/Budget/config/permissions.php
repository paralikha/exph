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
     * Budget Permissions
     * -------------------------------------------------------------------------
     *
     */
    'view-budget' => [
        'name' =>  'budgets.index',
        'code' => 'view-budget',
        'description' => 'Ability to view list of budgets',
        'group' => 'budget',
    ],
    'show-budget' => [
        'name' => 'budgets.show',
        'code' => 'show-budget',
        'description' => 'Ability to show a single budget',
        'group' => 'budget',
    ],
    'create-budget' => [
        'name' => 'budgets.create',
        'code' => 'create-budget',
        'description' => 'Ability to show the form to create budget',
        'group' => 'budget',
    ],
    'store-budget' => [
        'name' => 'budgets.store',
        'code' => 'store-budget',
        'description' => 'Ability to save the budget',
        'group' => 'budget',
    ],
    'edit-budget' => [
        'name' => 'budgets.edit',
        'code' => 'edit-budget',
        'description' => 'Ability to show the form to edit budget',
        'group' => 'budget',
    ],
    'update-budget' => [
        'name' => 'budgets.update',
        'code' => 'update-budget',
        'description' => 'Ability to update the budget',
        'group' => 'budget',
    ],
    'destroy-budget' => [
        'name' =>  'budgets.destroy',
        'code' => 'destroy-budget',
        'description' => 'Ability to move the budget to trash',
        'group' => 'budget',
    ],
    'delete-budget' => [
        'name' =>  'budgets.delete',
        'code' => 'delete-budget',
        'description' => 'Ability to permanently delete the budget',
        'group' => 'budget',
    ],
    'trash-budget' => [
        'name' =>  'budgets.trash',
        'code' => 'trash-budget',
        'description' => 'Ability to view the list of all trashed budget',
        'group' => 'budget',
    ],
    'restore-budget' => [
        'name' => 'budgets.restore',
        'code' => 'restore-budget',
        'description' => 'Ability to restore the budget',
        'group' => 'budget',
    ],

    // Many
    'destroy-many-budget' => [
        'name' =>  'budgets.many.destroy',
        'code' => 'destroy-many-budget',
        'description' => 'Ability to destroy many budgets',
        'group' => 'budget',
    ],
    'delete-many-budget' => [
        'name' =>  'budgets.many.delete',
        'code' => 'delete-many-budget',
        'description' => 'Ability to permanently delete many budgets',
        'group' => 'budget',
    ],
    'restore-many-budget' => [
        'name' => 'budgets.many.restore',
        'code' => 'restore-many-budget',
        'description' => 'Ability to restore many budgets',
        'group' => 'budget',
    ],

    //
];
