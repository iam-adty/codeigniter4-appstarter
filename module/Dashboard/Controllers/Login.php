<?php

namespace Dashboard\Controllers;

use Config\Services;
use Xpander\Controller;
use Xpander\Models\User;

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
        $userModel = new User();

        if ($this->validate([
            'email' => 'required|valid_email',
            'password' => 'required'
        ])) {
            $user = $userModel
                ->withSchema()
                ->where('user.email', $this->request->getPost('email'))
                ->where('status.code', 'active')
                ->getCompiledSelect();

            d($user);
        } else {
            Services::session()->setFlashdata('message', $this->validator->listErrors());
        }
    }
}
