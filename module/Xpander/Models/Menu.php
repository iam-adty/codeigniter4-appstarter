<?php

namespace Xpander\Models;

use Xpander\Entities\Menu as EntitiesMenu;
use Xpander\Model;

class Menu extends Model
{
    protected $table = 'menu';
    protected $allowedFields = [
        'code', 'name', 'description', 'url', 'icon', 'level', 'parent_id', 'status_id', 'sequence_position', 'type_id'
    ];
    protected $returnType = EntitiesMenu::class;
}
