<?php

namespace Xpander\Filters;

use CodeIgniter\Filters\FilterInterface;
use Config\Services;

class Auth implements FilterInterface
{
    public function before(\CodeIgniter\HTTP\RequestInterface $request)
    {
        $session = Services::session();
        d($request);
    }

    public function after(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response)
    {
        d($request, $response);
    }
}
