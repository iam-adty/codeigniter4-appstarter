<?php

namespace AdminLTE\View\Component\Card;

use Xpander\View\Data as ViewData;
use Xpander\View\DataFactoryTrait;

class Data extends ViewData
{
    public $title = '';
    public $content = '';

    use DataFactoryTrait;
}
