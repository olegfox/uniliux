<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "clients".
 *
 * @property integer $id
 * @property string $type
 * @property string $username
 * @property string $company_name
 * @property string $contact_name
 * @property string $your_task
 * @property string $country
 * @property string $city
 * @property string $address
 * @property string $email
 * @property string $website
 * @property string $text
 * @property string $password
 * @property integer $is_active
 * @property integer $role
 * @property string $created
 * @property string $updated
 * @property string $passwordText
 */
class Client extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clients';
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created',
                'updatedAtAttribute' => 'updated',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'username', 'company_name', 'contact_name', 'country', 'city', 'email', 'text', 'password', 'is_active', 'role', 'created', 'passwordText'], 'required'],
            [['your_task', 'address', 'text'], 'string'],
            [['is_active'], 'integer'],
            [['created'], 'safe'],
            [['username', 'email', 'website'], 'string', 'max' => 100],
            [['company_name', 'contact_name', 'country', 'city'], 'string', 'max' => 200],
            [['password', 'passwordText'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Компания/Частное лицо',
            'username' => 'Логин',
            'company_name' => 'Название компании',
            'contact_name' => 'Контактное лицо',
            'your_task' => 'Ваша задача',
            'country' => 'Страна',
            'city' => 'Город',
            'address' => 'Адрес',
            'email' => 'E-mail',
            'website' => 'Вебсайт',
            'text' => 'Текст',
            'is_active' => 'Активен',
            'role' => 'Роль',
            'created' => 'Дата регистрации',
            'passwordText' => 'Пароль',
        ];
    }

    // Interface methods

    /** INCLUDE USER LOGIN VALIDATION FUNCTIONS**/
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Находит пользователя по email
     *
     * @param $email
     * @return null|static
     */
    public static function findByEmail($email)
    {
        return static::findOne([
            'email' => $email
        ]);
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * Finds user by password reset token
     *
     * @param  string      $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        if ($timestamp + $expire < time()) {
            // token expired
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token
        ]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {

    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {

    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return password_verify($password, $this->password);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);//Security::generatePasswordHash($password);
        $this->passwordText = $password;//Security::generatePasswordHash($password);
    }

    public function sendMessageWithPassword()
    {
        Yii::$app->mailer
            ->compose('/frontend/client/email_password', [
                'client' => $this,
                'image1' => Yii::getAlias('@app/web/frontend/images/image01.jpg'),
                'image2' => Yii::getAlias('@app/web/frontend/images/image02.png'),
                'image3' => Yii::getAlias('@app/web/frontend/images/image03.png')
            ])
            ->attach(Yii::getAlias('@app/web/frontend/files/ShowroomBertolotto.pdf'))
            ->attach(Yii::getAlias('@app/web/frontend/files/список_фабрик_UNILIUX.pdf'))
            ->setTo($this->email)
            ->setFrom([Yii::$app->params['adminEmail'] => 'Uniliux'])
            ->setSubject('Пароль с сайта uniliux.com')
            ->send();

        return true;
    }
}
