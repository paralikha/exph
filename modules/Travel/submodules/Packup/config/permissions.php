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
     * Packup Permissions
     * -------------------------------------------------------------------------
     *
     */
    'view-packup' => [
        'name' =>  'packups.index',
        'code' => 'view-packup',
        'description' => 'Ability to view list of packups',
        'group' => 'packup',
    ],
    'show-packup' => [
        'name' => 'packups.show',
        'code' => 'show-packup',
        'description' => 'Ability to show a single packup',
        'group' => 'packup',
    ],
    'create-packup' => [
        'name' => 'packups.create',
        'code' => 'create-packup',
        'description' => 'Ability to show the form to create packup',
        'group' => 'packup',
    ],
    'store-packup' => [
        'name' => 'packups.store',
        'code' => 'store-packup',
        'description' => 'Ability to save the packup',
        'group' => 'packup',
    ],
    'edit-packup' => [
        'name' => 'packups.edit',
        'code' => 'edit-packup',
        'description' => 'Ability to show the form to edit packup',
        'group' => 'packup',
    ],
    'update-packup' => [
        'name' => 'packups.update',
        'code' => 'update-packup',
        'description' => 'Ability to update the packup',
        'group' => 'packup',
    ],
    'destroy-packup' => [
        'name' =>  'packups.destroy',
        'code' => 'destroy-packup',
        'description' => 'Ability to move the packup to trash',
        'group' => 'packup',
    ],
    'delete-packup' => [
        'name' =>  'packups.delete',
        'code' => 'delete-packup',
        'description' => 'Ability to permanently delete the packup',
        'group' => 'packup',
    ],
    'trash-packup' => [
        'name' =>  'packups.trash',
        'code' => 'trash-packup',
        'description' => 'Ability to view the list of all trashed packup',
        'group' => 'packup',
    ],
    'restore-packup' => [
        'name' => 'packups.restore',
        'code' => 'restore-packup',
        'description' => 'Ability to restore the packup',
        'group' => 'packup',
    ],

    // Many
    'destroy-many-packup' => [
        'name' =>  'packups.many.destroy',
        'code' => 'destroy-many-packup',
        'description' => 'Ability to destroy many packups',
        'group' => 'packup',
    ],
    'delete-many-packup' => [
        'name' =>  'packups.many.delete',
        'code' => 'delete-many-packup',
        'description' => 'Ability to permanently delete many packups',
        'group' => 'packup',
    ],
    'restore-many-packup' => [
        'name' => 'packups.many.restore',
        'code' => 'restore-many-packup',
        'description' => 'Ability to restore many packups',
        'group' => 'packup',
    ],

    //
];
