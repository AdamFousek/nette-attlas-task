<?php


namespace App\Model;

use Nette;

class MenuManager
{
    use Nette\SmartObject;

    /** @var Nette\Database\Context */
    private $database;

    public function __construct(Nette\Database\Context $database)
    {
        $this->database = $database;
    }

    public function getMenuStructure()
    {
        $menuItemsDB = $this->database->table('menu')->where('parentId', null)->fetchAll();
        return $this->getItemsChildren($menuItemsDB);
    }

    /**
     * Helping Function for getting childrens
     *
     * @param $items
     */
    private function getItemsChildren($items) {
        if (!count($items)) {
            return $items;
        }
        $menuItems = [];
        foreach($items as $item) {
            $menu = new Menu($item->id, $item->name, $item->url, $item->parentId);
            $menu->setChildren($this->getItemsChildren($this->database->table('menu')->where('parentId', $item->id)->fetchAll()));
            array_push($menuItems, $menu);
        }
        return $menuItems;
    }

    public function addMenuItem(Menu $menu) {
        $menuItem = $this->database->table('menu')->insert([
            'name' => $menu->getName(),
            'url' => $menu->getUrl(),
            'parentId' => $menu->getParentId(),
        ]);

        return $menuItem;
    }
}