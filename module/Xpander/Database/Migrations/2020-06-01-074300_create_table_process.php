<?php namespace Xpander\Database\Migrations;

use Xpander\Helpers\Database\Table\Field;
use Xpander\Migration;

class CreateTableProcess extends Migration
{
	public function up()
	{
        $this->db->transStart();

        $this->forge->addField(array_merge(
            Field::ID(),
            Field::foreignID('status'),
            Field::foreignID('type'),
            Field::string('code', [
                'null' => false
            ]),
            Field::string('name', [
                'null' => false
            ]),
            Field::text('description'),
            Field::json('property'),
            Field::trackable()
        ))->addUniqueKey('code')->addPrimaryKey('id')->createTable('process');

        $this->db->transComplete();
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->db->transStart();

        $this->forge->dropTable('process', true);

        $this->db->transComplete();
	}
}
