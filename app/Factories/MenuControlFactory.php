<?php

namespace App\Factories;

use App\Components\Menu\MenuControl;
use App\Model\MenuManager;
use Nette\Application\UI\Control;

class MenuControlFactory extends Control
{
    /** @var MenuManager */
    private $menuManager;

    public function __construct(MenuManager $menuManager)
    {
        $this->menuManager = $menuManager;
    }

    public function create(): MenuControl
    {
        return new MenuControl($this->menuManager);
    }
}