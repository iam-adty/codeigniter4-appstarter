<?php

namespace Xpander\Models;

use Xpander\Entities\Process as EntitiesProcess;
use Xpander\Model;

class Process extends Model
{
    protected $table = 'process';
    protected $allowedFields = [
        'code', 'name', 'description', 'status_id', 'property', 'type_id'
    ];
    protected $returnType = EntitiesProcess::class;
}
