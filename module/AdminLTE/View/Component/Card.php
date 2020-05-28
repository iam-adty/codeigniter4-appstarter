<?php

namespace AdminLTE\View\Component;

use Xpander\View\Component;
use Xpander\View\ComponentFactoryTrait;

/**
 * @property AdminLTE\View\Component\Card\Data $data
 */
class Card extends Component
{
    protected string $_name = 'Card';

    use ComponentFactoryTrait;
}
