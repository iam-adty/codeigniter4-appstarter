<?php

namespace Xpander\Filters;

use CodeIgniter\Filters\FilterInterface;
use Config\Services;

class Auth implements FilterInterface
{
    protected $session;

    public function __construct()
    {
        $this->session = Services::session();
    }

    public function before(\CodeIgniter\HTTP\RequestInterface $request, $params = null)
    {

    }

    public function after(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response)
    {

    }
}
