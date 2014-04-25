<?php

/**
 * This is the model class for table "{{newsComment}}".
 *
 * The followings are the available columns in table '{{newsComment}}':
 * @property integer $id
 * @property integer $n_id
 * @property integer $u_id
 * @property integer $create
 * @property string $text
 * @property integer $hide
 */
class NewsComment extends CActiveRecord
{
    public $verifyCode;
    public $userLogin;
    public $newsTitle;
   // public $name;

    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{newsComment}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('text', 'required', 'message' => 'Впишите свой комментарии', 'on' => 'create'),
			array('n_id, u_id, create, hide', 'numerical', 'integerOnly'=>true),
            array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(), 'on' => 'create'),
            array('name','valid_name'),
            // The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, n_id, name, u_id, create, text, hide, userLogin, newsTitle', 'safe', 'on'=>'search'),
		);
	}

    public function valid_name($attribute,$params){
        if(Yii::app()->user->isGuest && $this->$attribute == ''){
            CModel::addError($attribute, 'Заполните поля "Имя"');
        }
    }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
            'user'=>array(self::BELONGS_TO, 'User', 'u_id'),
            'news'=>array(self::BELONGS_TO, 'News', 'n_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'n_id' => 'News_id',
			'u_id' => 'User_id',
			'create' => 'Написан',
			'text' => 'Text',
            'name' => 'Имя Гостя',
            'hide' => 'Скрыт',
            'userLogin' => 'Логин',
            'newsTitle' => 'Название новости',
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
        $criteria->alias = 't';
		$criteria->compare('t.id',$this->id);
		$criteria->compare('n_id',$this->n_id);
		$criteria->compare('u_id',$this->u_id);
		$criteria->compare('t.create',$this->create);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('t.name',$this->name,true);
        $criteria->compare('hide',$this->hide,true);
        $criteria->compare('user.login', $this->userLogin);
        $criteria->compare('news.title_'.Yii::app()->session['language'], $this->newsTitle);
        $criteria->with = array('user','news');


        $sort = new CSort();
        $sort->attributes = array(
            'userLogin' => array(
                'asc'=>'user.login',
                'desc'=>'user.login DESC',
            ),
            'newsTitle'=>array(
                'asc'=>'user.login',
                'desc'=>'user.login DESC',
            ),
        );

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>$sort,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return NewsComment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    protected function beforeSave()
    {
        if($this->isNewRecord)
        {
            $this->create = time();
            $this->u_id = Yii::app()->user->id;
            if (Yii::app()->config->get('COMMENT.VALIDATE.ALLOW')){
                $this->hide = 0;
            }
            else $this->hide = 1;
        }
        return parent::beforeSave();
    }

}
