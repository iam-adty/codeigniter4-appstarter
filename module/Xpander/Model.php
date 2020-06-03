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

    // /**
    //  * Provides a shared instance of the Query Builder.
    //  *
    //  * @param string $table
    //  *
    //  * @return BaseBuilder
    //  * @throws \CodeIgniter\Exceptions\ModelException;
    //  */
    // protected function builder(string $table = null)
    // {
    //     if ($this->builder instanceof BaseBuilder) {
    //         return $this->builder;
    //     }

    //     // We're going to force a primary key to exist
    //     // so we don't have overly convoluted code,
    //     // and future features are likely to require them.
    //     if (empty($this->primaryKey)) {
    //         throw ModelException::forNoPrimaryKey(get_class($this));
    //     }

    //     $table = empty($table) ? $this->table : $table;

    //     // Ensure we have a good db connection
    //     if (!$this->db instanceof BaseConnection) {
    //         $this->db = Database::connect($this->DBGroup);
    //     }

    //     $this->builder = $this->db->table($table);

    //     if ($this->withRelation) {
    //         $this->_buildRelation("{$this->returnType}::RELATION", [
    //             'name' => $this->table
    //         ]);
    //         $this->withRelation = false;
    //     }

    //     return $this->builder;
    // }

    public function withRelation()
    {
        $this->_buildRelation("{$this->returnType}::RELATION", [
            'name' => $this->table
        ]);

        return $this;
    }

    protected function _buildRelation($rConstantName = '', $options = [])
    {
        if (defined($rConstantName)) {
            foreach (constant($rConstantName) as $type => $definitions) {
                foreach ($definitions as $name => $definition) {
                    if ($type == 'hasOne') {
                        $prefix = (isset($options['from']) ? "{$options['from']}_" : '');
                        $alias = "{$prefix}{$options['name']}_{$name}";
                        $this->join("{$name} {$alias}", "{$alias}.id = {$prefix}{$options['name']}.{$name}_id");
                    } elseif ($type == 'hasMany') {
                        if (count($definition) == 3) {
                            $this->_buildRelation("{$definition[2]}::RELATION", [
                                'name' => $name,
                                'from' => $options['name']
                            ]);
                        } elseif (count($definition) == 2) {
                            $this->join($name, "{$name}.{$options['name']}_{$definition[0]} = {$options['name']}.{$definition[0]}");
                        }
                    } elseif ($type == 'isBridgeOf') {
                        if ($name == $options['from']) {
                            $this->join("{$name}_{$options['name']}", "{$name}_{$options['name']}.{$definition[0]} = {$name}.id");
                        } elseif ($name = $options['name']) {
                            $this->join("{$name}", "{$name}.id = {$options['from']}_{$name}.{$definition[0]}");
                        }
                    }
                }
            }
        }
    }
}
