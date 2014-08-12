<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $id
 * @property string $login
 * @property string $password
 * @property string $name
 * @property string $surname
 * @property integer $admin
 */
class User extends CActiveRecord
{
    public $password_repeat;
    public $verifyCode;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */

    public function rules()
    {
        return array(
            // Логин и пароль - обязательные поля
            array('login', 'required', 'on' => 'register'),
            // Длина логина должна быть в пределах от 5 до 30 символов
            array('login', 'length', 'min'=>5, 'max'=>30, 'on'=>'register'),
            // Логин должен соответствовать шаблону
            array('login', 'match', 'pattern'=>'/^[A-z0-9][\w]+$/'),
            // Логин должен быть уникальным
            array('login', 'unique','message'=>'Логин занят'),

            // Пароль и повторный пароль должны быть обязательны при регистрации и редактировании пароля
            array('password, password_repeat', 'required', 'on' => 'register, changePassword'),
            // Длина пароля и повторного пароля не менее 6 символов при нужном сценарии
            array('password, password_repeat', 'length', 'min'=>6, 'max'=>30, 'on' => 'register, changePassword'),
            // Пароль должен совпадать с повторным паролем для сценария регистрации
            array('password', 'compare', 'compareAttribute'=>'password_repeat', 'on' => 'register, changePassword'),
            array('email','email','message'=>'E-mail не правильный','on'=>'register'),
            array('email', 'unique','message'=>'Такой E-mail уже существует'),
            //CCaptcha
            array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(), 'on' => 'register'),
            array('name', 'match', 'pattern'=>'/^([a-zA-ZА-Яа-я])+$/u', 'message'=>'Имя должно содержать только буквы русского или английского алфавита'),
            array('surname', 'match', 'pattern'=>'/^([a-zA-ZА-Яа-я])+$/u', 'message'=>'Фамилия должна содержать только буквы русского или английского алфавита'),
        );
    }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
            'solution'=>array(self::HAS_MANY, 'Solution', 'u_id'),
		);
	}

    public function safeAttributes()
    {
        return array('login', 'password', 'repeat_password', 'name', 'surname');
    }

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'login' => 'Логин',
			'password' => 'Пароль',
            'password_repeat' => 'Повторите пароль',
            'email' => 'Email',
			'name' => 'Имя',
			'surname' => 'Фамилия',
			'admin' => 'Admin',
            'verifyCode' => 'Введите код с картинки',
            'time_register' => 'Время регистрации',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('admin',$this->admin);
		$criteria->compare('time_register',$this->time_register);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    protected function beforeSave(){
        if(parent::beforeSave())
        {
            if ($this->isNewRecord || $this->getScenario()=='changePassword' || $this->getScenario()=='changePasswordAdmin'){
                $this->password = md5($this->password);
            }

            if ($this->isNewRecord){
                $this->time_register = time();
                $this->time_last_active = time();
            }

            return true;
        }
        return false;
    }
}
