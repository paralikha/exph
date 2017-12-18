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
     * Dashboard Permissions
     *
     */
    'view-mainanalytics' => [
        'name' =>  'dashboard.index',
        'code' => 'view-mainanalytics',
        'group' => 'dashboard',
    ],

    'view-area' => [
        'name' =>  'dashboard.index',
        'code' => 'view-area',
        'group' => 'dashboard',
    ],

    'view-bar' => [
        'name' =>  'dashboard.index',
        'code' => 'view-bar',
        'group' => 'dashboard',
    ],

    'view-donut' => [
        'name' =>  'dashboard.index',
        'code' => 'view-donut',
        'group' => 'dashboard',
    ],

    'view-bar_st' => [
        'name' =>  'dashboard.index',
        'code' => 'view-bar_st',
        'group' => 'dashboard',
    ],

    'view-area_st' => [
        'name' =>  'dashboard.index',
        'code' => 'view-area_st',
        'group' => 'dashboard',
    ],

    'view-donut_st' => [
        'name' =>  'dashboard.index',
        'code' => 'view-donut_st',
        'group' => 'dashboard',
    ],

    'view-donut_t' => [
        'name' =>  'dashboard.index',
        'code' => 'view-donut_t',
        'group' => 'dashboard',
    ],

    'view-bar_t' => [
        'name' =>  'dashboard.index',
        'code' => 'view-bar_t',
        'group' => 'dashboard',
    ],

    'view-area_t' => [
        'name' =>  'dashboard.index',
        'code' => 'view-area_t',
        'group' => 'dashboard',
    ],

    'view-assignments' => [
        'name' =>  'dashboard.index',
        'code' => 'view-assignments',
        'group' => 'dashboard',
    ],

    'view-announcements' => [
        'name' =>  'dashboard.index',
        'code' => 'view-announcements',
        'group' => 'dashboard',
    ],

    'view-activities' => [
        'name' =>  'dashboard.index',
        'code' => 'view-activities',
        'group' => 'dashboard',
    ],

    'view-todo' => [
        'name' =>  'dashboard.index',
        'code' => 'view-todo',
        'group' => 'dashboard',
    ],

];
