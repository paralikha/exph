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
     * Review Permissions
     * -------------------------------------------------------------------------
     *
     */
    'view-review' => [
        'name' =>  'reviews.index',
        'code' => 'view-review',
        'description' => 'Ability to view list of reviews',
        'group' => 'review',
    ],
    'show-review' => [
        'name' => 'reviews.show',
        'code' => 'show-review',
        'description' => 'Ability to show a single review',
        'group' => 'review',
    ],
    'create-review' => [
        'name' => 'reviews.create',
        'code' => 'create-review',
        'description' => 'Ability to show the form to create review',
        'group' => 'review',
    ],
    'store-review' => [
        'name' => 'reviews.store',
        'code' => 'store-review',
        'description' => 'Ability to save the review',
        'group' => 'review',
    ],
    'edit-review' => [
        'name' => 'reviews.edit',
        'code' => 'edit-review',
        'description' => 'Ability to show the form to edit review',
        'group' => 'review',
    ],
    'update-review' => [
        'name' => 'reviews.update',
        'code' => 'update-review',
        'description' => 'Ability to update the review',
        'group' => 'review',
    ],
    'destroy-review' => [
        'name' =>  'reviews.destroy',
        'code' => 'destroy-review',
        'description' => 'Ability to move the review to trash',
        'group' => 'review',
    ],
    'delete-review' => [
        'name' =>  'reviews.delete',
        'code' => 'delete-review',
        'description' => 'Ability to permanently delete the review',
        'group' => 'review',
    ],
    'trash-review' => [
        'name' =>  'reviews.trash',
        'code' => 'trash-review',
        'description' => 'Ability to view the list of all trashed review',
        'group' => 'review',
    ],
    'restore-review' => [
        'name' => 'reviews.restore',
        'code' => 'restore-review',
        'description' => 'Ability to restore the review',
        'group' => 'review',
    ],

    // Many
    'destroy-many-review' => [
        'name' =>  'reviews.many.destroy',
        'code' => 'destroy-many-review',
        'description' => 'Ability to destroy many reviews',
        'group' => 'review',
    ],
    'delete-many-review' => [
        'name' =>  'reviews.many.delete',
        'code' => 'delete-many-review',
        'description' => 'Ability to permanently delete many reviews',
        'group' => 'review',
    ],
    'restore-many-review' => [
        'name' => 'reviews.many.restore',
        'code' => 'restore-many-review',
        'description' => 'Ability to restore many reviews',
        'group' => 'review',
    ],

    //
];
