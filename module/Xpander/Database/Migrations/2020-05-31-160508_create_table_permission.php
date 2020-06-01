<?php namespace Xpander\Database\Migrations;

use Xpander\Helpers\Database\Table\Field;
use Xpander\Migration;

class CreateTablePermission extends Migration
{
	public function up()
	{
        $this->db->transStart();

		$this->forge->addField(
            Field::increment() +
            Field::trackable()
        )->addPrimaryKey('id')->createTable('permission');

        $this->db->transComplete();
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->db->transStart();

        $this->forge->dropTable('permission');

        $this->db->transComplete();
	}
}
