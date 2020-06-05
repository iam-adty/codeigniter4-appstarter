<?php

namespace Xpander;

use CodeIgniter\Database\BaseConnection;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Exceptions\ModelException;
use CodeIgniter\Model as CodeIgniterModel;
use CodeIgniter\Validation\ValidationInterface;
use Config\Database;
use Reflection;
use ReflectionClass;

class Model extends CodeIgniterModel
{
    protected $primaryKey = 'id';
    protected $useSoftDelete = true;
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';

    protected $withSchema = false;

    /**
     * @var ReflectionClass[]
     */
    protected $_savedEntityReflection = [];

    public function withSchema()
    {
        if (defined("{$this->returnType}::SCHEMA")) {
            $this->select("{$this->table}.*");

            $this->_buildSchema(constant("{$this->returnType}::SCHEMA"), [
                '$name' => $this->table
            ]);

            d($this->_savedEntityReflection['Xpander\Entities\User\Role']->getDefaultProperties()['casts']);
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

            $sourceName = $options['$name'];
            $alias = "{$sourceName}_{$name}";

            if (!array_key_exists($entity, $this->_savedEntityReflection)) {
                $entityReflection = new ReflectionClass($entity);
                $this->_savedEntityReflection[$entity] = $entityReflection;
            } else {
                $entityReflection = $this->_savedEntityReflection[$entity];
            }

            foreach ($entityReflection->getDefaultProperties()['casts'] as $fieldName => $fieldType) {
                $this->select("{$alias}.{$fieldName} {$alias}_{$fieldName}");
            }

            $this->join("{$name} {$alias}", "{$alias}.{$target} = {$sourceName}.{$source}", 'left');

            $this->_buildSchema($definition, [
                '$name' => $alias,
            ]);
        }
    }
}
