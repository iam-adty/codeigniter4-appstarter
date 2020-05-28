<?php

namespace AdminLTE\View\Data\Template\Menu;

use Xpander\View\Data;

class Item extends Data
{
    public $name = '';
    public $link = '#';
    public $isActive = false;
    public $icon = 'fas fa-circle';
    public $childs = [];
}
