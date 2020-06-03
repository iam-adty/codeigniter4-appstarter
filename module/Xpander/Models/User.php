<?php

namespace Xpander\Models;

use Xpander\Entities\User as EntitiesUser;
use Xpander\Model;

class User extends Model
{
    protected $table = 'user';
    protected $allowedFields = [
        'code', 'name', 'email', 'password', 'status_id'
    ];
    protected $returnType = EntitiesUser::class;
}
