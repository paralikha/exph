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
     * Experience Permissions
     * -------------------------------------------------------------------------
     *
     */
    'view-experience' => [
        'name' =>  'experiences.index',
        'code' => 'view-experience',
        'description' => 'Ability to view list of experiences',
        'group' => 'experience',
    ],
    'show-experience' => [
        'name' => 'experiences.show',
        'code' => 'show-experience',
        'description' => 'Ability to show a single experience',
        'group' => 'experience',
    ],
    'create-experience' => [
        'name' => 'experiences.create',
        'code' => 'create-experience',
        'description' => 'Ability to show the form to create experience',
        'group' => 'experience',
    ],
    'store-experience' => [
        'name' => 'experiences.store',
        'code' => 'store-experience',
        'description' => 'Ability to save the experience',
        'group' => 'experience',
    ],
    'edit-experience' => [
        'name' => 'experiences.edit',
        'code' => 'edit-experience',
        'description' => 'Ability to show the form to edit experience',
        'group' => 'experience',
    ],
    'update-experience' => [
        'name' => 'experiences.update',
        'code' => 'update-experience',
        'description' => 'Ability to update the experience',
        'group' => 'experience',
    ],
    'destroy-experience' => [
        'name' =>  'experiences.destroy',
        'code' => 'destroy-experience',
        'description' => 'Ability to move the experience to trash',
        'group' => 'experience',
    ],
    'delete-experience' => [
        'name' =>  'experiences.delete',
        'code' => 'delete-experience',
        'description' => 'Ability to permanently delete the experience',
        'group' => 'experience',
    ],
    'trash-experience' => [
        'name' =>  'experiences.trash',
        'code' => 'trash-experience',
        'description' => 'Ability to view the list of all trashed experience',
        'group' => 'experience',
    ],
    'restore-experience' => [
        'name' => 'experiences.restore',
        'code' => 'restore-experience',
        'description' => 'Ability to restore the experience',
        'group' => 'experience',
    ],

    // Many
    'destroy-many-experience' => [
        'name' =>  'experiences.many.destroy',
        'code' => 'destroy-many-experience',
        'description' => 'Ability to destroy many experiences',
        'group' => 'experience',
    ],
    'delete-many-experience' => [
        'name' =>  'experiences.many.delete',
        'code' => 'delete-many-experience',
        'description' => 'Ability to permanently delete many experiences',
        'group' => 'experience',
    ],
    'restore-many-experience' => [
        'name' => 'experiences.many.restore',
        'code' => 'restore-many-experience',
        'description' => 'Ability to restore many experiences',
        'group' => 'experience',
    ],

    // Amenities
    'view-amenity' => [
        'name' =>  'amenities.index',
        'code' => 'view-amenity',
        'description' => 'Ability to view list of amenities',
        'group' => 'amenity',
    ],
    'show-amenity' => [
        'name' => 'amenities.show',
        'code' => 'show-amenity',
        'description' => 'Ability to show a single amenity',
        'group' => 'amenity',
    ],
    'create-amenity' => [
        'name' => 'amenities.create',
        'code' => 'create-amenity',
        'description' => 'Ability to show the form to create amenity',
        'group' => 'amenity',
    ],
    'store-amenity' => [
        'name' => 'amenities.store',
        'code' => 'store-amenity',
        'description' => 'Ability to save the amenity',
        'group' => 'amenity',
    ],
    'edit-amenity' => [
        'name' => 'amenities.edit',
        'code' => 'edit-amenity',
        'description' => 'Ability to show the form to edit amenity',
        'group' => 'amenity',
    ],
    'update-amenity' => [
        'name' => 'amenities.update',
        'code' => 'update-amenity',
        'description' => 'Ability to update the amenity',
        'group' => 'amenity',
    ],
    'destroy-amenity' => [
        'name' =>  'amenities.destroy',
        'code' => 'destroy-amenity',
        'description' => 'Ability to move the amenity to trash',
        'group' => 'amenity',
    ],
    'delete-amenity' => [
        'name' =>  'amenities.delete',
        'code' => 'delete-amenity',
        'description' => 'Ability to permanently delete the amenity',
        'group' => 'amenity',
    ],
    'trash-amenity' => [
        'name' =>  'amenities.trash',
        'code' => 'trash-amenity',
        'description' => 'Ability to view the list of all trashed amenity',
        'group' => 'amenity',
    ],
    'restore-amenity' => [
        'name' => 'amenities.restore',
        'code' => 'restore-amenity',
        'description' => 'Ability to restore the amenity',
        'group' => 'amenity',
    ],

    // Many
    'destroy-many-amenity' => [
        'name' =>  'amenities.many.destroy',
        'code' => 'destroy-many-amenity',
        'description' => 'Ability to destroy many amenities',
        'group' => 'amenity',
    ],
    'delete-many-amenity' => [
        'name' =>  'amenities.many.delete',
        'code' => 'delete-many-amenity',
        'description' => 'Ability to permanently delete many amenities',
        'group' => 'amenity',
    ],
    'restore-many-amenity' => [
        'name' => 'amenities.many.restore',
        'code' => 'restore-many-amenity',
        'description' => 'Ability to restore many amenities',
        'group' => 'amenity',
    ],

    // Review
    'review-experience' => [
        'name' => 'experiences.review',
        'code' => 'review-experience',
        'description' => 'Ability to review experiences',
        'group' => ['experience', 'public-experience'],
    ],
];
