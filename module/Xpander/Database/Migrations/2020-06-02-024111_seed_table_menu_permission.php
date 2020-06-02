<?php namespace Xpander\Database\Migrations;

use Xpander\Migration;

class SeedTableMenuPermission extends Migration
{
	public function up()
	{
        $this->db->transStart();

        

        $this->db->transComplete();
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->db->transStart();

        

        $this->db->transComplete();
	}
}
