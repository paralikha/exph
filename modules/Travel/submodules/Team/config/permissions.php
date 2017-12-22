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
     * Team Permissions
     * -------------------------------------------------------------------------
     *
     */
    'view-team' => [
        'name' =>  'teams.index',
        'code' => 'view-team',
        'description' => 'Ability to view list of teams',
        'group' => 'team',
    ],
    'show-team' => [
        'name' => 'teams.show',
        'code' => 'show-team',
        'description' => 'Ability to show a single team',
        'group' => 'team',
    ],
    'create-team' => [
        'name' => 'teams.create',
        'code' => 'create-team',
        'description' => 'Ability to show the form to create team',
        'group' => 'team',
    ],
    'store-team' => [
        'name' => 'teams.store',
        'code' => 'store-team',
        'description' => 'Ability to save the team',
        'group' => 'team',
    ],
    'edit-team' => [
        'name' => 'teams.edit',
        'code' => 'edit-team',
        'description' => 'Ability to show the form to edit team',
        'group' => 'team',
    ],
    'update-team' => [
        'name' => 'teams.update',
        'code' => 'update-team',
        'description' => 'Ability to update the team',
        'group' => 'team',
    ],
    'destroy-team' => [
        'name' =>  'teams.destroy',
        'code' => 'destroy-team',
        'description' => 'Ability to move the team to trash',
        'group' => 'team',
    ],
    'delete-team' => [
        'name' =>  'teams.delete',
        'code' => 'delete-team',
        'description' => 'Ability to permanently delete the team',
        'group' => 'team',
    ],
    'trash-team' => [
        'name' =>  'teams.trash',
        'code' => 'trash-team',
        'description' => 'Ability to view the list of all trashed team',
        'group' => 'team',
    ],
    'restore-team' => [
        'name' => 'teams.restore',
        'code' => 'restore-team',
        'description' => 'Ability to restore the team',
        'group' => 'team',
    ],

    // Many
    'destroy-many-team' => [
        'name' =>  'teams.many.destroy',
        'code' => 'destroy-many-team',
        'description' => 'Ability to destroy many teams',
        'group' => 'team',
    ],
    'delete-many-team' => [
        'name' =>  'teams.many.delete',
        'code' => 'delete-many-team',
        'description' => 'Ability to permanently delete many teams',
        'group' => 'team',
    ],
    'restore-many-team' => [
        'name' => 'teams.many.restore',
        'code' => 'restore-many-team',
        'description' => 'Ability to restore many teams',
        'group' => 'team',
    ],

    //
];
