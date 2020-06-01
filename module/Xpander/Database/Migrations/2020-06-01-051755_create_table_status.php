<?php namespace Xpander\Database\Migrations;

use Xpander\Helpers\Database\Table\Field;
use Xpander\Migration;

class CreateTableStatus extends Migration
{
	public function up()
	{
        $this->db->transStart();

        $this->forge->addField(array_merge(
            Field::ID(),
            Field::string('code', ['null' => false]),
            Field::string('name', ['null' => false]),
            Field::text('description'),
            Field::trackable()
        ))->addPrimaryKey('id')->addUniqueKey('code')->createTable('status');

        $this->db->transComplete();
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->db->transStart();

        $this->forge->dropTable('status', true);

        $this->db->transComplete();
	}
}
