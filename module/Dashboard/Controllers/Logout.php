<?php

namespace Dashboard\Controllers;

use Config\Services;
use Xpander\Controller;

class Logout extends Controller
{
    public function index()
    {
        Services::session()->destroy();
        return redirect('login');
    }
}
