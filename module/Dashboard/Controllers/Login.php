<?php

namespace Dashboard\Controllers;

use Config\Services;
use Xpander\Controller;

/**
 * @property Dashboard\View $view
 */
class Login extends Controller
{
    public function index()
    {
        helper('form');

        return $this->_render(function () {
            return $this->view->render('Login');
        });
    }

    protected function _action_login()
    {
        if ($this->validate([
            'email' => 'required|valid_email',
            'password' => 'required'
        ])) {
            Services::session()->set('user', 'didit');
            return redirect('dashboard');
        } else {
            Services::session()->setFlashdata('message', $this->validator->listErrors());
        }
    }
}
