<?php

namespace Xpander\View;

use ReflectionClass;
use Xpander\PropertyInitializerTrait;

class Component
{
    protected string $_name = '';
    protected string $_view = 'Main';

    public ?Data $data = null;

    use PropertyInitializerTrait;

    public function __construct(Data $data = null)
    {
        $this->_initReflectionClass();
        $this->_initDocBlock();

        if (empty($this->_name)) {
            $this->_name = $this->_reflectionClass->getShortName();
        }

        $this->data = $data;

        $this->_initProperty();

        if (empty($this->_view)) {
            $this->_view = lcfirst($this->_name);
        }

        $this->_init();
    }

    protected function _init()
    {}

    public function render()
    {
        $autoloader = \Config\Services::autoloader();
        $viewFile = realpath($autoloader->getNamespace(explode('\View\Component', $this->_reflectionClass->getNamespaceName())[0])[0]) . '/Views/Component/' . $this->_reflectionClass->getShortName() . '/' . $this->_view . '.php';

        $baseDir = str_replace('\View\Component\\', '\Views\Component\\', $this->_reflectionClass->getName());
        if (!file_exists($viewFile)) {
            $parents = class_parents($this);
            foreach ($parents as $parent) {
                $reflection = new ReflectionClass($parent);
                $viewFile = realpath($autoloader->getNamespace(explode('\View\Component', $reflection->getNamespaceName())[0])[0]) . '/Views/Component/' . $reflection->getShortName() . '/' . $this->_view . '.php';
                if (file_exists($viewFile)) {
                    $baseDir = str_replace('\View\Component\\', '\Views\Component\\', $reflection->getName());
                    break;
                }
            }
        }

        return view($baseDir . '\\' . $this->_view, [
            'data' => $this->data
        ]);
    }

    use ComponentFactoryTrait;
}
