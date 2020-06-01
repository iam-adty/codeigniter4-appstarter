<?php

namespace Xpander;

use Exception;
use ReflectionClass;
use Xpander\View\Data;

class View
{
    protected string $_name = 'Xpander';
    protected string $_view = 'Main';

    public ?Data $data = null;

    use ClassInitializerTrait;
    use PropertyInitializerTrait;

    public function __construct(array $config = [])
    {
        if (empty($this->_name)) {
            throw new Exception('View name cannot empty or null');
        }

        $this->_initReflectionClass();
        $this->_initDocBlock();

        foreach ($config as $name => $value) {
            $this->{$name} = $value;
        }

        $this->_initProperty();
        $this->_init();
    }

    public function render()
    {
        $autoloader = \Config\Services::autoloader();
        $viewFile = realpath($autoloader->getNamespace($this->_reflectionClass->getNamespaceName())[0]) . '/Views/' . $this->_view . '.php';

        $baseDir = $this->_reflectionClass->getNamespaceName();
        if (!file_exists($viewFile)) {
            $parents = class_parents($this);
            foreach ($parents as $parent) {
                $reflection = new ReflectionClass($parent);
                $viewFile = realpath($autoloader->getNamespace($reflection->getNamespaceName())[0]) . '/Views/' . $this->_view . '.php';
                if (file_exists($viewFile)) {
                    $baseDir = $reflection->getNamespaceName();
                    break;
                }
            }
        }

        return view($baseDir . '\Views\\' . $this->_view, [
            'data' => $this->data
        ]);
    }

    use ViewFactoryTrait;
}
