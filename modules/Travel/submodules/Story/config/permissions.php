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
     * Story Permissions
     * -------------------------------------------------------------------------
     *
     */
    'view-story' => [
        'name' =>  'stories.index',
        'code' => 'view-story',
        'description' => 'Ability to view list of stories',
        'group' => 'story',
    ],
    'show-story' => [
        'name' => 'stories.show',
        'code' => 'show-story',
        'description' => 'Ability to show a single story',
        'group' => 'story',
    ],
    'create-story' => [
        'name' => 'stories.create',
        'code' => 'create-story',
        'description' => 'Ability to show the form to create story',
        'group' => 'story',
    ],
    'store-story' => [
        'name' => 'stories.store',
        'code' => 'store-story',
        'description' => 'Ability to save the story',
        'group' => 'story',
    ],
    'edit-story' => [
        'name' => 'stories.edit',
        'code' => 'edit-story',
        'description' => 'Ability to show the form to edit story',
        'group' => 'story',
    ],
    'update-story' => [
        'name' => 'stories.update',
        'code' => 'update-story',
        'description' => 'Ability to update the story',
        'group' => 'story',
    ],
    'destroy-story' => [
        'name' =>  'stories.destroy',
        'code' => 'destroy-story',
        'description' => 'Ability to move the story to trash',
        'group' => 'story',
    ],
    'delete-story' => [
        'name' =>  'stories.delete',
        'code' => 'delete-story',
        'description' => 'Ability to permanently delete the story',
        'group' => 'story',
    ],
    'trash-story' => [
        'name' =>  'stories.trash',
        'code' => 'trash-story',
        'description' => 'Ability to view the list of all trashed story',
        'group' => 'story',
    ],
    'restore-story' => [
        'name' => 'stories.restore',
        'code' => 'restore-story',
        'description' => 'Ability to restore the story',
        'group' => 'story',
    ],

    // Many
    'destroy-many-story' => [
        'name' =>  'stories.many.destroy',
        'code' => 'destroy-many-story',
        'description' => 'Ability to destroy many stories',
        'group' => 'story',
    ],
    'delete-many-story' => [
        'name' =>  'stories.many.delete',
        'code' => 'delete-many-story',
        'description' => 'Ability to permanently delete many stories',
        'group' => 'story',
    ],
    'restore-many-story' => [
        'name' => 'stories.many.restore',
        'code' => 'restore-many-story',
        'description' => 'Ability to restore many stories',
        'group' => 'story',
    ],

    //
];
