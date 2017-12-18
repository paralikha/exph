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
     * Billing Permissions
     * -------------------------------------------------------------------------
     *
     */
    'view-billing' => [
        'name' =>  'billings.index',
        'code' => 'view-billing',
        'description' => 'Ability to view list of billings',
        'group' => 'billing',
    ],
    'show-billing' => [
        'name' => 'billings.show',
        'code' => 'show-billing',
        'description' => 'Ability to show a single billing',
        'group' => 'billing',
    ],
    'create-billing' => [
        'name' => 'billings.create',
        'code' => 'create-billing',
        'description' => 'Ability to show the form to create billing',
        'group' => 'billing',
    ],
    'store-billing' => [
        'name' => 'billings.store',
        'code' => 'store-billing',
        'description' => 'Ability to save the billing',
        'group' => 'billing',
    ],
    'edit-billing' => [
        'name' => 'billings.edit',
        'code' => 'edit-billing',
        'description' => 'Ability to show the form to edit billing',
        'group' => 'billing',
    ],
    'update-billing' => [
        'name' => 'billings.update',
        'code' => 'update-billing',
        'description' => 'Ability to update the billing',
        'group' => 'billing',
    ],
    'destroy-billing' => [
        'name' =>  'billings.destroy',
        'code' => 'destroy-billing',
        'description' => 'Ability to move the billing to trash',
        'group' => 'billing',
    ],
    'delete-billing' => [
        'name' =>  'billings.delete',
        'code' => 'delete-billing',
        'description' => 'Ability to permanently delete the billing',
        'group' => 'billing',
    ],
    'trash-billing' => [
        'name' =>  'billings.trash',
        'code' => 'trash-billing',
        'description' => 'Ability to view the list of all trashed billing',
        'group' => 'billing',
    ],
    'restore-billing' => [
        'name' => 'billings.restore',
        'code' => 'restore-billing',
        'description' => 'Ability to restore the billing',
        'group' => 'billing',
    ],

    // Many
    'destroy-many-billing' => [
        'name' =>  'billings.many.destroy',
        'code' => 'destroy-many-billing',
        'description' => 'Ability to destroy many billings',
        'group' => 'billing',
    ],
    'delete-many-billing' => [
        'name' =>  'billings.many.delete',
        'code' => 'delete-many-billing',
        'description' => 'Ability to permanently delete many billings',
        'group' => 'billing',
    ],
    'restore-many-billing' => [
        'name' => 'billings.many.restore',
        'code' => 'restore-many-billing',
        'description' => 'Ability to restore many billings',
        'group' => 'billing',
    ],

    //
];
