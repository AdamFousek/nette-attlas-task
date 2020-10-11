<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Components\Menu\MenuControl;
use App\Factories\MenuControlFactory;
use App\Model\Menu;
use App\Model\MenuManager;
use Nette;


final class HomepagePresenter extends Nette\Application\UI\Presenter
{
    /**
     * @var MenuControlFactory
     */
    private $menuControlFactory;
    /**
     * @var MenuManager
     */
    private $menuManager;

    public function __construct(MenuControlFactory $menuControlFactory, MenuManager $menuManager)
    {
        $this->menuControlFactory = $menuControlFactory;
        $this->menuManager = $menuManager;
    }

    public function renderDefault(): void
    {
        $menu = new Menu();
        $menu->setName("Test");
        $menu->setUrl("/test/");
        $menu->setParentId(2);
        $this->menuManager->addMenuItem($menu);
    }

    protected function createComponentMenu(): MenuControl
    {
        return $this->menuControlFactory->create();
    }
}
