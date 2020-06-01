<?php

namespace Xpander\View;

use Xpander\ClassInitializerTrait;
use Xpander\PropertyInitializerTrait;

class Data
{
    use ClassInitializerTrait;
    use PropertyInitializerTrait;

    public function __construct(array $data = [])
    {
        $this->_initReflectionClass();
        $this->_initDocBlock();

        foreach ($data as $name => $value) {
            $this->{$name} = $value;
        }

        $this->_initProperty();
        $this->_init();
    }

    use DataFactoryTrait;
}
