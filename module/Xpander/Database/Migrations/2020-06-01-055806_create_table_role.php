<?php namespace Xpander\Database\Migrations;

use Xpander\Helpers\Database\Table\Field;
use Xpander\Migration;

class CreateTableRole extends Migration
{
	public function up()
	{
        $this->db->transStart();

        $this->forge->addField(array_merge(
            Field::ID(),
            Field::parentID(),
            Field::foreignID('status'),
            Field::string('code', [
                'null' => false
            ]),
            Field::string('name', [
                'null' => false
            ]),
            Field::text('description'),
            Field::orderingInteger('level'),
            Field::trackable()
        ))->addUniqueKey('code')->addPrimaryKey('id')->createTable('role');

        $this->db->transComplete();
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->db->transStart();

        $this->forge->dropTable('role', true);

        $this->db->transComplete();
	}
}
