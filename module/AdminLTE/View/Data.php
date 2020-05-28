<?php

namespace AdminLTE\View;

use AdminLTE\View\Data\Page;
use AdminLTE\View\Data\Site;
use AdminLTE\View\Data\Template;
use AdminLTE\View\Data\User;
use Xpander\View\Data as ViewData;
use Xpander\View\DataFactoryTrait;

class Data extends ViewData
{
    /**
     * @var Site
     */
    public Site $site;

    /**
     * @var Page
     */
    public Page $page;

    /**
     * @var User
     */
    public User $user;

    /**
     * @var Template
     */
    public Template $template;

    use DataFactoryTrait;
}
