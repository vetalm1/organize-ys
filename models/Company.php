<?php


namespace app\models;


use yii\db\ActiveRecord;

class Company extends ActiveRecord  implements \yii\web\IdentityInterface
{

    public static function tableName()
    {
        return 'company';
    }

    public function getUnit(){
        return $this->hasMany(Unit::class, ['company_id' =>'id']);
    }

    public function rules()
    {
        return [
            [['name', 'login', 'type_service', 'password'], 'required'],
            [['login', 'name'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Логин',
            'name' => 'Наименование организация',
            'type_service' => 'Вид деятельности',
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
//        foreach (self::$users as $user) {
//            if ($user['accessToken'] === $token) {
//                return new static($user);
//            }
//        }
//
//        return null;
    }

    public static function findByUsername($login)
    {
        return static::findOne(['login'=>$login]);

//        foreach (self::$users as $user) {
//            if (strcasecmp($user['username'], $username) === 0) {
//                return new static($user);
//            }
//        }
//
//        return null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    public function validatePassword($password)
    {
        return \Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    public function generateAuthKey()
    {
        $this->auth_key = \Yii::$app->security->generateRandomString();
    }

}