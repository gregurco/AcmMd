<?php

/**
 * This is the model class for table "{{article}}".
 *
 * The followings are the available columns in table '{{article}}':
 * @property integer $id
 * @property string $title_ru
 * @property string $title_ro
 * @property string $text_ru
 * @property string $text_ro
 * @property integer $hide
 */
class Article extends CActiveRecord
{
    public $groupTitle;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{article}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hide, g_id', 'numerical', 'integerOnly'=>true),
			array('title_ru, title_ro', 'length', 'max'=>255),
			array('text_ru, text_ro', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, g_id, title_ru, title_ro, text_ru, text_ro, hide, groupTitle', 'safe', 'on'=>'search'),
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
            'groupArticle' => array(self::BELONGS_TO , 'GroupArticle' , 'g_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title_ru' => 'Title Ru',
			'title_ro' => 'Title Ro',
			'text_ru' => 'Text Ru',
			'text_ro' => 'Text Ro',
            'g_id' => 'Group index',
			'hide' => 'Hide',
            'groupTitle' => 'Название группы',
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
		$criteria->compare('t.g_id',$this->g_id);
		$criteria->compare('t.title_ru',$this->title_ru,true);
		$criteria->compare('t.title_ro',$this->title_ro,true);
		$criteria->compare('text_ru',$this->text_ru,true);
		$criteria->compare('text_ro',$this->text_ro,true);
		$criteria->compare('t.hide',$this->hide);
		$criteria->compare('groupArticle.title',$this->groupTitle);
        $criteria->with = array('groupArticle');

        $sort = new CSort();
        $sort->attributes = array(
            'groupTitle'=>array(
                'asc'=>'article.title',
                'desc'=>'article.title DESC',
            ),
        );

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    public function getTitle()
    {
        $attribute = 'title_' . Yii::app()->session['language'];
        return $this->{$attribute};
    }
    public function getText()
    {
        $attribute = 'text_' . Yii::app()->session['language'];
        return $this->{$attribute};
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Article the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
