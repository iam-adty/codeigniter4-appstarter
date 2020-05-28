<?php

namespace Xpander;

use phpDocumentor\Reflection\DocBlockFactory;

trait DocBlockTrait
{
    protected DocBlockFactory $_docBlockFactory;

    protected function _initDocBlock()
    {
        $this->_docBlockFactory = DocBlockFactory::createInstance();
    }
}
