<?php namespace Xpander\Database\Migrations;

use Xpander\Helpers\Database\Table\Field;
use Xpander\Migration;

class CreateTableUser extends Migration
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
            Field::string('email', [
                'null' => false
            ]),
            Field::string('name', [
                'null' => false
            ]),
            Field::string('password', [
                'null' => false
            ]),
            Field::trackable()
        ))->addUniqueKey('code')->addUniqueKey('email')->addPrimaryKey('id')->createTable('user');

        $this->db->transComplete();
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->db->transStart();

        $this->forge->dropTable('user', true);

        $this->db->transComplete();
	}
}
