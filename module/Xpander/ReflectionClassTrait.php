<?php

namespace Xpander;

use ReflectionClass;

trait ReflectionClassTrait
{
    protected ReflectionClass $_reflectionClass;

    protected function _initReflectionClass()
    {
        $this->_reflectionClass = new ReflectionClass($this);
    }
}
