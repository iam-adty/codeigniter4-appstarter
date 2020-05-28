<?php

namespace Dashboard;

use AdminLTE\View as AdminLTEView;
use Xpander\ViewFactoryTrait;

/**
 * @property Dashboard\View\Data $data
 */
class View extends AdminLTEView
{
    protected string $_name = 'Dashboard';

    use ViewFactoryTrait;
}
