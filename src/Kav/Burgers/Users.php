<?php
namespace Kav\Burgers;
require_once 'Db.php';

class Users
{
    const ERR_NAME = 'Не указано имя';
    const ERR_PHONE = 'Не указан телефон';
    const ERR_EMAIL = 'Не указана почта';

    public function __construct(array $args = [])
    {

    }

    public function add(array $fields)
    {
        if (!$fields['name']) {
            trigger_error(self::ERR_NAME, E_USER_ERROR);
            return false;
        }
        if (!$fields['phone']) {
            trigger_error(self::ERR_PHONE, E_USER_ERROR);
            return false;
        }
        if (!$fields['email']) {
            trigger_error(self::ERR_EMAIL, E_USER_ERROR);
            return false;
        }
        $user = $this->getByEmail($fields['email']);
        if (is_array($user)) {
            return $user['id'];
        }
        $db = Db::getInstance();
        $db->exec('INSERT INTO users(`name`, phone, email) VALUES (:name, :phone, :email)', [':name' => $fields['name'], ':phone' => $fields['phone'], ':email' => $fields['email']]);
        return $db->lastInsertId();
    }

    public function getByEmail(string $email)
    {
        $db = Db::getInstance();
        return $db->fetch('SELECT * FROM users WHERE email = :email', [':email' => $email]);
    }

    public function get()
    {
        $db = Db::getInstance();
        return $db->fetchAll('SELECT * FROM users');
    }
}