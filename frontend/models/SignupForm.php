<?php

namespace frontend\models;

use Yii;
use yii\base\Exception;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $name;
    public $last_name;
    public $middle_name;
    public $about;
    public $birthday;
    public $email;
    public $password;
    public $password_repeat;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'name', 'last_name', 'middle_name', 'about', 'birthday'], 'trim'],
            [['birthday'], 'datetime', 'format' => 'php:Y-m-d', 'message' => 'Valid format 2000-01-20'],

            [['username', 'name'], 'required'],
            [['username', 'name', 'last_name', 'middle_name'], 'string', 'min' => 2, 'max' => 255],
            ['about', 'string', 'min' => 2],

            ['username', 'unique', 'targetClass' => User::class, 'message' => 'This username has already been taken.'],


            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => User::class, 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
            ['password_repeat', 'required'],
            [
                'password_repeat', 'compare', 'compareAttribute' => 'password',
                'message' => "Passwords don't match"
            ],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     * @throws Exception
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->name = $this->name;
        $user->last_name = $this->last_name;
        $user->middle_name = $this->middle_name;
        $user->birthday = $this->birthday;
        $user->about = $this->about;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        return $user->save() && $this->sendEmail($user);
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
