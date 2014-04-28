<?php

/**
 * This is the model class for table "{{problem}}".
 *
 * The followings are the available columns in table '{{problem}}':
 * @property integer $id
 * @property string $name_ru
 * @property string $name_ro
 * @property string $description_ru
 * @property string $description_ro
 * @property string $input_ru
 * @property string $input_ro
 * @property string $output_ru
 * @property string $output_ro
 * @property string $tests
 * @property double $limit_time
 * @property double $limit_memory
 * @property string $examples
 * @property integer $hide
 */
class Problem extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{problem}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('description, name, input, output', 'safe'),

			array('hide', 'numerical', 'integerOnly'=>true),
			array('limit_time, limit_memory', 'numerical'),
			array('name_ru, name_ro', 'length', 'max'=>255),
			array('tests', 'length', 'max'=>3),
			array('description_ru, description_ro, input_ru, input_ro, output_ru, output_ro, examples', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name_ru, name_ro, description_ru, description_ro, input_ru, input_ro, output_ru, output_ro, tests, limit_time, limit_memory, examples, hide', 'safe', 'on'=>'search'),
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

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name_ru' => 'Название',
			'name_ro' => 'Name Ro',
			'description_ru' => 'Описание',
			'description_ro' => 'Description Ro',
			'input_ru' => 'Входные данные',
			'input_ro' => 'Input Ro',
			'output_ru' => 'Выходные данные',
			'output_ro' => 'Output Ro',
			'tests' => 'Тесты',
			'limit_time' => 'Ограничение по времени',
			'limit_memory' => 'Ограничение по памяти',
			'examples' => 'Examples',
			'hide' => 'Hide',
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
        echo $this->name_ru;
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);

		$criteria->compare('name_ru', $this->name_ru,true);
        #$criteria->compare('name_ru', $this->name_ro,true, 'OR');

        $criteria->compare('name_ro', $this->name_ro,true);
        #$criteria->compare('name_ro', $this->name_ru,true, 'OR');

		$criteria->compare('description_ru',$this->description_ru,true);
		$criteria->compare('description_ro',$this->description_ro,true);
		$criteria->compare('input_ru',$this->input_ru,true);
		$criteria->compare('input_ro',$this->input_ro,true);
		$criteria->compare('output_ru',$this->output_ru,true);
		$criteria->compare('output_ro',$this->output_ro,true);
		$criteria->compare('tests',$this->tests,true);
		$criteria->compare('limit_time',$this->limit_time);
		$criteria->compare('limit_memory',$this->limit_memory);
		$criteria->compare('examples',$this->examples,true);
		$criteria->compare('hide', 0);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function searchAdmin()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.
        echo $this->name_ru;
        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);

        $criteria->compare('name_ru', $this->name_ru,true);
        #$criteria->compare('name_ru', $this->name_ro,true, 'OR');

        $criteria->compare('name_ro', $this->name_ro,true);
        #$criteria->compare('name_ro', $this->name_ru,true, 'OR');

        $criteria->compare('description_ru',$this->description_ru,true);
        $criteria->compare('description_ro',$this->description_ro,true);
        $criteria->compare('input_ru',$this->input_ru,true);
        $criteria->compare('input_ro',$this->input_ro,true);
        $criteria->compare('output_ru',$this->output_ru,true);
        $criteria->compare('output_ro',$this->output_ro,true);
        $criteria->compare('tests',$this->tests,true);
        $criteria->compare('limit_time',$this->limit_time);
        $criteria->compare('limit_memory',$this->limit_memory);
        $criteria->compare('examples',$this->examples,true);
        $criteria->compare('hide', $this->hide);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Problem the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    protected function afterFind(){
        $this->examples = json_decode($this->examples, true);

        return parent::afterFind();
    }

    public function getName()
    {
        $attribute = 'name_' . Yii::app()->session['language'];
        return $this->{$attribute};
    }

    public function setName($value)
    {
        $attribute = 'name_' . Yii::app()->session['language'];
        $this->{$attribute} = $value;
    }

    public function getDescription()
    {
        $attribute = 'description_' . Yii::app()->session['language'];
        return $this->{$attribute};
    }

    public function setDescription($value)
    {
        $attribute = 'description_' . Yii::app()->session['language'];
        $this->{$attribute} = $value;
    }

    public function getInput()
    {
        $attribute = 'input_' . Yii::app()->session['language'];
        return $this->{$attribute};
    }

    public function setInput($value)
    {
        $attribute = 'input_' . Yii::app()->session['language'];
        $this->{$attribute} = $value;
    }

    public function getOutput()
    {
        $attribute = 'output_' . Yii::app()->session['language'];
        return $this->{$attribute};
    }

    public function setOutput($value)
    {
        $attribute = 'output_' . Yii::app()->session['language'];
        $this->{$attribute} = $value;
    }
}
