<?php

namespace Dashboard\Controllers;

use Xpander\Controller;

/**
 * @property Dashboard\View $view
 */
class Login extends Controller
{
    public function index()
    {
        if ($this->request->getPost('action')) {
            
        }

        helper('form');

        return $this->view->render('Login');
    }

    protected function _action_login()
    {
        
    }
}
