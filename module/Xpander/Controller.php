<?php

namespace Xpander;

use CodeIgniter\Controller as CodeIgniterController;

class Controller extends CodeIgniterController
{
    protected View $view;

    use ClassInitializerTrait;
    use PropertyInitializerTrait;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        $this->_initReflectionClass();
        $this->_initDocBlock();
        $this->_initProperty();
        $this->_init();
    }
}
