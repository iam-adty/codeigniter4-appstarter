<?php

namespace Xpander;

use CodeIgniter\Database\BaseConnection;
use CodeIgniter\Entity as CodeIgniterEntity;
use Config\Database;

class Entity extends CodeIgniterEntity
{
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * @var BaseConnection
     */
    protected $db;

    public function __construct(array $data = null)
    {
        $this->casts['id'] = 'integer';
        $this->casts['created_by'] = 'integer';
        $this->casts['updated_by'] = 'integer';
        $this->casts['deleted_by'] = 'integer';
        $this->casts['created_at'] = 'timestamp';
        $this->casts['updated_at'] = 'timestamp';
        $this->casts['deleted_at'] = 'timestamp';

        parent::__construct($data);

        $this->db = Database::connect();
    }
}
