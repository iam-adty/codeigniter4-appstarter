<?php

namespace Dashboard\View;

use AdminLTE\View\Data as ViewData;

class Data extends ViewData
{
    public function _init()
    {
        $this->site->title = 'Codeigniter4 App Starter | Dashboard';
        $this->site->name = 'CI4 App Starter';

        $this->page->title = 'Dashboard';
    }
}
