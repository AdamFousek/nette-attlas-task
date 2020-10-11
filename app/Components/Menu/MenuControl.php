<?php

namespace App\Components\Menu;

use App\Model\MenuManager;
use Nette\Application\UI\Control;

class MenuControl extends Control
{
    /** @var MenuManager */
    private $menuManager;

    public function __construct(MenuManager $menuManager)
    {
        $this->menuManager = $menuManager;
    }

    public function render(): void
    {
        $this->template->items = $this->menuManager->getMenuStructure();
        $this->template->render(__DIR__ . '/menu.latte');
    }
}