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
        helper('form');

        return $this->view->render('Login');
    }
}
