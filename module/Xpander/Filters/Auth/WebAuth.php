<?php

namespace Xpander\Filters\Auth;

use Xpander\Filters\Auth;

class WebAuth extends Auth
{
    public function before(\CodeIgniter\HTTP\RequestInterface $request, $params = null)
    {
        if (in_array('web', $params)) {
            if (in_array('outside', $params)) {
                if ($this->session->has('user')) {
                    return redirect('dashboard');
                }
            } elseif (in_array('inside', $params)) {
                if (!$this->session->has('user')) {
                    return redirect('login');
                }
            }
        } elseif (in_array('api', $params)) {}
    }
}
