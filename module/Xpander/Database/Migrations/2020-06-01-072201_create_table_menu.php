<?php namespace Xpander\Database\Migrations;

use Xpander\Helpers\Database\Table\Field;
use Xpander\Migration;

class CreateTableMenu extends Migration
{
	public function up()
	{
        $this->db->transStart();

        $this->forge->addField(array_merge(
            Field::ID(),
            Field::parentID(),
            Field::foreignID('status'),
            Field::foreignID('type'),
            Field::string('code', [
                'null' => false
            ]),
            Field::string('name', [
                'null' => false
            ]),
            Field::text('description'),
            Field::string('url'),
            Field::string('icon'),
            Field::orderingInteger('level'),
            Field::orderingInteger(),
            Field::trackable()
        ))->addUniqueKey('code')->addPrimaryKey('id')->createTable('menu');

        $this->db->transComplete();
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->db->transStart();

        $this->forge->dropTable('menu', true);

        $this->db->transComplete();
	}
}
