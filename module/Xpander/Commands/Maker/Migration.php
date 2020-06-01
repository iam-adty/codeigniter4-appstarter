<?php

namespace Xpander\Commands\Maker;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Services;

class Migration extends BaseCommand
{
    protected $group = 'Xpander';
    protected $name = 'xpander:make:migration';
    protected $description = 'Make xpander migration';
    protected $usage = 'xpander:make:migration [name] [namespace]';
    protected $arguments = [
        'name' => 'Migration name',
        'namespace' => 'Namespace'
    ];
    protected $options = [];

    public function run(array $params = [])
    {
        helper('inflector');
        $name = array_shift($params);
        $ns = array_shift($params);

        if (empty($name)) {
            $name = CLI::prompt(lang('Migrations.nameMigration'));
        }

        if (empty($name)) {
            CLI::error(lang('Migrations.badCreateName'));
            return;
        }

        $homepath = APPPATH;

        if (!empty($ns)) {
            // Get all namespaces
            $namespaces = Services::autoloader()->getNamespace();

            foreach ($namespaces as $namespace => $path) {
                if ($namespace === $ns) {
                    $homepath = realpath(reset($path));
                    break;
                }
            }
        } else {
            $ns = 'App';
        }

        // Always use UTC/GMT so global teams can work together
        $config   = config('Migrations');
        $fileName = gmdate($config->timestampFormat) . $name;

        // full path
        $path = $homepath . '/Database/Migrations/' . $fileName . '.php';

        // Class name should be pascal case now (camel case with upper first letter)
        $name = pascalize($name);

        $template = <<<EOD
<?php namespace $ns\Database\Migrations;

use Xpander\Migration;

class {name} extends Migration
{
	public function up()
	{
        \$this->db->transStart();

        

        \$this->db->transComplete();
	}

	//--------------------------------------------------------------------

	public function down()
	{
        \$this->db->transStart();

        

        \$this->db->transComplete();
	}
}

EOD;
        $template = str_replace('{name}', $name, $template);

        helper('filesystem');
        if (!write_file($path, $template)) {
            CLI::error(lang('Migrations.writeError', [$path]));
            return;
        }

        CLI::write('Created file: ' . CLI::color(str_replace($homepath, $ns, $path), 'green'));
    }
}
