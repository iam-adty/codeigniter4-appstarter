<?php namespace Xpander\Database\Migrations;

use Xpander\Helpers\Database\Table\Field;
use Xpander\Migration;

class CreateTableUserRole extends Migration
{
	public function up()
	{
        $this->db->transStart();

        $this->forge->addField(array_merge(
            Field::ID(),
            Field::foreignID('status'),
            Field::foreignID('user'),
            Field::foreignID('role'),
            Field::trackable()
        ))->addUniqueKey([
            'user_id', 'role_id'
        ])->addPrimaryKey('id')->createTable('user_role');

        $this->db->transComplete();
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->db->transStart();

        $this->forge->dropTable('user_role', true);

        $this->db->transComplete();
	}
}
