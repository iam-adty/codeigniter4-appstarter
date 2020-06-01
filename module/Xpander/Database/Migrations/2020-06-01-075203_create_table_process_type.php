<?php namespace Xpander\Database\Migrations;

use Xpander\Helpers\Database\Table\Field;
use Xpander\Migration;

class CreateTableProcessType extends Migration
{
	public function up()
	{
        $this->db->transStart();

        $this->forge->addField(array_merge(
            Field::ID(),
            Field::foreignID('status'),
            Field::string('code', [
                'null' => false
            ]),
            Field::string('name', [
                'null' => false
            ]),
            Field::text('description'),
            Field::trackable()
        ))->addUniqueKey('code')->addPrimaryKey('id')->createTable('process_type');

        $this->db->transComplete();
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->db->transStart();

        $this->forge->dropTable('process_type', true);

        $this->db->transComplete();
	}
}
