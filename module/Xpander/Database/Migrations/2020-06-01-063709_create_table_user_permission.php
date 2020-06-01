<?php namespace Xpander\Database\Migrations;

use Xpander\Helpers\Database\Table\Field;
use Xpander\Migration;

class CreateTableUserPermission extends Migration
{
	public function up()
	{
        $this->db->transStart();

        $this->forge->addField(array_merge(
            Field::ID(),
            Field::foreignID('status'),
            Field::foreignID('user'),
            Field::foreignID('permission'),
            Field::boolean('C'),
            Field::boolean('R'),
            Field::boolean('U'),
            Field::boolean('D'),
            Field::trackable()
        ))->addUniqueKey([
            'user_id', 'permission_id'
        ])->addPrimaryKey('id')->createTable('user_permission');

        $this->db->transComplete();
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->db->transStart();

        $this->forge->dropTable('user_permission', true);

        $this->db->transComplete();
	}
}
