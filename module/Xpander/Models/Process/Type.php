<?php

namespace Xpander\Models\Process;

use Xpander\Entities\Process\Type as ProcessType;
use Xpander\Model;

class Type extends Model
{
    protected $table = 'process_type';
    protected $allowedFields = [
        'status_id', 'code', 'name', 'description'
    ];
    protected $returnType = ProcessType::class;
}
