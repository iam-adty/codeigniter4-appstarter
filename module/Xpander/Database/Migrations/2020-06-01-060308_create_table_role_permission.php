<?php namespace Xpander\Database\Migrations;

use Xpander\Helpers\Database\Table\Field;
use Xpander\Migration;

class CreateTableRolePermission extends Migration
{
	public function up()
	{
        $this->db->transStart();

        $this->forge->addField(array_merge(
            Field::ID(),
            Field::foreignID('status'),
            Field::foreignID('role'),
            Field::foreignID('permission'),
            Field::boolean('C'),
            Field::boolean('R'),
            Field::boolean('U'),
            Field::boolean('D'),
            Field::trackable()
        ))->addPrimaryKey('id')->addUniqueKey([
            'role_id', 'permission_id'
        ])->createTable('role_permission');

        $this->db->transComplete();
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->db->transStart();

        $this->forge->dropTable('role_permission', true);

        $this->db->transComplete();
	}
}
