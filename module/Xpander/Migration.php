<?php

namespace Xpander;

use CodeIgniter\Database\Forge;
use CodeIgniter\Database\Migration as DatabaseMigration;

class Migration extends DatabaseMigration
{
    use ClassInitializerTrait;

    public function __construct(Forge $forge = null)
    {
        parent::__construct($forge);

        $this->_init();
    }

    public function up()
    {}

    public function down()
    {}
}
