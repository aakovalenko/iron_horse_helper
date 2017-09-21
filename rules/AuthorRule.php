<?php
/**
 * Created by PhpStorm.
 * User: andri
 * Date: 20.09.17
 * Time: 11:36
 */

namespace app\rules;


use yii\rbac\Rule;

class AuthorRule extends Rule
{
    public $name = 'isAuthor';

    public function execute($id, $item, $params) //$id(id конкретного пользователя)
{
    if (isset($params['user_id']) and ($params['user_id'] == $id)) //есть ли user_id и являеться ли user_id текущим пользователем
    {
        return true;
    }else
    {
        return false;
    }
    //return isset($params['iron-horse']) ? $params['iron-horse']->createdBy == $id : false;
}
}