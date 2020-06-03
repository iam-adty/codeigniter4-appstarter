<?php

namespace Xpander\Models;

use Xpander\Entities\Status as EntitiesStatus;
use Xpander\Model;

class Status extends Model
{
    protected $table = 'status';
    protected $allowedFields = [
        'code', 'name', 'description'
    ];
    protected $returnType = EntitiesStatus::class;
}
