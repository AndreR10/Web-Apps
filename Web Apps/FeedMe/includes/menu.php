<?php
require("openconn.php");

class Menu
{
    private $db, $restaurant_id;

    /* constructor
    * $db is a mysqli link, $restaurant_id is an int. */
    public function __construct($db, $restaurant_id)
    {
        $this->db = $db;
        $this->restaurant_id = $restaurant_id;
    }

    /* getMenuId()
    * returns numerical menu_id of the restaurant_id.*/
    public function getMenuId()
    {
        $sql = "SELECT menu_id FROM Restaurant_Menus WHERE restaurant_id = $this->restaurant_id";

        if ($result = $this->db->query($sql)) {
            while ($obj = $result->fetch_object()) {
                return $obj->menu_id;
            }
        }
    }


    /* getAllMenus()
    * returns numerical array with an index for each menu.
    * each index contains an array of the basic menu information */
    public function getAllMenus()
    {
        $sql = "SELECT Menus.id, Menus.name
                FROM Menus
                LEFT JOIN Restaurant_Menus AS r_m ON r_m.restaurant_id = '" . $this->restaurant_id . "'
                AND r_m.menu_id = Menus.id";
        $menus = array();
        if ($result = $this->db->query($sql)) {
            while ($menu = $result->fetch_object()) {
                $menus[] = array('id' => $menu->id, 'name' => $menu->name);
            }
        } else {
            die($this->db->error);
        }

        return $menus;
    }

    /* getMenuCategories($menu_id)
    * returns a numerical array of menu categories for the given menu.
    * each index contains an array of basic category information */
    public function getMenuCategories($menu_id)
    {
        $sql = "SELECT c.id, c.name
            FROM Categories AS c
            INNER JOIN Restaurants_Menus_Categories AS r_m_c ON r_m_c.category_id = c.id
            AND r_m_c.restaurant_id='" . $this->restaurant_id . "'
            AND r_m_c.menu_id='$menu_id'";
        $categories = array();
        if ($result = $this->db->query($sql)) {
            while ($cat = $result->fetch_object()) {
                $categories[] = array('id' => $cat->id, 'name' => $cat->name);
            }
        } else {
            die($this->db->error);
        }

        return $categories;
    }

    /* getCategoryItems($menu_id, $cat_id)
    * returns a numerical array of menu items for the given menu and category.
    * each index contains an array of basic menu item information */
    public function getCategoryItems($menu_id, $cat_id)
    {
        $sql = "SELECT name, description, price
                FROM Restaurant_Menus_Categories_Items
                WHERE restaurant_id='" . $this->restaurant_id . "'
                AND menu_id='$menu_id'
                AND category_id='$cat_id'";
        $items = array();
        if ($result = $this->db->query($sql)) {
            while ($item = $result->fetch_object()) {
                $items[] = array(
                    'name' => $item->name,
                    'description' => $item->description,
                    'price' => $item->price
                );
            }
        } else {
            die($this->db->error);
        }

        return $items;
    }

    /* getFullMenu($menu_id)
    * returns array containing ALL categories and ALL items associated with given menu
    * return array contains indices: [id, name, categories = [id, name, items = [item info]]]
    */
    public function getFullMenu($menu_id)
    {
        $menu = array();
        $menu['id'] = $menu_id;

        // basic menu info
        $sql = "SELECT name FROM Menus WHERE id='$menu_id' LIMIT 1";
        $result = $this->db->query($sql) or die($this->db->error);
        $row = $result->fetch_object();
        $menu['name'] = $row->name;

        // categories
        $menu['categories'] = $this->getMenuCategories($menu_id);

        // items
        for ($i = 0; $i < count($menu['categories']); $i++) {
            $menu['categories'][$i]['items'] = $this->getCategoryItems($menu_id, $menu['categories'][$i]['id']);
        }

        return $menu;
    }

    /* getAllFullMenus()
    * returns array containing ALL menus and ALL categories and ALL items associated with restaurant
    * return array numerical array with each index pointing to a return value of $this->getFullMenu($menu_id)
    */
    public function getAllFullMenus()
    {
        $basicMenus = $this->getAllMenus();

        $menus = array();
        for ($i = 0; $i < count($basicMenus); $i++) {
            $menus[$i] = $this->getFullMenu($basicMenus[$i]['id']);
        }

        return $menus;
    }
}

// $restaurant = new Menu($conn, 1);

// $categories = $restaurant->getMenuCategories(1);
// echo "<table><tr><th>ID</th><th>Name</th></tr>";
// foreach ($categories as $c) {
//     echo "<tr><td>" . $c['id'] . "</td><td>" . $c['name'] . "</td></tr>";
// }
// echo "</table>";
