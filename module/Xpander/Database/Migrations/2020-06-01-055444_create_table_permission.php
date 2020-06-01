<?php namespace Xpander\Database\Migrations;

use Xpander\Helpers\Database\Table\Field;
use Xpander\Migration;

class CreateTablePermission extends Migration
{
	public function up()
	{
        $this->db->transStart();
        
        $this->forge->addField(array_merge(
            Field::ID(),
            Field::foreignID('status'),
            Field::string('code', ['null' => false]),
            Field::string('name', ['null' => false]),
            Field::text('description'),
            Field::trackable()
        ))->addUniqueKey('code')->addPrimaryKey('id')->createTable('permission');

        $this->db->transComplete();
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->db->transStart();

        $this->forge->dropTable('permission', true);

        $this->db->transComplete();
	}
}
