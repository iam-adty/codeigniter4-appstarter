<?php namespace AdminLTE;

use Xpander\View as XpanderView;
use Xpander\ViewFactoryTrait;

/**
 * @property AdminLTE\View\Data $data
 */
class View extends XpanderView
{
    protected string $_name = 'AdminLTE';

    use ViewFactoryTrait;
}
