<?php namespace Xpander\Database\Migrations;

use Xpander\Helpers\Database\Table\Field;
use Xpander\Migration;

class CreateTableMenuPermission extends Migration
{
	public function up()
	{
        $this->db->transStart();

        $this->forge->addField(array_merge(
            Field::ID(),
            Field::foreignID('status'),
            Field::foreignID('menu'),
            Field::foreignID('permission'),
            Field::trackable()
        ))->addUniqueKey([
            'menu_id', 'permission_id'
        ])->addPrimaryKey('id')->createTable('menu_permission');

        $this->db->transComplete();
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->db->transStart();

        $this->forge->dropTable('menu_permission', true);

        $this->db->transComplete();
	}
}
