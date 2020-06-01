<?php namespace Xpander\Database\Migrations;

use Xpander\Migration;

class SeedTablePermission extends Migration
{
	public function up()
	{
        $this->db->transStart();

        $date = date('Y-m-d H:i:s');

        $this->db->table('permission')->insertBatch([
            [
                'code' => 'login',
                'name' => 'Login',
                'description' => 'Login',
                'status_id' => 1,
                'created_at' => $date,
                'updated_at' => $date,
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'code' => 'dashboard',
                'name' => 'Dashboard',
                'description' => 'Dashboard',
                'status_id' => 1,
                'created_at' => $date,
                'updated_at' => $date,
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'code' => 'dashboardSetting',
                'name' => 'Dashboard/Setting',
                'description' => 'Dashboard/Setting',
                'status_id' => 1,
                'created_at' => $date,
                'updated_at' => $date,
                'created_by' => 1,
                'updated_by' => 1
            ]
        ]);

        $this->db->transComplete();
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->db->transStart();

        $this->db->table('permission')->truncate();

        $this->db->transComplete();
	}
}
