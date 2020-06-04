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

    protected $withSchema = false;

    public function withSchema()
    {
        if (defined("{$this->returnType}::SCHEMA")) {
            $this->_buildSchema(constant("{$this->returnType}::SCHEMA"), [
                '$name' => $this->table
            ]);
        }

        return $this;
    }

    protected function _buildSchema($schema = [], $options = [])
    {
        foreach ($schema as $name => $definition) {
            $entity = array_shift($definition);

            $source = 'id';
            if (array_key_exists('$source', $definition)) {
                $source = $definition['$source'];
                unset($definition['$source']);
            }

            $target = 'id';
            if (array_key_exists('$target', $definition)) {
                $target = $definition['$target'];
                unset($definition['$target']);
            }

            $pivot = null;
            if (array_key_exists('$pivot', $definition)) {
                $pivot = $definition['$pivot'];
                unset($definition['$pivot']);
            }

            $pivotName = array_key_exists('$pivotName', $options) ? $options['$pivotName'] : '';
            $sourceName = $options['$name'];
            $alias = "{$sourceName}_{$name}";

            if (!is_null($pivot)) {
                $pivotEntity = array_shift($pivot);

                $pivotSource = 'id';
                if (array_key_exists('$source', $pivot)) {
                    $pivotSource = $pivot['$source'];
                    unset($pivot['$source']);
                }

                $pivotTarget = 'id';
                if (array_key_exists('$target', $pivot)) {
                    $pivotTarget = $pivot['$target'];
                    unset($pivot['$target']);
                }

                if (!empty($pivotName)) {
                    $this->join($alias, "{$alias}.{$pivotSource} = {$sourceName}.{$source}");
                    $this->join("{$name} {$pivotName}_{$name}", "{$pivotName}_{$name}.{$target} = {$alias}.{$pivotTarget}");

                    $this->_buildSchema($definition, [
                        '$name' => $name,
                        '$pivotName' => $alias
                    ]);
                } else {
                    $this->join($alias, "{$alias}.{$pivotSource} = {$sourceName}.{$source}");
                    $this->join($name, "{$name}.{$target} = {$alias}.{$pivotTarget}");

                    $this->_buildSchema($definition, [
                        '$name' => $name,
                        '$pivotName' => $alias
                    ]);
                }

                $this->_buildSchema($pivot, [
                    '$name' => $alias,
                ]);
            } else {
                if (!empty($pivotName)) {
                    $this->join("{$name} {$pivotName}_{$name}", "{$pivotName}_{$name}.{$target} = {$pivotName}_{$name}.{$source}");
                } else {
                    $this->join($name . ' ' . $alias, "{$alias}.{$target} = {$sourceName}.{$source}");
                }

                $this->_buildSchema($definition, [
                    '$name' => $name
                ]);
            }
        }
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

                        $this->_buildRelation("{$definition[1]}::RELATION", [
                            'name' => $name,
                            'from' => $options['name']
                        ]);
                    } elseif ($type == 'hasMany') {
                        if (count($definition) == 3) {
                            $this->_buildRelation("{$definition[2]}::RELATION", [
                                'name' => $name,
                                'from' => $options['name']
                            ]);
                        } elseif (count($definition) == 2) {
                            $this->join($name, "{$name}.{$options['name']}_{$definition[0]} = {$options['name']}.{$definition[0]}");

                            $this->_buildRelation("{$definition[1]}::RELATION", [
                                'name' => $name,
                                'from' => $options['name']
                            ]);
                        }
                    } elseif ($type == 'isBridgeOf') {
                        if ($name == $options['from']) {
                            $this->join("{$name}_{$options['name']}", "{$name}_{$options['name']}.{$definition[0]} = {$name}.id");
                        } elseif ($name = $options['name']) {
                            $this->join("{$name}", "{$name}.id = {$options['from']}_{$name}.{$definition[0]}");
                        }

                        $this->_buildRelation("{$definition[1]}::RELATION", [
                            'name' => $name,
                            'from' => $options['name']
                        ]);
                    }
                }
            }
        }
    }
}
