<?php
namespace Kav\Burgers;
require_once 'Db.php';
require_once 'Users.php';

class Orders
{
    const ERR_USER = 'Пользователь не найден';
    const ERR_ADDRESS = 'Не указан адрес';

    public function __construct()
    {

    }

    public function add(array $fields)
    {
        if (!$fields['user']) {
            trigger_error(self::ERR_USER, E_USER_ERROR);
            return false;
        }
        if (!$fields['address']) {
            trigger_error(self::ERR_ADDRESS, E_USER_ERROR);
            return false;
        }
        $users = new Users();
        if (!$users->getById($fields['user'])) {
            trigger_error(self::ERR_USER, E_USER_ERROR);
            return false;
        }
        $db = Db::getInstance();
        if (!$fields['change']) {
            $fields['change'] = 0;
        }
        if (!$fields['card']) {
            $fields['card'] = 0;
        }
        $db->exec('INSERT INTO orders(user_id, address, comments, `change`, card, callback) VALUES (:user_id, :address, :comments, :change, :card, :callback)', [':user_id' => $fields['user'], ':address' => $fields['address'], ':comments' => $fields['comments'], ':change' => $fields['change'], ':card' => $fields['card'], ':callback' => $fields['callback']]);
        return $db->lastInsertId();
    }

    public function getById(int $id)
    {
        $db = Db::getInstance();
        return $db->fetch('SELECT * FROM orders WHERE id = ' . $id);
    }

    public function countOrdersByUser(int $user)
    {
        $db = Db::getInstance();
        return $db->fetch('SELECT count(*) as `count` from orders where user_id = ' . $user)['count'];
    }
}