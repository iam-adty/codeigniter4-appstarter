<?php

namespace Xpander;

use CodeIgniter\Model as CodeIgniterModel;

class Model extends CodeIgniterModel
{
    protected $primaryKey = 'id';
    protected $useSoftDelete = true;
    protected $useTimestamps = true;
    protected $dateFormat = 'timestamp';
}
