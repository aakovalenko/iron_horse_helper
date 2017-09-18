<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $email;
    public $pass_hash;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['email', 'pass_hash'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['pass_hash', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */


    /*public function validatePassword($attribute, $params)
    {
        if(!$this->hasErrors()){ //если нет ошибок в валидации

        $user = $this->getUser(); // получаем пользователя для дальнейшего тестирования

        if(!$user || !$user -> validatePassword($this->pass_hash))
        {
            //если мы не нашли в бызе такого пользователя

            $this->addError($attribute, 'Пароль или пользователь введены неверно');
        }

    }*/



    //}

    public function getUser()
    {
        return User::findOne(['email'=>$this->email]);  // получаем его по введеному емейлу

    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */

}
