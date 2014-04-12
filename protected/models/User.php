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
            array('login, password', 'required'),
            // Длина логина должна быть в пределах от 5 до 30 символов
            array('login', 'length', 'min'=>5, 'max'=>30),
            // Логин должен соответствовать шаблону
            array('login', 'match', 'pattern'=>'/^[A-z0-9][\w]+$/'),
            // Логин должен быть уникальным
            array('login', 'unique','message'=>'Логин занят'),
            // Длина пароля не менее 6 символов
            array('password', 'length', 'min'=>6, 'max'=>30),
            // Повторный пароль и почта обязательны для сценария регистрации
            array('password_repeat', 'required'),
            // Длина повторного пароля не менее 6 символов
            array('password_repeat', 'length', 'min'=>6, 'max'=>30),
            //CCaptcha
            array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(), 'on' => 'register'),
            // Пароль должен совпадать с повторным паролем для сценария регистрации
            array('password', 'compare', 'compareAttribute'=>'password_repeat'),
            array('name', 'match', 'pattern'=>'/^([a-zA-ZА-Яа-я])+$/u', 'message'=>'Имя должно содержать только буквы русского или румынского алфавита'),
            array('surname', 'match', 'pattern'=>'/^([a-zA-ZА-Яа-я])+$/u', 'message'=>'Фамилия должен содержать только буквы русского или румынского алфавита'),
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
			'name' => 'Имя',
			'surname' => 'Фамилия',
			'admin' => 'Admin',
            'verifyCode' => 'Введите код с картинки'
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('admin',$this->admin);

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
            if ($this->isNewRecord){
                $this->password = md5($this->password);
                $this->admin = 0;
            }
            return true;
        }
        return false;
    }

}
