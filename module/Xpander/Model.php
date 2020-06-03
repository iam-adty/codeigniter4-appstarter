<?php

namespace Xpander;

use CodeIgniter\Database\BaseConnection;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Exceptions\ModelException;
use CodeIgniter\Model as CodeIgniterModel;
use CodeIgniter\Validation\ValidationInterface;
use Config\Database;
use Reflection;

class Model extends CodeIgniterModel
{
    protected $primaryKey = 'id';
    protected $useSoftDelete = true;
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';

    protected $withRelation = false;
    protected $relations = [];

    /**
     * Provides a shared instance of the Query Builder.
     *
     * @param string $table
     *
     * @return BaseBuilder
     * @throws \CodeIgniter\Exceptions\ModelException;
     */
    protected function builder(string $table = null)
    {
        if ($this->builder instanceof BaseBuilder) {
            return $this->builder;
        }

        // We're going to force a primary key to exist
        // so we don't have overly convoluted code,
        // and future features are likely to require them.
        if (empty($this->primaryKey)) {
            throw ModelException::forNoPrimaryKey(get_class($this));
        }

        $table = empty($table) ? $this->table : $table;

        // Ensure we have a good db connection
        if (!$this->db instanceof BaseConnection) {
            $this->db = Database::connect($this->DBGroup);
        }

        $this->builder = $this->db->table($table);

        if ($this->withRelation) {
            $this->_calculateRelation();
            $this->withRelation = false;
        }

        return $this->builder;
    }

    public function withRelation()
    {
        $this->withRelation = true;
        return $this;
    }

    protected function _calculateRelation()
    {
        if (defined($this->returnType . '::RELATION')) {
            foreach (constant($this->returnType . '::RELATION') as $type => $definitions) {
                foreach ($definitions as $name => $definition) {
                    if ($type == 'hasOne') {
                        $this->builder->join($name, "{$name}.id = {$this->table}.{$name}_id");
                    } elseif ($type == 'hasMany') {
                        // check for bridge first
                        // $this->builder->join($name, "{$name}.id = {$this->table}_{$name}.{$this->table}_id");
                    }
                }
            }
        }
    }
}
