<?php

namespace backend\models;

/**
 * Login form
 *
 * @property-read null|User $user
 */
class LoginForm extends \common\models\LoginForm
{
    private $_user;
    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
