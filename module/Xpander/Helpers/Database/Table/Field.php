<?php

namespace Xpander\Helpers\Database\Table;

class Field
{
    public function __construct()
    {}

    public static function increment($default = [
        'name' => 'id',
        'type' => 'INT',
        'unsigned' => true
    ])
    {
        return [
            $default['name'] ?? 'id' => [
                'type' => $default['type'] ?? 'INT',
                'unsigned' => $default['unsigned'] ?? true,
                'auto_increment' => true,
                'null' => false
            ]
        ];
    }

    public static function string($name = '', $default = [
        'type' => 'VARCHAR',
        'length' => 255,
        'null' => true
    ])
    {
        return [
            $name => [
                'type' => $default['type'] ?? 'VARCHAR',
                'constraint' => $default['length'] ?? 255,
                'null' => $default['null'] ?? true
            ]
        ];
    }

    public static function timestamp($name = '', $default = [
        'type' => 'TIMESTAMP',
        'null' => true
    ])
    {
        return [
            $name => [
                'type' => $default['type'] ?? 'TIMESTAMP',
                'null' => $default['null'] ?? true
            ]
        ];
    }

    public static function date($name = '', $default = [
        'type' => 'DATE',
        'null' => true
    ])
    {
        return [
            $name => [
                'type' => $default['type'] ?? 'DATE',
                'null' => $default['null'] ?? true
            ]
        ];
    }

    public static function time($name = '', $default = [
        'type' => 'TIME',
        'null' => true
    ])
    {
        return [
            $name => [
                'type' => $default['type'] ?? 'TIME',
                'null' => $default['null'] ?? true
            ]
        ];
    }

    public static function foreignInteger($name = '', $default = [
        'type' => 'INT',
        'unsigned' => true,
        'null' => false,
        'default' => 0,
    ])
    {
        return [
            $name => [
                'type' => $default['type'] ?? 'INT',
                'unsigned' => $default['unsigned'] ?? true,
                'null' => $default['null'] ?? false,
                'default' => $default['default'] ?? 0,
            ]
        ];
    }

    public static function parentInteger($name = 'parent_id', $default = [
        'type' => 'INT',
        'unsigned' => true,
        'null' => false,
        'default' => 0,
    ])
    {
        return [
            $name => [
                'type' => $default['type'] ?? 'INT',
                'unsigned' => $default['unsigned'] ?? true,
                'null' => $default['null'] ?? false,
                'default' => $default['default'] ?? 0,
            ]
        ];
    }

    public static function integer($name = '', $default = [
        'type' => 'INT',
        'unsigned' => false,
        'null' => false,
        'default' => 0
    ])
    {
        return [
            $name => [
                'type' => $default['type'] ?? 'INT',
                'unsigned' => $default['unsigned'] ?? false,
                'null' => $default['null'] ?? false,
                'default' => $default['default'] ?? 0
            ]
        ];
    }

    public static function orderingInteger($name = 'sequence_position', $default = [
        'type' => 'SMALLINT',
        'unsigned' => true,
        'null' => false,
        'default' => 99,
    ])
    {
        return [
            $name => [
                'type' => $default['type'] ?? 'SMALLINT',
                'unsigned' => $default['unsigned'] ?? true,
                'null' => $default['null'] ?? false,
                'default' => $default['default'] ?? 99,
            ]
        ];
    }

    public static function text($name = '', $default = [
        'type' => 'TEXT',
        'null' => true
    ])
    {
        return [
            $name => [
                'type' => $default['type'] ?? 'TEXT',
                'null' => $default['null'] ?? true
            ]
        ];
    }

    public static function float($name = '', $default = [
        'type' => 'FLOAT',
        'null' => false,
        'default' => 0,
        'unsigned' => false
    ])
    {
        return [
            $name => [
                'type' => $default['type'] ?? 'FLOAT',
                'null' => $default['null'] ?? false,
                'default' => $default['default'] ?? 0,
                'unsigned' => $default['unsigned'] ?? false
            ]
        ];
    }

    public static function trackable()
    {
        return [
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ],
            'deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ],
            'created_by' => [
                'type' => 'INT',
                'null' => false,
                'default' => 0,
                'unsigned' => true
            ],
            'updated_by' => [
                'type' => 'INT',
                'null' => false,
                'default' => 0,
                'unsigned' => true
            ],
            'deleted_by' => [
                'type' => 'INT',
                'null' => false,
                'default' => 0,
                'unsigned' => true
            ]
        ];
    }
}
