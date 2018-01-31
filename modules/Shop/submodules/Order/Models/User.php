<?php

namespace Order\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Order\Support\Relations\HasManyOrders;
use User\Models\User as BaseUser;

class User extends BaseUser
{
    use HasManyOrders;

    protected $with = ['roles'];

    protected $appends = ['handlename', 'propername', 'displayname', 'displayrole', 'fullname', 'created', 'modified'];

    protected $searchables = ['firstname', 'middlename', 'lastname', 'username', 'prefixname', 'email'];
}
