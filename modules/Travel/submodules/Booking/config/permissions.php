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
     * Booking Permissions
     * -------------------------------------------------------------------------
     *
     */
    'view-booking' => [
        'name' =>  'bookings.index',
        'code' => 'view-booking',
        'description' => 'Ability to view list of bookings',
        'group' => 'booking',
    ],
    'show-booking' => [
        'name' => 'bookings.show',
        'code' => 'show-booking',
        'description' => 'Ability to show a single booking',
        'group' => 'booking',
    ],
    'create-booking' => [
        'name' => 'bookings.create',
        'code' => 'create-booking',
        'description' => 'Ability to show the form to create booking',
        'group' => 'booking',
    ],
    'store-booking' => [
        'name' => 'bookings.store',
        'code' => 'store-booking',
        'description' => 'Ability to save the booking',
        'group' => 'booking',
    ],
    'edit-booking' => [
        'name' => 'bookings.edit',
        'code' => 'edit-booking',
        'description' => 'Ability to show the form to edit booking',
        'group' => 'booking',
    ],
    'update-booking' => [
        'name' => 'bookings.update',
        'code' => 'update-booking',
        'description' => 'Ability to update the booking',
        'group' => 'booking',
    ],
    'destroy-booking' => [
        'name' =>  'bookings.destroy',
        'code' => 'destroy-booking',
        'description' => 'Ability to move the booking to trash',
        'group' => 'booking',
    ],
    'delete-booking' => [
        'name' =>  'bookings.delete',
        'code' => 'delete-booking',
        'description' => 'Ability to permanently delete the booking',
        'group' => 'booking',
    ],
    'trash-booking' => [
        'name' =>  'bookings.trash',
        'code' => 'trash-booking',
        'description' => 'Ability to view the list of all trashed booking',
        'group' => 'booking',
    ],
    'restore-booking' => [
        'name' => 'bookings.restore',
        'code' => 'restore-booking',
        'description' => 'Ability to restore the booking',
        'group' => 'booking',
    ],

    // Many
    'destroy-many-booking' => [
        'name' =>  'bookings.many.destroy',
        'code' => 'destroy-many-booking',
        'description' => 'Ability to destroy many bookings',
        'group' => 'booking',
    ],
    'delete-many-booking' => [
        'name' =>  'bookings.many.delete',
        'code' => 'delete-many-booking',
        'description' => 'Ability to permanently delete many bookings',
        'group' => 'booking',
    ],
    'restore-many-booking' => [
        'name' => 'bookings.many.restore',
        'code' => 'restore-many-booking',
        'description' => 'Ability to restore many bookings',
        'group' => 'booking',
    ],

    //
];
