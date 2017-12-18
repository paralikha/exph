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
     * Roadtrip Permissions
     * -------------------------------------------------------------------------
     *
     */
    'view-roadtrip' => [
        'name' =>  'roadtrips.index',
        'code' => 'view-roadtrip',
        'description' => 'Ability to view list of roadtrips',
        'group' => 'roadtrip',
    ],
    'show-roadtrip' => [
        'name' => 'roadtrips.show',
        'code' => 'show-roadtrip',
        'description' => 'Ability to show a single roadtrip',
        'group' => 'roadtrip',
    ],
    'create-roadtrip' => [
        'name' => 'roadtrips.create',
        'code' => 'create-roadtrip',
        'description' => 'Ability to show the form to create roadtrip',
        'group' => 'roadtrip',
    ],
    'store-roadtrip' => [
        'name' => 'roadtrips.store',
        'code' => 'store-roadtrip',
        'description' => 'Ability to save the roadtrip',
        'group' => 'roadtrip',
    ],
    'edit-roadtrip' => [
        'name' => 'roadtrips.edit',
        'code' => 'edit-roadtrip',
        'description' => 'Ability to show the form to edit roadtrip',
        'group' => 'roadtrip',
    ],
    'update-roadtrip' => [
        'name' => 'roadtrips.update',
        'code' => 'update-roadtrip',
        'description' => 'Ability to update the roadtrip',
        'group' => 'roadtrip',
    ],
    'destroy-roadtrip' => [
        'name' =>  'roadtrips.destroy',
        'code' => 'destroy-roadtrip',
        'description' => 'Ability to move the roadtrip to trash',
        'group' => 'roadtrip',
    ],
    'delete-roadtrip' => [
        'name' =>  'roadtrips.delete',
        'code' => 'delete-roadtrip',
        'description' => 'Ability to permanently delete the roadtrip',
        'group' => 'roadtrip',
    ],
    'trash-roadtrip' => [
        'name' =>  'roadtrips.trash',
        'code' => 'trash-roadtrip',
        'description' => 'Ability to view the list of all trashed roadtrip',
        'group' => 'roadtrip',
    ],
    'restore-roadtrip' => [
        'name' => 'roadtrips.restore',
        'code' => 'restore-roadtrip',
        'description' => 'Ability to restore the roadtrip',
        'group' => 'roadtrip',
    ],

    // Many
    'destroy-many-roadtrip' => [
        'name' =>  'roadtrips.many.destroy',
        'code' => 'destroy-many-roadtrip',
        'description' => 'Ability to destroy many roadtrips',
        'group' => 'roadtrip',
    ],
    'delete-many-roadtrip' => [
        'name' =>  'roadtrips.many.delete',
        'code' => 'delete-many-roadtrip',
        'description' => 'Ability to permanently delete many roadtrips',
        'group' => 'roadtrip',
    ],
    'restore-many-roadtrip' => [
        'name' => 'roadtrips.many.restore',
        'code' => 'restore-many-roadtrip',
        'description' => 'Ability to restore many roadtrips',
        'group' => 'roadtrip',
    ],

    //
];
